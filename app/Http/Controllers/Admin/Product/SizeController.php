<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Services\CategoryServices;

class SizeController extends Controller
{
    protected $productServices;
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices, ProductServices $productServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
    }

    public function storeSize(Request $request, $id)
    {
        $params = $request->only(['size', 'slco']);
        $params['product_id'] = $id;
        $this->productServices->storeSize($params);
        return redirect(url('admin/product/editDetail', ['id' => $id]));
    }

    public function destroySize($product_id, $id)
    {
        $this->productServices->destroySize($id);
        return redirect(url('admin/product/editDetail', ['id' => $product_id]));
    }
}
