<?php

namespace App\Http\Livewire\User\Pembelian;

use App\Models\ItemPembelianPengiriman;
use Livewire\Component;
use App\Models\Pengiriman;
use WireUi\Traits\Actions;

class PembelianPengirimanDetail extends Component
{
    use Actions;
    public $pengiriman_id;
    public function mount($pengiriman_id)
    {
        $this->pengiriman_id = $pengiriman_id;
    }

    public function pesananSampai()
    {
        $pengiriman = Pengiriman::where('id', '=', $this->pengiriman_id)->where('jenis', '=', 'pembelian')->first();
        $pengiriman->status = "Sampai";
        $pengiriman->save();

        $this->emit('tagihanUpdated', $this->pengiriman_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Status Diupdate');
    }

    public function pesananDikirim()
    {
        $pengiriman = Pengiriman::where('id', '=', $this->pengiriman_id)->where('jenis', '=', 'pembelian')->first();
        $pengiriman->status = "Dikirim";
        $pengiriman->save();

        $this->emit('tagihanUpdated', $this->pengiriman_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Status Diupdate');
    }

    public function render()
    {
        $orderItems = ItemPembelianPengiriman::where('pembelian_id', '=', $this->pengiriman_id)->get();
        $pengiriman = Pengiriman::with('pemesanan_pembelian', 'gudang')->where('id', '=', $this->pengiriman_id)->where('jenis', '=', 'pembelian')->first();
        return view('livewire.user.pembelian.pembelian-pengiriman-detail', ['pengiriman' => $pengiriman, 'orderItems' => $orderItems]);
    }
}
