<?php

namespace App\Http\Livewire\User\Penjualan;;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ItemPenjualanTagihan;
use App\Models\Penjualan_Tagihan;

class PenjualanTagihanDetail extends Component
{
    use Actions;
    public $tagihan_id;
    public function mount($tagihan_id)
    {
        $this->tagihan_id = $tagihan_id;
    }

    public function batalPesanan()
    {
        $penawaran = Penjualan_Tagihan::where('id', '=', $this->tagihan_id)->first();
        $penawaran->status = "Dibatalkan";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->tagihan_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Pemesanan Dibatalkan');
    }


    public function render()
    {
        $orderItems = ItemPenjualanTagihan::where('penjualan_id', '=', $this->tagihan_id)->get();
        $tagihan = Penjualan_Tagihan::with('gudang')->where('id', '=', $this->tagihan_id)->first();
        return view('livewire.user.penjualan.penjualan-tagihan-detail', ['tagihan' => $tagihan, 'orderItems' => $orderItems]);
    }
}
