<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function create()
    {
        return view('layouts.Admin.Category.FormCreate');
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
        $storedPath = $image->move('images', $image->getClientOriginalName());
        $params['slug_category'] = Str::slug($params['name'], '-');
        $this->categoryServices->store($params);
        return redirect(url('admin/category'));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'bail|required|min:10|max:100|unique:categories',
            'description' => ['required', 'string', 'max:255'],
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['name', 'description', 'image']);
    }
}
