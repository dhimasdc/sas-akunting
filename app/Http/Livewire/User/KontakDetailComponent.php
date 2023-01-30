<?php

namespace App\Http\Livewire\User;

use App\Models\Biaya;
use App\Models\Kontak;
use Livewire\Component;

class KontakDetailComponent extends Component
{
    public $kontak_id;
    public function mount($kontak_id)
    {
        $this->kontak_id = $kontak_id;
    }

    public function render()
    {
        $kontak = Kontak::with('biaya')->where('id', $this->kontak_id)->first();
        $biaya = Biaya::with('kontak')->where('kontak_id', $this->kontak_id)->get();
        return view('livewire.user.kontak-detail-component', ['kontak' => $kontak, 'biaya' => $biaya]);
    }
}
