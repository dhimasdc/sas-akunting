<?php

namespace App\Http\Livewire\User;

use App\Models\Akun;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class TambahAkun extends ModalComponent
{
    use Actions;
    public $nama;
    public $kode;
    public $kategori;
    public $sub_akun;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nama' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
        ]);
    }

    public function addAkun()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => 'required',
            'kategori' => 'required',
        ]);

        $akun = new Akun();
        $akun->name = $this->nama;
        $akun->kode = $this->kode;
        $akun->kategori = $this->kategori;
        $akun->sub_akun = $this->sub_akun;

        $akun->save();

        $this->emit('akunCreated', $akun->id);

        $this->notification()->success('Akun Ditambahkan');

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-default')
        ]);
    }
    public function render()
    {
        return view('livewire.user.tambah-akun');
    }
}
