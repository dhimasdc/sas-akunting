<?php

namespace App\Http\Livewire\User\Penjualan;


use App\Models\Akun;
use App\Models\Tags;
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
use App\Models\Penjualan_Pesanan;
use App\Models\Penjualan_Tagihan;
use App\Models\Penjualan_Penawaran;
use App\Models\ItemPenjualanTagihan;
use App\Models\ItemPenjualanPemesanan;
use App\Models\ItemPenjualanPenawaran;

class PenjualanTambahPemesananBuat extends Component
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
    public $akun_id;
    use Actions;
    public $penawaran_id;
    public function mount($penawaran_id)
    {
        $penawaran = Penjualan_Penawaran::find($penawaran_id);
        $this->pelanggan = $penawaran->kontak_id;
        $this->sales = $penawaran->sales_id;
        $this->tgl_transaksi = $penawaran->tanggal_transaksi;
        $this->tgl_tempo = $penawaran->tanggal_jatuh_tempo;
        $this->termin = $penawaran->termin;
        $this->referensi = $penawaran->referensi;
        if ($penawaran->info_pengiriman = 1) {
            $this->tanggal_pengiriman = $penawaran->tanggal_pengiriman;
            $this->kurir = $penawaran->kurir;
            $this->resi = $penawaran->resi;
        }
        $this->gudang = $penawaran->gudang_id;
        $this->subtotal = $penawaran->sub_total;
        $this->diskon = $penawaran->diskon;
        $this->biaya_pengiriman = $penawaran->biaya_pengiriman;
        $this->total = $penawaran->total;
        $this->pesan = $penawaran->pesan;
        $this->total_pajak = $penawaran->pajak;
        $this->tags = json_decode($penawaran->tags);

        $orderItems = ItemPenjualanPenawaran::where('penjualan_id', '=', $penawaran->id)->get();
        foreach ($orderItems as $key => $items) {
            $this->orderProducts[$key]['produk_id'] = $items->produk_id;
            $this->orderProducts[$key]['harga'] = $items->harga;
            $this->orderProducts[$key]['deskripsi'] = $items->deskripsi;
            $this->orderProducts[$key]['satuan_id'] = $items->satuan_id;
            $this->orderProducts[$key]['qty'] = $items->qty;
            $this->orderProducts[$key]['discount'] = $items->discount;
            $this->orderProducts[$key]['pajak'] = $items->pajak;
            $this->orderProducts[$key]['jumlah'] = $items->jumlah;
        }
        $this->allProducts = Produk::all();
        $this->tgl_transaksi = Carbon::now();
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

    public function addPemesanan()
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

        $tagihan = new Penjualan_Pesanan();
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
        $tagihan->status = "Open";
        $tagihan->pajak = $this->total_pajak;

        if ($this->attachment) {
            $attachmentName = Carbon::now()->timestamp  . '-' . 'attachment' . '.' . $this->attachment->extension();
            $this->attachment->storeAs('attachment', $attachmentName);
            $tagihan->attachment = $attachmentName;
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


        foreach ($this->orderProducts as $key => $items) {
            $items_p = new ItemPenjualanPemesanan();
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
        $this->notification()->success('Pemesanan Ditambahkan');
        redirect()->route('user.penjualan.pemesanan.detail', ['pemesanan_id' => $tagihan->id]);
    }

    public function render()
    {
        $orderProducts = $this->orderProducts;
        $gudangs = Gudang::all();
        $tag_data = Tags::pluck('name', 'id');
        $termins = Termin::select('name', 'value')->get();
        $akuns = Akun::where('kategori', '=', 'Banking')->get();
        $karyawans = Karyawan::all();
        $pajaks = Pajak::select('name', 'value')->get();
        $satuans = Satuan::select('name', 'id')->get();
        $kontaks = Kontak::with(
            'biaya',
            'penjualan_pesanan',
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

            $this->tgl_tempo =  Carbon::parse($this->tgl_transaksi)->addDays($this->termin);
        }
        $this->diskon = $this->diskonRp;

        if ($this->diskonPersen) {
            $this->diskonRp = 0;
            $this->diskon =   (($this->diskonPersen / 100) *   $this->subtotal);
        }
        $this->total = ((int)$this->subtotal - (int)$this->diskon) + (int)$this->total_pajak + (int)$this->biaya_pengiriman;
        return view(
            'livewire.user.penjualan.penjualan-tambah-pemesanan-buat',
            ['orderProducts' => $orderProducts, 'pajaks' => $pajaks, 'satuans' => $satuans, 'kontaks' =>
            $kontaks, 'gudangs' => $gudangs, 'karyawans' => $karyawans, 'akuns' => $akuns, 'tag_data' => $tag_data, 'termins' => $termins]
        );
    }
}
