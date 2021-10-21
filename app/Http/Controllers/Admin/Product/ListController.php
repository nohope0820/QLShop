<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductServices;

class ListController extends Controller
{
    protected $productServices;

    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }

    public function index()
    {
        $data = $this->productServices->listProduct();
        return view('layouts.Admin.Product.Index')->with('data', $data);
    }
}
