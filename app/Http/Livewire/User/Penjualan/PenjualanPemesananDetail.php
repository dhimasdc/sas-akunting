<?php

namespace App\Http\Livewire\User\Penjualan;

use App\Models\ItemPenjualanPemesanan;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Penjualan_Pesanan;

class PenjualanPemesananDetail extends Component
{
    use Actions;
    public $pemesanan_id;
    public function mount($pemesanan_id)
    {
        $this->pemesanan_id = $pemesanan_id;
    }

    public function batalPesanan()
    {
        $penawaran = Penjualan_Pesanan::where('id', '=', $this->pemesanan_id)->first();
        $penawaran->status = "Dibatalkan";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->pemesanan_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Pemesanan Dibatalkan');
    }


    public function render()
    {
        $orderItems = ItemPenjualanPemesanan::where('penjualan_id', '=', $this->pemesanan_id)->get();
        $pemesanan = Penjualan_Pesanan::where('id', '=', $this->pemesanan_id)->first();
        return view('livewire.user.penjualan.penjualan-pemesanan-detail', ['pemesanan' => $pemesanan, 'orderItems' => $orderItems]);
    }
}
