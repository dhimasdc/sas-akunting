<?php

namespace App\Http\Livewire\table;

use App\Models\Pembelian_Tagihan;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PembelianTagihan extends PowerGridComponent
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
     * @return Builder<\App\Models\Pembelian_Tagihan>
     */
    public function datasource(): Builder
    {
        return Pembelian_Tagihan::query();
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
            ->addColumn('kode', function (Pembelian_Tagihan $model) {
                return '<a href="' . route('user.pembelian.tagihan.detail', ['tagihan_id' => $model->id]) . '" class="bg-primary-500 p-1 rounded text-white hover:underline">' . ($model->kode) . '</a>';
            })
            ->addColumn('kontak', function (Pembelian_Tagihan $model) {
                return  '<span class="text-black dark:text-gray-200 py-1 text-xs">' . $model->kontak->perusahaan . '</span>' .
                    '<div><span class="text-black dark:text-gray-200 py-1 font-light text-xs">' . $model->kontak->name . '</span></div>';
            })
            ->addColumn('referensi')
            /** Example of custom column using a closure **/

            ->addColumn('tanggal_transaksi_formatted', fn (Pembelian_Tagihan $model) => Carbon::parse($model->tanggal_transaksi)->format('d/m/Y'))
            ->addColumn('tanggal_jatuh_tempo_formatted', fn (Pembelian_Tagihan $model) => Carbon::parse($model->kadaluarsa)->format('d/m/Y'))
            ->addColumn('status', function (Pembelian_Tagihan $model) {
                if ($model->status == 'Lunas') {
                    return '<span class="font-medium text-green-600 px-2 py-1 text-xs ">Lunas</span>';
                }
                if ($model->status == 'Belum Dibayar') {
                    return '<span class="font-medium text-red-500 px-2 py-1 text-xs ">Belum Dibayar</span>';
                }
                if ($model->status == 'Dibayar Sebagian') {
                    return '<span class="font-medium text-orange-500 px-2 py-1 text-xs ">Dibayar Sebagian</span>';
                }
            })
            ->addColumn('sisa_tagihan', function (Pembelian_Tagihan $model) {
                return number_format(($model->sisa_tagihan), 0, ',', '.');
            })
            ->addColumn('total', function (Pembelian_Tagihan $model) {
                return number_format(($model->total), 0, ',', '.');
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


            Column::make('SISA TAGIHAN', 'sisa_tagihan')
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
     * PowerGrid Pembelian_Tagihan Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('pembelian_-tagihan.edit', ['pembelian_-tagihan' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('pembelian_-tagihan.destroy', ['pembelian_-tagihan' => 'id'])
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
     * PowerGrid Pembelian_Tagihan Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($pembelian_-tagihan) => $pembelian_-tagihan->id === 1)
                ->hide(),
        ];
    }
    */
}
