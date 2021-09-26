<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryServices
{
    protected $CategoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        return $this->CategoryRepository = $categoryRepository;
    }

    public function store(array $params)
    {
        return $this->CategoryRepository->store($params);
    }

    public function destroy($id)
    {
        return $this->CategoryRepository->destroy($id);
    }

    public function update(array $params, $id)
    {
        return $this->CategoryRepository->update($params, $id);
    }

    public function listCategory()
    {
        return $this->CategoryRepository->listCategory();
    }

    public function showInformation($slug_category)
    {
        return $this->CategoryRepository->showInformation($slug_category);
    }
}
