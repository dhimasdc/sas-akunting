<?php

namespace App\Http\Livewire\table;

use App\Models\Penjualan_Pesanan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PenjualanPesanan extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Penjualan_Pesanan>
     */
    public function datasource(): Builder
    {
        return Penjualan_Pesanan::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [
            'Kontak' => [
                'name',
                'perusahaan'
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('kode', function (Penjualan_Pesanan $model) {
                return '<a href="' . route('user.penjualan.pemesanan.detail', ['pemesanan_id' => $model->id]) . '" class="bg-primary-500 p-1 rounded text-white hover:underline">' . ($model->kode) . '</a>';
            })
            ->addColumn('kontak', function (Penjualan_Pesanan $model) {
                return  '<span class="text-black dark:text-gray-200 py-1 text-xs">' . $model->kontak->perusahaan . '</span>' .
                    '<div><span class="text-black dark:text-gray-200 py-1 font-light text-xs">' . $model->kontak->name . '</span></div>';
            })
            ->addColumn('sales_id')
            ->addColumn('referensi')

            /** Example of custom column using a closure **/
            ->addColumn('referensi_lower', function (Penjualan_Pesanan $model) {
                return strtolower(e($model->referensi));
            })

            ->addColumn('tanggal_transaksi_formatted', fn (Penjualan_Pesanan $model) => Carbon::parse($model->tanggal_transaksi)->format('d/m/Y'))
            ->addColumn('tanggal_jatuh_tempo_formatted', fn (Penjualan_Pesanan $model) => Carbon::parse($model->tanggal_jatuh_tempo)->format('d/m/Y'))
            ->addColumn('status', function (Penjualan_Pesanan $model) {
                if ($model->status == 'Open') {
                    return '<span class="font-medium text-orange-500 px-2 py-1 text-xs ">Open</span>';
                }
                if ($model->status == 'Selesai') {
                    return '<span class="font-medium text-green-600 px-2 py-1 text-xs ">Selesai</span>';
                }
                if ($model->status == 'Dibatalkan') {
                    return '<span class="font-medium  text-red-500 px-2 py-1 text-xs ">Dibatalkan</span>';
                }
            })
            ->addColumn('sisa_tagihan')
            ->addColumn('sub_total')
            ->addColumn('diskon')
            ->addColumn('uang_muka', function (Penjualan_Pesanan $model) {
                return  number_format(($model->uang_muka), 0, ',', '.');
            })
            ->addColumn('pengiriman_id')
            ->addColumn('pajak')
            ->addColumn('pajak_id')
            ->addColumn('total', function (Penjualan_Pesanan $model) {
                return  number_format(($model->total), 0, ',', '.');
            })
            ->addColumn('termin')
            ->addColumn('gudang_id')
            ->addColumn('produk_id')
            ->addColumn('attachment')
            ->addColumn('pesan')
            ->addColumn('created_at_formatted', fn (Penjualan_Pesanan $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Penjualan_Pesanan $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [

            Column::make('KODE', 'kode')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('PELANGGAN', 'kontak')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('REFERENSI', 'referensi')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('TANGGAL', 'tanggal_transaksi_formatted', 'tanggal_transaksi')
                ->sortable()
                ->makeInputDatePicker()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('TANGGAL JATUH TEMPO', 'tanggal_jatuh_tempo_formatted', 'tanggal_jatuh_tempo')
                ->sortable()
                ->makeInputDatePicker()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('STATUS', 'status')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('DP', 'uang_muka')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs', 'text-left')
                ->bodyAttribute('text-xs text-right'),


            Column::make('TOTAL', 'total')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs', 'text-left')
                ->bodyAttribute('text-xs text-right'),

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Penjualan_Pesanan Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('penjualan_-pesanan.edit', ['penjualan_-pesanan' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('penjualan_-pesanan.destroy', ['penjualan_-pesanan' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Penjualan_Pesanan Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($penjualan_-pesanan) => $penjualan_-pesanan->id === 1)
                ->hide(),
        ];
    }
    */
}
