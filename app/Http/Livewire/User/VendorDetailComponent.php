<?php

namespace App\Http\Livewire\User;

use App\Models\Hutang;
use App\Models\vendor;
use Livewire\Component;

class VendorDetailComponent extends Component
{
    public $vendor_id;
    public function mount($vendor_id)
    {
        $this->vendor_id = $vendor_id;
    }

    public function render()
    {
        $vendor = vendor::with('hutang')->where('id', $this->vendor_id)->first();
        $hutangs = Hutang::with('vendor')->where('vendor_id', $this->vendor_id)->get();
        return view('livewire.user.vendor-detail-component', ['vendor' => $vendor, 'hutangs' =>  $hutangs]);
    }
}
