<?php

namespace App\Http\Livewire\User\Penjualan;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Penjualan_Penawaran;
use App\Models\ItemPenjualanPenawaran;

class PenjualanPenawaranDetail extends Component
{
    use Actions;
    public $penawaran_id;
    public function mount($penawaran_id)
    {
        $this->penawaran_id = $penawaran_id;
    }

    public function tandaiTerima()
    {
        $penawaran = Penjualan_Penawaran::where('id', '=', $this->penawaran_id)->first();
        $penawaran->status = "Disetujui";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->penawaran_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Penawaran Disetujui');
    }

    public function tandaiTerkirim()
    {
        $penawaran = Penjualan_Penawaran::where('id', '=', $this->penawaran_id)->first();
        $penawaran->status = "Selesai";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->penawaran_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Penawaran Selesai');
    }

    public function tandaiDitolak()
    {
        $penawaran = Penjualan_Penawaran::where('id', '=', $this->penawaran_id)->first();
        $penawaran->status = "Ditolak";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->penawaran_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Penawaran Ditolak');
    }
    public function render()
    {
        $orderItems = ItemPenjualanPenawaran::where('penjualan_id', '=', $this->penawaran_id)->get();
        $penawaran = Penjualan_Penawaran::where('id', '=', $this->penawaran_id)->first();
        return view('livewire.user.penjualan.penjualan-penawaran-detail', ['penawaran' => $penawaran, 'orderItems' => $orderItems]);
    }
}
