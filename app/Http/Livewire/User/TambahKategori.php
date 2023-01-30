<?php

namespace App\Http\Livewire\User;

use App\Models\Kategori;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;
use Livewire\Component;

class TambahKategori extends ModalComponent
{
    use Actions;
    public $kategori;
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'kategori' => 'required',
        ]);
    }

    public function addKategori()
    {
        $this->validate([
            'kategori' => 'required',

        ]);

        $kategori = new Kategori();
        $kategori->name = $this->kategori;


        $kategori->save();

        $this->emit('kategori', $kategori->id);

        $this->notification()->success('Kategori Ditambahkan');

        $this->closeModalWithEvents([
            $this->emit('pg:eventRefresh-default')
        ]);
    }
    public function render()
    {
        return view('livewire.user.tambah-kategori');
    }
}
