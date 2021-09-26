<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryServices;

class ListController extends Controller
{
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function index()
    {
        $data = $this->categoryServices->listCategory();
        return view('layouts.Admin.Category.Index')->with('data', $data);
    }
}
