<?php

namespace App\Http\Livewire\User;


use App\Models\Gudang;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class TambahGudang extends ModalComponent
{
    use Actions;
    public $nama;
    public $kode;
    public $deskripsi;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'nama' => 'required',
            'kode' => 'required',
        ]);
    }

    public function addGudang()
    {
        $this->validate([
            'nama' => 'required',
            'kode' => 'required',
        ]);

        $gudang = new Gudang();
        $gudang->name = $this->nama;
        $gudang->kode = $this->kode;
        $gudang->deskripsi = $this->deskripsi;

        $gudang->save();

        $this->emit('gudangCreated', $gudang->id);

        $this->notification()->success('Gudang Ditambahkan');

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-default')
        ]);
    }
    public function render()
    {
        return view('livewire.user.tambah-gudang');
    }
}
