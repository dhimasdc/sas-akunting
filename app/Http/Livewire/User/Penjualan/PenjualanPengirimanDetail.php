<?php

namespace App\Http\Livewire\User\Penjualan;

use Livewire\Component;
use App\Models\ItemPenjualanPemesanan;
use App\Models\ItemPenjualanPengiriman;
use App\Models\Pengiriman;
use WireUi\Traits\Actions;
use App\Models\Penjualan_Pesanan;

class PenjualanPengirimanDetail extends Component
{
    use Actions;
    public $pengiriman_id;
    public function mount($pengiriman_id)
    {
        $this->pengiriman_id = $pengiriman_id;
    }

    public function pesananSampai()
    {
        $pengiriman = Pengiriman::where('id', '=', $this->pengiriman_id)->first();
        $pengiriman->status = "Sampai";
        $pengiriman->save();

        $this->emit('tagihanUpdated', $this->pengiriman_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Status Diupdate');
    }

    public function pesananDikirim()
    {
        $pengiriman = Pengiriman::where('id', '=', $this->pengiriman_id)->first();
        $pengiriman->status = "Dikirim";
        $pengiriman->save();

        $this->emit('tagihanUpdated', $this->pengiriman_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Status Diupdate');
    }

    public function render()
    {
        $orderItems = ItemPenjualanPengiriman::where('penjualan_id', '=', $this->pengiriman_id)->get();
        $pengiriman = Pengiriman::with('pemesanan', 'gudang')->where('id', '=', $this->pengiriman_id)->first();
        return view('livewire.user.penjualan.penjualan-pengiriman-detail', ['pengiriman' => $pengiriman, 'orderItems' => $orderItems]);
    }
}
