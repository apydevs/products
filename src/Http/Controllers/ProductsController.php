<?php

namespace Apydevs\Products\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Apydevs\Products\Http\Requests\StoreProductRequest;
use Apydevs\Products\Models\Category;
use Apydevs\Products\Models\Product;
use Illuminate\Http\Request;
use Usernotnull\Toast\Concerns\WireToast;

class ProductsController extends Controller
{

    use WireToast;
    public function index(){

        return view('products::index',[
            'count'=>Product::count()
        ]);
    }




    public function create(){

        return view('products::create',[
            'categories'=>Category::get()
        ]);

    }


    public function store(StoreProductRequest $request) {
        $validated = $request->validated();
        $mainImage = null;

        if ($request->hasFile('main')) {
            $path = $request->file('main')->store('images', 'public');
            $mainImage = asset($path);
        }

        // Create the product
        $product = Product::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category'],
            'status' => $validated['status'],
            'quickcode' => $validated['quickcode'],
            'sku' => $validated['sku'],
            'price' => $validated['baseprice'],
            'tier1' => $validated['tier1'],
            'tier2' => $validated['tier2'],
            'tier3' => $validated['tier3'],
            'quantity' => 10,
            'main_image' => $mainImage
        ]);

        // Handle file uploads
        if ($request->hasFile('file-upload')) {
            $data = [];

            // Iterate over each uploaded file
            foreach ($request->file('file-upload') as $file) {
                $path = $file->store('images', 'public');
                $data[] = asset($path);
            }

            // If there are uploaded files, store their paths in the database
            if (count($data) > 0) {
                $product->product_images = json_encode($data);
                $product->save();
            }

            // Debugging information

        }

        toast()->success('Product created successfully')->pushOnNextPage();
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }


}
