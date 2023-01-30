<?php

namespace App\Http\Livewire\User;

use App\Models\Kontak;
use App\Models\Satuan;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class TambahKontak extends ModalComponent
{
    public $nama;
    public $tipe;
    public $perusahaan;
    public $alamat;
    public $email;
    public $telepon;

    use Actions;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nama' => 'required',
            'tipe' => 'required',
            'perusahaan' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
        ]);
    }

    public function addKontak()
    {
        $this->validate([
            'nama' => 'required',
            'tipe' => 'required',
            'perusahaan' => 'required',
            'alamat' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
        ]);

        $kontak = new Kontak();
        $kontak->name = $this->nama;
        $kontak->tipe = $this->tipe;
        $kontak->perusahaan = $this->perusahaan;
        $kontak->alamat = $this->alamat;
        $kontak->email = $this->email;
        $kontak->telepon = $this->telepon;
        $kontak->save();
        $this->emit('kontakCreated', $kontak->id);

        $this->notification()->success('Kontak Ditambahkan');

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-default')
        ]);
    }

    public function render()
    {
        $satuans = Satuan::pluck('name', 'id');
        return view('livewire.user.tambah-kontak', ['satuans' => $satuans]);
    }
}
