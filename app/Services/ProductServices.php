<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductServices
{
    protected $ProductRepository;

    public function __construct(ProductRepository $productRepository)
    {
        return $this->ProductRepository = $productRepository;
    }

    public function store(array $params)
    {
        return $this->ProductRepository->store($params);
    }

    public function storeSize(array $params)
    {
        return $this->ProductRepository->storeSize($params);
    }

    public function storeImage(array $params)
    {
        return $this->ProductRepository->storeImage($params);
    }

    public function destroy($id)
    {
        return $this->ProductRepository->destroy($id);
    }

    public function destroyImage($id)
    {
        return $this->ProductRepository->destroyImage($id);
    }

    public function destroySize($id)
    {
        return $this->ProductRepository->destroySize($id);
    }

    public function update(array $params, $id)
    {
        return $this->ProductRepository->update($params, $id);
    }

    public function listProduct()
    {
        return $this->ProductRepository->listProduct();
    }

    public function recordProduct($id)
    {
        return $this->ProductRepository->recordProduct($id);
    }

    public function recordProductSize($id)
    {
        return $this->ProductRepository->recordProductSize($id);
    }

    public function recordProductImage($id)
    {
        return $this->ProductRepository->recordProductImage($id);
    }

    public function showInformation($slug_product)
    {
        return $this->ProductRepository->showInformation($slug_product);
    }

    public function getInfo($id)
    {
        return $this->ProductRepository->getInfo($id);
    }
}
