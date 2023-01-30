<?php

namespace App\Http\Livewire\table;

use App\Models\Asset;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AssetTetapTable extends PowerGridComponent
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
     * @return Builder<\App\Models\Asset>
     */
    public function datasource(): Builder
    {
        return Asset::query()->with('satuan');
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
            ->addColumn('id')
            ->addColumn('name')

            /** Example of custom column using a closure **/
            ->addColumn('name_lower', function (Asset $model) {
                return strtolower(e($model->name));
            })

            ->addColumn('gambar')
            ->addColumn('kode')
            ->addColumn('tanggal_pembelian_formatted', fn (Asset $model) => Carbon::parse($model->tanggal_pembelian)->format('d/m/Y'))
            ->addColumn('harga_nilai', function (Asset $model) {
                return number_format($model->harga_nilai, 0, ',', '.');
            })
            ->addColumn('qty')
            ->addColumn('satuan', function (Asset $model) {
                return $model->satuan->name;
            })
            ->addColumn('harga_total', function (Asset $model) {
                return number_format($model->harga_total, 0, ',', '.');
            })
            ->addColumn('akun_id');
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

            Column::make('NAMA', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('KODE', 'kode')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('TANGGAL PEMBELIAN', 'tanggal_pembelian_formatted', 'tanggal_pembelian')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('HARGA NILAI', 'harga_nilai')
                ->sortable()
                ->makeInputRange()
                ->headerAttribute('text-sm', 'text-left')
                ->bodyAttribute('text-sm text-right'),

            Column::make('QTY', 'qty')
                ->sortable()
                ->makeInputRange(),

            Column::make('Satuan', 'satuan')
                ->sortable()
                ->makeInputRange()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('HARGA TOTAL', 'harga_total')
                ->sortable()
                ->makeInputRange()
                ->headerAttribute('text-sm', 'text-left')
                ->bodyAttribute('text-sm text-right'),

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
     * PowerGrid Asset Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('asset.edit', ['asset' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('asset.destroy', ['asset' => 'id'])
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
     * PowerGrid Asset Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($asset) => $asset->id === 1)
                ->hide(),
        ];
    }
    */
}
