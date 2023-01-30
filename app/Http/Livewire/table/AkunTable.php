<?php

namespace App\Http\Livewire\table;

use App\Models\Akun;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AkunTable extends PowerGridComponent
{
    use ActionButton;

    protected $listeners = [
        'akunCreated' => '$refresh'
    ];
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
     * @return Builder<\App\Models\Akun>
     */
    public function datasource(): Builder
    {
        return Akun::query();
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
            ->addColumn('name', function (Akun $model) {
                return '<a href="' . route('user.akun', ['akun_id' => $model->id]) . '" class="font-medium text-indigo-500 hover:text-indigo-800 hover:underline">' . ($model->name) . '</a>';
            })
            /** Example of custom column using a closure **/
            ->addColumn('name_lower', function (Akun $model) {
                return strtolower(e($model->name));
            })

            ->addColumn('kode')
            ->addColumn('kategori')
            ->addColumn('sub_akun')
            ->addColumn('saldo')
            ->addColumn('created_at_formatted', fn (Akun $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Akun $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
                ->headerAttribute('text-sm text-left')
                ->bodyAttribute('text-sm text-left'),

            Column::make('KODE', 'kode')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('KATEGORI', 'kategori')
                ->sortable()
                ->searchable()
                ->makeInputText()
                ->headerAttribute('text-sm')
                ->bodyAttribute('text-sm'),

            Column::make('SALDO', 'saldo')
                ->sortable()
                ->makeInputRange()
                ->headerAttribute('text-sm')
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
     * PowerGrid Akun Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('akun.edit', ['akun' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('akun.destroy', ['akun' => 'id'])
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
     * PowerGrid Akun Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($akun) => $akun->id === 1)
                ->hide(),
        ];
    }
    */
}
