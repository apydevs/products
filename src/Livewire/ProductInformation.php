<?php

namespace Apydevs\Products\Livewire;

use Apydevs\Customers\Models\Customer;
use Apydevs\Products\Models\Product;
use Livewire\Component;

class ProductInformation extends Component
{

    public $product;

    protected $listeners = ['productSelected'=>'selectedProduct','reset'=>'$refresh'];

    public function render()
    {
        return view('products::livewire.product-information');
    }


    public function selectedProduct($id)
    {
        $this->dispatch('reset');
        $this->product = Product::findOrFail($id);
    }
}
