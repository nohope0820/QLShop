<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductServices;

class DestroyController extends Controller
{
    protected $productServices;

    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }

    public function destroy($id)
    {
        $this->productServices->destroy($id);
        return redirect(url('admin/product'));
    }
}
