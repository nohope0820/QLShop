<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ProductServices;
use App\Services\CategoryServices;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    protected $productServices;
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices, ProductServices $productServices)
    {
        $this->productServices = $productServices;
        $this->categoryServices = $categoryServices;
    }

    public function create()
    {
        $data = $this->categoryServices->listCategory();
        return view('layouts.Admin.Product.FormCreate')->with('data', $data);
    }

    public function store(Request $request)
    {

        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);

        $params['image'] = $request->file('image')->getClientOriginalName();
        $image = $request->file('image');
        $storedPath = $image->move('images/product', $image->getClientOriginalName());

        $params['slug_product'] = Str::slug($params['ProductName'], '-');
        $this->productServices->store($params);
        return redirect(url('admin/product'));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'ProductName' => 'bail|required|min:10|max:100',
            'description' => ['required', 'string', 'max:255'],
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['ProductName', 'price', 'discount', 'description', 'image', 'category_id']);
    }
}
