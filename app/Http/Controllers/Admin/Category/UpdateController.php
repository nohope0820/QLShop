<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryServices;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UpdateController extends Controller
{
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function edit($slug_category)
    {
        $record = $this->categoryServices->showInformation($slug_category);
        return view('layouts.Admin.Category.FormUpdate', ["record"=>$record]);
    }

    public function update(Request $request, $id)
    {

        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $params['slug_category'] = Str::slug($params['name'], '-');
        
        $this->categoryServices->update($params, $id);
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
