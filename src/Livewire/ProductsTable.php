<?php

namespace Apydevs\Products\Livewire;

use Apydevs\Orders\Models\Order;
use Apydevs\Products\Models\Category;
use Apydevs\Products\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;


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

    public function mount() {
        $this->setFilter('status', 'active');
    }

    public function columns(): array
    {

        return [

            Column::make('ID', 'id')
                ->hideIf(true)
                ->sortable()->searchable(),
            Column::make('Title', 'title')
                ->sortable()->searchable(),
//            Column::make('type', 'type')
//                ->sortable()->searchable(),
//            Column::make('manufacture', 'manufacture')
//                ->sortable()->searchable(),
//            Column::make('model', 'model')
//                ->sortable()->searchable(),
//            Column::make('quantity', 'quantity')
//                ->sortable()->searchable(),
//            Column::make('low_quantity', 'low_quantity')
//                ->sortable()->searchable(),

            Column::make('Price', 'price')
                ->sortable()->searchable(),
//            Column::make('supplier_ref', 'supplier_ref')
//                ->sortable()->searchable(),
            Column::make('Category', 'category.name')->format(fn($row)=>ucfirst($row))
                ->sortable()->searchable(),
//            Column::make('Pre ordered', 'pre-order')
//                ->sortable()->searchable(),
            Column::make('Status', 'status')->format(fn($row)=>ucfirst($row))
                ->sortable()->searchable(),
            Column::make('Action')
                ->label(
                    fn ($row, Column $column) => view('products::components.livewire.datatables.action-column')->with(
                        [
                            'editLink' =>  route('products.edit', $row),
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
        return Product::query()->with('category');

    }


    public function filters(): array
    {

       $cat =  Category::select('id','name')->get();
        $categories = $cat->pluck('name', 'id')->all();



        return [
            SelectFilter::make('Status')
                ->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                    'draft' => 'Draft',
                ])
                ->setFirstOption('active')
                ->filter(function(Builder $builder, string $value) {
                    if ($value !== '') {
                        $builder->where('status', $value);
                    }
                }),
             SelectFilter::make('Categories')
                 ->options($categories)
                 ->setFirstOption('1')
                 ->filter(function(Builder $builder, string $value) {
                     if ($value !== '') {
                         $builder->where('category_id', $value);
                     }
                 })
        ];
    }





}
