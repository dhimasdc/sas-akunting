<?php

namespace App\Http\Livewire\User\Pembelian;

use App\Models\ItemPembelianPemesanan;
use App\Models\ItemPenjualanPemesanan;
use App\Models\Pembelian_Pesanan;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Penjualan_Pesanan;

class PembelianPemesananDetail extends Component
{
    use Actions;
    public $pemesanan_id;
    public function mount($pemesanan_id)
    {
        $this->pemesanan_id = $pemesanan_id;
    }

    public function batalPesanan()
    {
        $penawaran = Pembelian_Pesanan::where('id', '=', $this->pemesanan_id)->first();
        $penawaran->status = "Dibatalkan";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->pemesanan_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Pemesanan Dibatalkan');
    }


    public function render()
    {
        $orderItems = ItemPembelianPemesanan::where('pembelian_id', '=', $this->pemesanan_id)->get();
        $pemesanan = Pembelian_Pesanan::where('id', '=', $this->pemesanan_id)->first();
        return view('livewire.user.pembelian.pembelian-pemesanan-detail', ['pemesanan' => $pemesanan, 'orderItems' => $orderItems]);
    }
}
