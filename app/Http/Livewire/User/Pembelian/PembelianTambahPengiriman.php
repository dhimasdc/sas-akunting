<?php

namespace App\Http\Livewire\User\Pembelian;

use App\Models\Tags;
use App\Models\Gudang;
use App\Models\ItemPembelianPemesanan;
use App\Models\ItemPembelianPengiriman;
use App\Models\Kontak;
use App\Models\Satuan;
use Livewire\Component;
use App\Models\Karyawan;
use App\Models\Pembelian_Pesanan;
use App\Models\Pengiriman;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class PembelianTambahPengiriman extends Component
{
    use WithFileUploads;
    public $orderProducts = [];
    public $allProducts = [];
    public $vendor;
    public $kode;
    public $tgl_transaksi;
    public $tgl_tempo;
    public $termin;
    public $gudang;
    public $referensi;
    public $tags;
    public $sales;
    public $tanggal_pengiriman;
    public $tgl_pengiriman;
    public $kurir;
    public $resi;
    public $sku;
    public $kode_pemesanan;
    public $total;
    public $pesan;
    public $attachment;
    public $pajak = [];
    public $total_pajak = 0;
    public $biaya_pengiriman;
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

    public $pemesanan_id;
    public function mount($pemesanan_id)
    {
        $this->tgl_pengiriman = Carbon::now();
        $this->pemesanan_id = $pemesanan_id;
        $pemesanan = Pembelian_Pesanan::find($pemesanan_id);
        $this->vendor =  $pemesanan->kontak_id;
        $this->kode_pemesanan =  $pemesanan->kode;
        $this->gudang =  $pemesanan->gudang_id;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'vendor' => 'required',
            'kode' => 'required',
            'tgl_pengiriman' => 'required|date',
            'biaya_pengiriman' => 'required',
            'gudang' => 'required',
            'kurir' => 'required',
            'resi' => 'required',
        ]);
    }

    public function addPengiriman()
    {
        $this->validate([
            'vendor' => 'required',
            'kode' => 'required',
            'tgl_pengiriman' => 'required|date',
            'gudang' => 'required',
            'biaya_pengiriman' => 'required'
        ]);

        $tagihan = new Pengiriman();
        $tagihan->kode = $this->kode;
        $tagihan->jenis = 'pembelian';
        $tagihan->kode_pemesanan = $this->kode_pemesanan;
        $tagihan->kontak_id = $this->vendor;
        $tagihan->referensi = $this->referensi;
        $tagihan->tanggal_pengiriman = $this->tgl_pengiriman;
        $tagihan->biaya_pengiriman = $this->biaya_pengiriman;
        $tagihan->status = 'Diproses';
        if ($this->tags) {
            $this->tags = json_encode($this->tags);
            $tagihan->tags = $this->tags;
        }
        $tagihan->kurir = $this->kurir;
        $tagihan->resi = $this->resi;
        $tagihan->gudang_id = $this->gudang;
        $tagihan->pembelian_pemesanan_id = $this->pemesanan_id;
        $tagihan->save();

        $orderItems =  ItemPembelianPemesanan::where('pembelian_id', '=', $this->pemesanan_id)->get();
        foreach ($orderItems as $items) {
            $items_p = new ItemPembelianPengiriman();
            $items_p->produk_id =   $items->produk_id;
            $items_p->pembelian_id = $tagihan->id;
            if ($items->deskripsi) {
                $items_p->deskripsi = $items->deskripsi;
            } else {
                $items->deskripsi = null;
            }
            $items_p->qty = $items->qty;
            $items_p->satuan_id = $items->satuan_id;
            $items_p->harga =   $items->harga;
            $items_p->jumlah =   $items->jumlah;
            $items_p->save();
        }

        $this->emit('tagihanCreated', $tagihan->id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Pengiriman Ditambahkan');
        redirect()->route('user.pembelian.pengiriman.detail', ['pengiriman_id' => $tagihan->id]);
    }

    public function render()
    {
        $orderItems =  ItemPembelianPemesanan::where('pembelian_id', '=', $this->pemesanan_id)->get();
        $gudangs = Gudang::all();
        $tag_data = Tags::pluck('name', 'id');
        $karyawans = Karyawan::all();
        $satuans = Satuan::select('name', 'id')->get();
        $kontaks = Kontak::with(
            'biaya',
            'pengiriman',
        )->select('name', 'id', 'perusahaan')->get();


        return view(
            'livewire.user.pembelian.pembelian-tambah-pengiriman',
            ['orderItems' => $orderItems, 'satuans' => $satuans, 'kontaks' =>
            $kontaks, 'gudangs' => $gudangs, 'karyawans' => $karyawans, 'tag_data' => $tag_data]
        );
    }
}
