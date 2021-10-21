<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Services\CategoryServices;

class EditDetailController extends Controller
{
    protected $productServices;
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices, ProductServices $productServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
    }

    public function index($id)
    {
        $recordProduct = $this->productServices->recordProduct($id);
        $recordProductSize = $this->productServices->recordProductSize($id);
        $recordProductImage = $this->productServices->recordProductImage($id);
        return view('layouts.Admin.Product.FormEditDetail')->with('id', $id)->with('recordProduct', $recordProduct)
                                                           ->with('recordProductSize', $recordProductSize)
                                                           ->with('recordProductImage', $recordProductImage);
    }
}
