<?php

namespace Apydevs\Products\Livewire;

use Apydevs\Orders\Models\Order;
use Apydevs\Products\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;


class ProductsTable extends DataTableComponent
{
    //protected $model = Product::class;


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setConfigurableAreas([

            'toolbar-right-end' => 'products::components.add-product',
        ]);
    }

    public function columns(): array
    {

        return [

            Column::make('ID', 'id')
                ->hideIf(true)
                ->sortable()->searchable(),
            Column::make('title', 'title')
                ->sortable()->searchable(),
            Column::make('type', 'type')
                ->sortable()->searchable(),
            Column::make('manufacture', 'manufacture')
                ->sortable()->searchable(),
            Column::make('model', 'model')
                ->sortable()->searchable(),
            Column::make('quantity', 'quantity')
                ->sortable()->searchable(),
            Column::make('low_quantity', 'low_quantity')
                ->sortable()->searchable(),

            Column::make('price', 'price')
                ->sortable()->searchable(),
            Column::make('supplier_ref', 'supplier_ref')
                ->sortable()->searchable(),
            Column::make('category_id', 'category_id')
                ->sortable()->searchable(),
            Column::make('Pre ordered', 'pre-order')
                ->sortable()->searchable(),
            Column::make('status', 'status')
                ->sortable()->searchable(),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('products::components.livewire.datatables.action-column')->with(
                        [
                            'editLink' =>  $row,
                            'deleteLink' => route('products.destroy', $row),
                            'hoverName' => $row->title,
                            'id'=>$row->id
                        ]
                    )
                )->html(),
        ];

    }


    public function builder(): Builder
    {
        return Product::query();

    }
}
