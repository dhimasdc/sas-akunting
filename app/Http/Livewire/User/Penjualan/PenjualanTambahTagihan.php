<?php

namespace App\Http\Livewire\User\Penjualan;

use App\Models\Akun;
use App\Models\Tags;
use App\Models\Biaya;
use App\Models\Pajak;
use App\Models\Gudang;
use App\Models\Kontak;
use App\Models\Produk;
use App\Models\Satuan;
use App\Models\Termin;
use Livewire\Component;
use App\Models\Karyawan;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\Penjualan_Tagihan;
use App\Models\ItemPenjualanTagihan;
use App\Models\Transaksi;

class PenjualanTambahTagihan extends Component
{
    use WithFileUploads;
    public $orderProducts = [];
    public $allProducts = [];
    public $pelanggan;
    public $kode;
    public $tgl_transaksi;
    public $tgl_tempo;
    public $termin;
    public $gudang;
    public $referensi;
    public $tags;
    public $sales;
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
            'pelanggan' => 'required',
            'kode' => 'required',
            'tgl_transaksi' => 'required|date',
            'tgl_tempo' => 'required|date',
            'termin' => 'required',
            'gudang' => 'required',
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
            'pelanggan' => 'required',
            'kode' => 'required',
            'tgl_transaksi' => 'required|date',
            'tgl_tempo' => 'required|date',
            'termin' => 'required',
            'gudang' => 'required',
            'orderProducts.*.produk_id' => 'required',
            'orderProducts.*.satuan_id' => 'required'
        ]);

        $tagihan = new Penjualan_Tagihan();
        $tagihan->kontak_id = $this->pelanggan;
        $tagihan->sales_id = $this->sales;
        $tagihan->tanggal_transaksi = $this->tgl_transaksi;
        $tagihan->tanggal_jatuh_tempo = $this->tgl_tempo;
        $tagihan->termin = $this->termin;
        $tagihan->referensi = $this->referensi;
        $tagihan->kode = $this->kode;
        $tagihan->gudang_id = $this->gudang;
        $tagihan->sub_total = $this->subtotal;
        $tagihan->diskon = $this->diskon;
        $tagihan->biaya_pengiriman = $this->biaya_pengiriman;
        $tagihan->total = $this->total;
        $tagihan->pesan = $this->pesan;
        $tagihan->pajak = $this->total_pajak;
        $tagihan->uang_muka = $this->uangmuka;
        $tagihan->sisa_tagihan = $this->sisa_tagihan;
        if ($this->sisa_tagihan == 0) {
            $tagihan->status = 'Lunas';
        }
        if ($this->sisa_tagihan > 0) {
            $tagihan->status = 'Dibayar Sebagian';
        }
        if ($this->sisa_tagihan == $this->total) {
            $tagihan->status = 'Belum Dibayar';
        }

        if ($this->attachment) {
            $attachmentName = Carbon::now()->timestamp  . '-' . 'attachment' . '.' . $this->attachment->extension();
            $this->attachment->storeAs('attachment', $attachmentName);
            $tagihan->attachment = $attachmentName;
        }
        if ($this->akun_id) {
            $akun = Akun::find($this->akun_id);
            $akun->saldo =  ($akun->saldo - $this->uangmuka);
            $akun->save();
        }
        if ($this->tags) {
            $this->tags = json_encode($this->tags);
            $tagihan->tags = $this->tags;
        }

        if ($this->tanggal_pengiriman || $this->kurir || $this->resi) {
            $this->validate([
                'tanggal_pengiriman' => 'required|date',
                'kurir' => 'required',
                'resi' => 'required',

            ]);
            $tagihan->info_pengiriman = 1;
            $tagihan->tanggal_pengiriman = $this->tanggal_pengiriman;
            $tagihan->kurir = $this->kurir;
            $tagihan->resi = $this->resi;
        }
        $tagihan->save();

        $biaya = new Biaya();
        $biaya->kode = $tagihan->kode;
        $biaya->piutang = $tagihan->sisa_tagihan;
        $biaya->kontak_id = $tagihan->kontak_id;
        $biaya->tanggal_transaksi = $tagihan->tanggal_transaksi;
        $biaya->tanggal_jatuh_tempo = $tagihan->tanggal_jatuh_tempo;
        $biaya->save();

        $transaksi = new Transaksi();
        $transaksi->akun_id = $this->akun_id;
        $transaksi->penjualan_tagihan_id = $tagihan->id;
        $transaksi->tanggal_transaksi = $tagihan->tanggal_transaksi;
        $transaksi->total_dibayar = $tagihan->uang_muka;
        $transaksi->save();

        foreach ($this->orderProducts as $key => $items) {
            $items_p = new ItemPenjualanTagihan();
            $items_p->produk_id = $items['produk_id'];
            $items_p->penjualan_id = $tagihan->id;
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

        $this->emit('tagihanCreated', $tagihan->id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Tagihan Ditambahkan');
        redirect()->route('user.penjualan.tagihan.detail', ['tagihan_id' => $tagihan->id]);
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
            'penjualan_tagihan',
        )->select('name', 'id', 'perusahaan')->get();
        $i = 0;
        foreach ($orderProducts as $key => $items) {
            $this->jumlah[$key] = (((int) $items['harga']  - ((int) $items['harga'] * ((int) $items['discount'] / 100))) * $items['qty']);
            $this->pajak[$key] = ((((int) $items['harga']  - ((int) $items['harga'] * ((int) $items['discount'] / 100))) * $items['qty']) * $items['pajak']);
        }
        $this->subtotal = array_sum($this->jumlah);
        $this->total_pajak = array_sum($this->pajak);

        $this->diskon = $this->diskonRp;

        if ($this->termin) {

            $this->tgl_tempo =  Carbon::parse($this->tgl_transaksi)->addDays($this->termin);
        }

        if ($this->diskonPersen) {
            $this->diskonRp = 0;
            $this->diskon =   (($this->diskonPersen / 100) *   $this->subtotal);
        }
        $this->total = ((int)$this->subtotal - (int)$this->diskon) + (int)$this->total_pajak + (int)$this->biaya_pengiriman;
        $this->uangmuka = $this->uangmukaRp;
        if ($this->uangmukaPersen) {
            $this->uangmukaRp = 0;
            $this->uangmuka =   (($this->uangmukaPersen / 100) *   $this->total);
        }

        $this->sisa_tagihan = ($this->total - $this->uangmuka);
        return view(
            'livewire.user.penjualan.penjualan-tambah-tagihan',
            ['orderProducts' => $orderProducts, 'pajaks' => $pajaks, 'satuans' => $satuans, 'kontaks' =>
            $kontaks, 'gudangs' => $gudangs, 'karyawans' => $karyawans, 'akuns' => $akuns, 'tag_data' => $tag_data, 'termins' => $termins]
        );
    }
}
