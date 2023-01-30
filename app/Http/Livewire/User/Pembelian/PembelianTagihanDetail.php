<?php

namespace App\Http\Livewire\User\Pembelian;

use App\Models\ItemPembelianTagihan;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ItemPenjualanTagihan;
use App\Models\Pembelian_Tagihan;

class PembelianTagihanDetail extends Component
{
    use Actions;
    public $tagihan_id;
    public function mount($tagihan_id)
    {
        $this->tagihan_id = $tagihan_id;
    }

    public function batalPesanan()
    {
        $penawaran = Pembelian_Tagihan::where('id', '=', $this->tagihan_id)->first();
        $penawaran->status = "Dibatalkan";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->tagihan_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Pemesanan Dibatalkan');
    }


    public function render()
    {
        $orderItems = ItemPembelianTagihan::where('pembelian_id', '=', $this->tagihan_id)->get();
        $tagihan = Pembelian_Tagihan::with('gudang')->where('id', '=', $this->tagihan_id)->first();
        return view('livewire.user.pembelian.pembelian-tagihan-detail', ['tagihan' => $tagihan, 'orderItems' => $orderItems]);
    }
}
