<?php

namespace App\Http\Livewire;

use App\Models\ItemPenjualanTagihan;
use App\Models\Produk;
use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Dashboard extends Component
{
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];
    public $produkId = [];
    public $colors = [
        'food' => '#f6ad55',
        'shopping' => '#fc8181',
        'entertainment' => '#90cdf4',
        'travel' => '#66DA26',
        'other' => '#cbd5e0',
    ];

    public $firstRun = true;

    public $showDataLabels = false;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
        'onBlockClick' => 'handleOnBlockClick',
    ];

    public function handleOnPointClick($point)
    {
        dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        dd($column);
    }

    public function handleOnBlockClick($block)
    {
        dd($block);
    }

    public function render()
    {
        $produks = Produk::get();
        foreach ($produks as $key => $value) {
            $produk_id[] = $value->id;
            if ($this->produkId) {
                $order = ItemPenjualanTagihan::whereIn('produk_id', $this->produkId)->get();
            } else {
                $order = ItemPenjualanTagihan::whereIn('produk_id', $produk_id)->get();
            }
        }
        $columnChartModel = $order->groupBy('produk_id')
            ->reduce(
                function (ColumnChartModel $columnChartModel, $data) {
                    $product_name = $data->first()->name;
                    $value = $data->sum('total');
                    $warna[$data->first()->name] = '#' . dechex(rand(0x000000, 0xFFFFFF));

                    return $columnChartModel->addColumn($product_name, $value, $warna[$product_name]);
                },
                (new ColumnChartModel())
                    ->setTitle('Order Product')
                    ->setAnimated($this->firstRun)
                    ->withOnColumnClickEventName('onColumnClick')
            );
        return view('livewire.dashboard')->with([
            'columnChartModel' => $columnChartModel,
            'produks'  => $produks
        ]);
    }
}
