<?php

namespace App\Http\Livewire\User;

use App\Models\Produk;
use App\Models\Satuan;
use Livewire\Component;
use App\Models\Kategori;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use LivewireUI\Modal\ModalComponent;

class TambahProduk extends ModalComponent
{
    use WithFileUploads;
    public $gambar;
    public $kategori;
    public $nama;
    public $sku;
    public $satuan;
    public $deskripsi;
    public $h_beli;
    public $h_jual;

    use Actions;
    public static function modalMaxWidth(): string
    {
        return '7xl';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nama' => 'required',
            'kategori' => 'required',
            'sku' => 'required',
            'satuan' => 'required',

        ]);
    }

    public function addProduk()
    {
        $this->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'sku' => 'required',
            'satuan' => 'required',

        ]);

        $produk = new Produk();
        $produk->name = $this->nama;
        $produk->kategori_id = $this->kategori;
        $produk->jenis = 'Produk';
        $produk->sku = $this->sku;
        if ($this->gambar) {
            $gambarName = Carbon::now()->timestamp  . '-' . 'Produk_thumb' . '.' . $this->gambar->extension();
            $this->gambar->storeAs('Produk_thumb', $gambarName);
            $produk->gambar = $gambarName;
        }
        $produk->satuan_id = $this->satuan;
        $produk->deskripsi = $this->deskripsi;
        $produk->harga_beli = $this->h_beli;
        $produk->harga_jual = $this->h_jual;
        $produk->save();
        $this->emit('produkCreated', $produk->id);

        $this->notification()->success('Produk Ditambahkan');

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-default')
        ]);
    }

    public function render()
    {
        $kategories = kategori::select('id', 'name')->get();
        $satuans = Satuan::select('name', 'id')->get();
        return view('livewire.user.tambah-produk', ['kategories' => $kategories, 'satuans' => $satuans]);
    }
}
