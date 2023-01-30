<?php

namespace App\Http\Livewire\User;

use App\Models\Hutang;
use App\Models\vendor;
use Livewire\Component;

class VendorComponent extends Component
{
    public function render()
    {
        $vendors = vendor::all();
        $piutangs =  Hutang::with('vendors')->sum('piutang');
        return view('livewire.user.vendor-component', ['vendors' => $vendors]);
    }
}
