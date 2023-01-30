<?php

namespace App\Http\Livewire\User\Pembelian;

use App\Models\Akun;
use App\Models\Pajak;
use App\Models\Gudang;
use App\Models\ItemPembelianPenawaran;
use App\Models\ItemPenjualanPenawaran;
use App\Models\Kontak;
use App\Models\Produk;
use App\Models\Satuan;
use Livewire\Component;
use App\Models\Karyawan;
use WireUi\Traits\Actions;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use App\Models\Pembelian_Penawaran;
use App\Models\Tags;
use App\Models\Termin;

class PembelianTambahPenawaran extends Component
{
    use WithFileUploads;
    public $orderProducts = [];
    public $allProducts = [];
    public $vendor;
    public $kode;
    public $tgl_transaksi;
    public $tgl_kadaluarsa;
    public $termin;
    public $gudang;
    public $referensi;
    public $tags;
    public $tanggal_pengiriman;
    public $kurir;
    public $resi;
    public $sku;
    public $total;
    public $pesan;
    public $attachment;
    public $pajak = [];
    public $total_pajak = 0;
    public $biaya_pengiriman = 0;
    public $diskonPersen = 0;
    public $diskonRp = 0;
    public $diskon = 0;
    public $jumlah = [];
    public $subtotal = 0;
    public $uangmuka = 0;
    public $uangmukaRp = 0;
    public $uangmukaPersen = 0;
    public $sisa_tagihan;
    public $akun_id;
    use Actions;
    public function mount()
    {
        $this->allProducts = Produk::all();
        $this->tgl_transaksi = Carbon::now();
        $this->orderProducts = [
            ['produk_id' => '', 'deskripsi' => '', 'qty' => 1, 'satuan_id' => '', 'discount' => '0', 'harga' => '0', 'pajak' => 0, 'jumlah' => '0',]
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] =  ['produk_id' => '', 'deskripsi' => '', 'qty' => 1, 'satuan_id' => '', 'discount' => '0', 'harga' => '0', 'pajak' => '0', 'jumlah' => 0];
        $this->jumlah[] = ['0'];
    }

    public function removeProduct($index)
    {

        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'vendor' => 'required',
            'kode' => 'required',
            'tgl_transaksi' => 'required|date',
            'tgl_kadaluarsa' => 'required|date',
            'termin' => 'required',
            'orderProducts.*.produk_id' => 'required',
            'orderProducts.*.satuan_id' => 'required',
            'tanggal_pengiriman' => 'required|date',
            'kurir' => 'required',
            'resi' => 'required',
        ]);
    }

    public function addTagihan()
    {
        $this->validate([
            'vendor' => 'required',
            'kode' => 'required',
            'tgl_transaksi' => 'required|date',
            'tgl_kadaluarsa' => 'required|date',
            'termin' => 'required',
            'orderProducts.*.produk_id' => 'required',
            'orderProducts.*.satuan_id' => 'required'
        ]);

        $penawaran = new Pembelian_Penawaran();
        $penawaran->kontak_id = $this->vendor;
        $penawaran->status = 'Open';
        $penawaran->tanggal_transaksi = $this->tgl_transaksi;
        $penawaran->kadaluarsa = $this->tgl_kadaluarsa;
        $penawaran->termin = $this->termin;
        $penawaran->referensi = $this->referensi;
        $penawaran->kode = $this->kode;
        $penawaran->sub_total = $this->subtotal;
        $penawaran->diskon = $this->diskon;
        $penawaran->biaya_pengiriman = $this->biaya_pengiriman;
        $penawaran->total = $this->total;
        $penawaran->pesan = $this->pesan;
        $penawaran->pajak = $this->total_pajak;

        if ($this->attachment) {
            $attachmentName = Carbon::now()->timestamp  . '-' . 'attachment' . '.' . $this->attachment->extension();
            $this->attachment->storeAs('attachment', $attachmentName);
            $penawaran->attachment = $attachmentName;
        }
        if ($this->akun_id) {
            $akun = Akun::find($this->akun_id);
            $akun->saldo =  ($akun->saldo - $this->uangmuka);
            $akun->save();
        }
        if ($this->tags) {
            $this->tags = json_encode($this->tags);
            $penawaran->tags = $this->tags;
        }

        if ($this->tanggal_pengiriman || $this->kurir || $this->resi) {
            $this->validate([
                'tanggal_pengiriman' => 'required|date',
                'kurir' => 'required',
                'resi' => 'required',

            ]);
            $penawaran->info_pengiriman = 1;
            $penawaran->tanggal_pengiriman = $this->tanggal_pengiriman;
            $penawaran->kurir = $this->kurir;
            $penawaran->resi = $this->resi;
        }
        $penawaran->save();


        foreach ($this->orderProducts as $key => $items) {
            $items_p = new ItemPembelianPenawaran();
            $items_p->produk_id = $items['produk_id'];
            $items_p->pembelian_id = $penawaran->id;
            if ($items['deskripsi']) {
                $items_p->deskripsi = $items['deskripsi'];
            } else {
                $items['deskripsi'] = null;
            }

            $items_p->qty = $items['qty'];
            $items_p->discount = $items['discount'];
            $items_p->satuan_id = $items['satuan_id'];
            $items_p->harga = $items['harga'];
            $items_p->jumlah =  $this->jumlah[$key];
            $items_p->save();
        }

        $this->emit('tagihanCreated', $penawaran->id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Penawaran Pembelian Ditambahkan');
        redirect()->route('user.pembelian.penawaran.detail', ['penawaran_id' => $penawaran->id]);
    }
    public function render()
    {
        $orderProducts = $this->orderProducts;
        $gudangs = Gudang::all();
        $termins = Termin::select('name', 'value')->get();
        $tag_data = Tags::pluck('name', 'id');
        $akuns = Akun::where('kategori', '=', 'Banking')->get();
        $karyawans = Karyawan::all();
        $pajaks = Pajak::select('name', 'value')->get();
        $satuans = Satuan::select('name', 'id')->get();
        $kontaks = Kontak::with(
            'biaya',
            'pembelian_penawaran',
            'pengiriman',
        )->select('name', 'id', 'perusahaan')->get();
        $i = 0;
        foreach ($orderProducts as $key => $items) {
            $this->jumlah[$key] = (((int) $items['harga']  - ((int) $items['harga'] * ((int) $items['discount'] / 100))) * $items['qty']);
            $this->pajak[$key] = ((((int) $items['harga']  - ((int) $items['harga'] * ((int) $items['discount'] / 100))) * $items['qty']) * $items['pajak']);
        }


        $this->subtotal = array_sum($this->jumlah);
        $this->total_pajak = array_sum($this->pajak);

        if ($this->termin) {

            $this->tgl_kadaluarsa =  Carbon::parse($this->tgl_transaksi)->addDays($this->termin);
        }

        $this->diskon = $this->diskonRp;

        if ($this->diskonPersen) {
            $this->diskonRp = 0;
            $this->diskon =   (($this->diskonPersen / 100) *   $this->subtotal);
        }
        $this->total = ((int)$this->subtotal - (int)$this->diskon) + (int)$this->total_pajak + (int)$this->biaya_pengiriman;


        return view(
            'livewire.user.pembelian.pembelian-tambah-penawaran',
            ['orderProducts' => $orderProducts, 'pajaks' => $pajaks, 'satuans' => $satuans, 'kontaks' =>
            $kontaks, 'gudangs' => $gudangs, 'karyawans' => $karyawans, 'akuns' => $akuns, 'tag_data' => $tag_data, 'termins' => $termins]
        );
    }
}
