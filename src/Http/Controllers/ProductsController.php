<?php

namespace Apydevs\Products\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(){

        return view('products::index',[
            'count'=>1
        ]);
    }
}
