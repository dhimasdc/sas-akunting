<?php

namespace App\Http\Livewire\table;

use App\Models\Pengiriman;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PenjualanPengiriman extends PowerGridComponent
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
     * @return Builder<\App\Models\Pengiriman>
     */
    public function datasource(): Builder
    {
        return Pengiriman::query()->where('jenis', '=', 'penjualan');
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
            ->addColumn('kode', function (Pengiriman $model) {
                return '<a href="' . route('user.penjualan.pengiriman.detail', ['pengiriman_id' => $model->id]) . '" class="bg-primary-500 p-1 rounded text-white hover:underline">' . ($model->kode) . '</a>';
            })
            /** Example of custom column using a closure **/
            ->addColumn('kode_lower', function (Pengiriman $model) {
                return strtolower(e($model->kode));
            })

            ->addColumn('jenis')
            ->addColumn('kontak', function (Pengiriman $model) {
                return  '<span class="text-black dark:text-gray-200 py-1 text-xs">' . $model->kontak->perusahaan . '</span>' .
                    '<div><span class="text-black dark:text-gray-200 py-1 font-light text-xs">' . $model->kontak->name . '</span></div>';
            })
            ->addColumn('referensi')
            ->addColumn('tanggal_pengiriman_formatted', fn (Pengiriman $model) => Carbon::parse($model->tanggal_pengiriman)->format('d/m/Y'))
            ->addColumn('biaya_pengiriman')
            ->addColumn('status', function (Pengiriman $model) {
                if ($model->status == 'Diproses') {
                    return '<span class="font-medium text-orange-500 px-2 py-1 text-xs ">Diproses</span>';
                }
                if ($model->status == 'Dikirim') {
                    return '<span class="font-medium text-teal-500 px-2 py-1 text-xs ">Dikirim</span>';
                }
                if ($model->status == 'Sampai') {
                    return '<span class="font-medium  text-green-600 px-2 py-1 text-xs ">Sampai</span>';
                }
            })
            ->addColumn('ekspedisi')
            ->addColumn('nomor_resi')
            ->addColumn('pembelian_id')
            ->addColumn('penjualan_id')
            ->addColumn('created_at_formatted', fn (Pengiriman $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Pengiriman $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
                ->makeInputRange()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),

            Column::make('TANGGAL PENGIRIMAN', 'tanggal_pengiriman_formatted', 'tanggal_pengiriman')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs')
                ->makeInputDatePicker(),

            Column::make('STATUS', 'status')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),
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
     * PowerGrid Pengiriman Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('pengiriman.edit', ['pengiriman' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('pengiriman.destroy', ['pengiriman' => 'id'])
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
     * PowerGrid Pengiriman Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($pengiriman) => $pengiriman->id === 1)
                ->hide(),
        ];
    }
    */
}
