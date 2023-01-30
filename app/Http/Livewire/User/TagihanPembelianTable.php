<?php

namespace App\Http\Livewire\user;

use App\Models\tagihan_pembelian;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class TagihanPembelianTable extends PowerGridComponent
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
     * @return Builder<\App\Models\tagihan_pembelian>
     */
    public function datasource(): Builder
    {
        return tagihan_pembelian::query()->join('vendors', 'tagihan_pembelians.vendor_id', '=', 'vendors.id')
            ->select('tagihan_pembelians.*', 'vendors.perusahaan as vendor', 'vendors.name as vendor_name');
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
        return [];
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
            ->addColumn('kode', function (tagihan_pembelian $model) {
                return '<a href="#" class="text-blue-700 dark:text-cyan-400">' . ($model->kode) . '</a>';
            })
            ->addColumn('vendor', function (tagihan_pembelian $model) {

                return  '<span class="text-black dark:text-gray-200 px-2 py-1 text-sm">' . $model->vendor . '</span>' .
                    '<div><span class="text-black dark:text-gray-200 px-2 py-1 font-light text-xs">' . $model->vendor_name . '</span></div>';
            })
            ->addColumn('referensi')
            ->addColumn('tanggal_transaksi_formatted', fn (tagihan_pembelian $model) => Carbon::parse($model->tanggal_transaksi)->format('d/m/Y'))
            ->addColumn('tanggal_jatuh_tempo_formatted', fn (tagihan_pembelian $model) => Carbon::parse($model->tanggal_jatuh_tempo)->format('d/m/Y'))
            ->addColumn('status', function (tagihan_pembelian $model) {
                if ($model->status == 'Lunas') {
                    return '<span class="bg-success text-gray-100 px-2 py-1 text-xs rounded">Lunas</span>';
                }
                if ($model->status == 'Belum_Dibayar') {
                    return '<span class="bg-red-500 text-gray-100 px-2 py-1 text-xs rounded">Belum Dibayar</span>';
                }
                if ($model->status == 'Dibayar_Sebagian') {
                    return '<span class="bg-amber-500 text-gray-100 px-2 py-1 text-xs rounded">Dibayar Sebagian</span>';
                }
            })
            ->addColumn('sisa_tagihan', function (tagihan_pembelian $model) {
                if ($model->sisa_tagihan == 0) {
                    return '0';
                } else {
                    return  "Rp." . number_format($model->sisa_tagihan, 0, ',', '.');
                }
            })
            ->addColumn('total', function (tagihan_pembelian $model) {
                if ($model->total == 0) {
                    return '0';
                } else {
                    return  "Rp." . number_format($model->total, 0, ',', '.');
                }
            });
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
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),



            Column::make('VENDOR', 'vendor')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('REFERENSI', 'referensi')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('TANGGAL TRANSAKSI', 'tanggal_transaksi_formatted', 'tanggal_transaksi')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('TANGGAL JATUH TEMPO', 'tanggal_jatuh_tempo_formatted', 'tanggal_jatuh_tempo')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('STATUS', 'status')
                ->sortable()
                ->searchable()
                ->makeInputSelect(tagihan_pembelian::all(), 'status', 'status')
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs text-center'),

            Column::make('SISA TAGIHAN', 'sisa_tagihan')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs text-right'),


            Column::make('TOTAL', 'total')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-xs')
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
     * PowerGrid tagihan_pembelian Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('tagihan_pembelian.edit', ['tagihan_pembelian' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('tagihan_pembelian.destroy', ['tagihan_pembelian' => 'id'])
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
     * PowerGrid tagihan_pembelian Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($tagihan_pembelian) => $tagihan_pembelian->id === 1)
                ->hide(),
        ];
    }
    */
}
