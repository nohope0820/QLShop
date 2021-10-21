<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Services\CategoryServices;

class ImageController extends Controller
{
    //protected $productServices;
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices, ProductServices $productServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
    }

    public function storeImage(Request $request, $id)
    {
        $image = $request->file('image');
        $params['image'] = $image->getClientOriginalName();
        $image->move('images/product', $image->getClientOriginalName());
        $params['product_id'] = $id;
        $this->productServices->storeImage($params);
        return redirect(url('admin/product/editDetail', ['id' => $id]));
    }

    public function destroyImage($product_id, $id)
    {
        $this->productServices->destroyImage($id);
        return redirect(url('admin/product/editDetail', ['id' => $product_id]));
    }
}
