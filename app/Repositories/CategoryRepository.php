<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends Repository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store($params)
    {
        $this->category->create($params);
    }

    public function destroy($id)
    {
        return $this->category->where('id', '=', $id)
                          ->delete();
    }

    public function listCategory()
    {
        return $this->category->paginate(5);
    }

    public function update($params, $id)
    {
        return $this->category->where('id', '=', $id)
                          ->update(['name' => $params['name'],
                             'description' => $params['description'],
                             'image' => $params['image']
                             ]);
    }

    public function showInformation($slug_category)
    {
        return $this->category->where('slug_category', '=', $slug_category)->get();
    }
}
