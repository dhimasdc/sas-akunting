<?php

namespace App\Http\Livewire\User\Pembelian;

use App\Models\ItemPembelianPenawaran;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Penjualan_Penawaran;
use App\Models\ItemPenjualanPenawaran;
use App\Models\Pembelian_Penawaran;

class PembelianPenawaranDetail extends Component
{
    use Actions;
    public $penawaran_id;
    public function mount($penawaran_id)
    {
        $this->penawaran_id = $penawaran_id;
    }

    public function tandaiTerima()
    {
        $penawaran = Pembelian_Penawaran::where('id', '=', $this->penawaran_id)->first();
        $penawaran->status = "Disetujui";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->penawaran_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Penawaran Disetujui');
    }

    public function tandaiTerkirim()
    {
        $penawaran = Pembelian_Penawaran::where('id', '=', $this->penawaran_id)->first();
        $penawaran->status = "Selesai";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->penawaran_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Penawaran Selesai');
    }

    public function tandaiDitolak()
    {
        $penawaran = Pembelian_Penawaran::where('id', '=', $this->penawaran_id)->first();
        $penawaran->status = "Ditolak";
        $penawaran->save();

        $this->emit('tagihanUpdated', $this->penawaran_id);
        $this->emit('pg:eventRefresh-default');
        $this->notification()->success('Penawaran Ditolak');
    }
    public function render()
    {
        $orderItems = ItemPembelianPenawaran::where('pembelian_id', '=', $this->penawaran_id)->get();
        $penawaran = Pembelian_Penawaran::where('id', '=', $this->penawaran_id)->first();
        return view('livewire.user.pembelian.pembelian-penawaran-detail', ['penawaran' => $penawaran, 'orderItems' => $orderItems]);
    }
}
