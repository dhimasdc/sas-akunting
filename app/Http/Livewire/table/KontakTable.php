<?php

namespace App\Http\Livewire\table;

use App\Models\Kontak;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class KontakTable extends PowerGridComponent
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
     * @return Builder<\App\Models\Kontak>
     */
    public function datasource(): Builder
    {
        return Kontak::query()->with('biaya');
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
            ->addColumn('name', function (Kontak $kontak) {
                return '<a href="' . route('user.kontak.detail', ['kontak_id' => $kontak->id]) . '"  class="bg-primary-500 p-1 rounded text-white hover:underline">' . ($kontak->name) . '</a>';
            })
            ->addColumn('tipe', function (Kontak $kontak) {
                return '<span class="bg-gray-200 dark:bg-gray-600 dark:text-gray-100 text-black px-2 py-1 rounded">' . $kontak->tipe . '</span>';
            })
            ->addColumn('perusahaan')
            ->addColumn('alamat')
            ->addColumn('email')
            ->addColumn('telepon')
            ->addColumn('hutang', function (Kontak $kontak) {
                if (!$kontak->biaya) {
                    return "0";
                } else {
                    $id = $kontak->id;
                    return number_format(($kontak->biaya->where('kontak_id', '=',  $id)->sum('hutang')), 0, ',', '.');
                }
            })
            ->addColumn('piutang', function (Kontak $kontak) {
                if (!$kontak->biaya) {
                    return "0";
                } else {
                    $id = $kontak->id;
                    return number_format(($kontak->biaya->where('kontak_id', '=',  $id)->sum('piutang')), 0, ',', '.');
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
            Column::make('NAMA', 'name')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('TIPE', 'tipe')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('PERUSAHAAN', 'perusahaan')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('ALAMAT', 'alamat')
                ->sortable()
                ->searchable()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('EMAIL', 'email')
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('TELEPON', 'telepon')
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs'),


            Column::make('ANDA HUTANG', 'hutang')
                ->sortable()
                ->searchable()
                ->makeInputRange()
                ->headerAttribute('text-xs')
                ->bodyAttribute('text-xs text-right'),


            Column::make('MEREKA HUTANG', 'piutang')
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
     * PowerGrid Kontak Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('kontak.edit', ['kontak' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('kontak.destroy', ['kontak' => 'id'])
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
     * PowerGrid Kontak Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($kontak) => $kontak->id === 1)
                ->hide(),
        ];
    }
    */
}
