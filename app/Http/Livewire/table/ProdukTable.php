<?php

namespace App\Http\Livewire\table;

use App\Models\Produk;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ProdukTable extends PowerGridComponent
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
     * @return Builder<\App\Models\Produk>
     */
    public function datasource(): Builder
    {
        return Produk::query()->with('kategori', 'satuan');
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
            ->addColumn('kategori', function (Produk $produk) {
                return $produk->kategori->name;
            })
            ->addColumn('sku')
            ->addColumn('satuan', function (Produk $produk) {
                return $produk->satuan->name;
            })
            ->addColumn('harga_beli', function (Produk $produk) {
                return number_format($produk->harga_beli, 0, ',', '.');
            })
            ->addColumn('harga_jual', function (Produk $produk) {
                return number_format($produk->harga_jual, 0, ',', '.');
            })
            ->addColumn('stok_id', function (Produk $produk) {
                return 0;
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

            Column::make('NAME', 'name')
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('KATEGORI', 'kategori')
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('SKU', 'sku')
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('SATUAN', 'satuan')
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('HARGA BELI', 'harga_beli')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-sm', 'text-left')
                ->bodyAttribute('text-sm text-right'),

            Column::make('HARGA JUAL', 'harga_jual')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-sm', 'text-left')
                ->bodyAttribute('text-sm text-right'),

            Column::make('QTY', 'stok_id')
                ->makeInputRange(),

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
     * PowerGrid Produk Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('produk.edit', ['produk' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('produk.destroy', ['produk' => 'id'])
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
     * PowerGrid Produk Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($produk) => $produk->id === 1)
                ->hide(),
        ];
    }
    */
}
