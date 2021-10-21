<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;

class ProductRepository extends Repository
{
    protected $product;
    protected $productSize;
    protected $productImage;

    public function __construct(Product $product, ProductSize $productSize, ProductImage $productImage)
    {
        $this->product = $product;
        $this->productSize = $productSize;
        $this->productImage = $productImage;
    }

    public function store($params)
    {
        $this->product->create($params);
    }

    public function storeSize($params)
    {
        $this->productSize->create($params);
    }

    public function storeImage($params)
    {
        $this->productImage->create($params);
    }

    public function destroy($id)
    {
        return $this->product->where('id', '=', $id)
                          ->delete();
    }

    public function destroyImage($id)
    {
        return $this->productImage->where('id', '=', $id)
                          ->delete();
    }

    public function destroySize($id)
    {
        return $this->productSize->where('id', '=', $id)
                          ->delete();
    }

    public function listProduct()
    {
        return $this->product->join('categories', 'categories.id', '=', 'products.category_id')
                             ->select('categories.name', 'products.*')
                             ->paginate(10);
    }

    public function recordProduct($id)
    {
        return $this->product->where('id', '=', $id)
                             ->get();
    }

    public function recordProductSize($id)
    {
        return $this->productSize->where('product_id', '=', $id)
                             ->get();
    }

    public function recordProductImage($id)
    {
        return $this->productImage->where('product_id', '=', $id)
                             ->get();
    }

    public function update($params, $id)
    {
        return $this->product->where('id', '=', $id)
                          ->update(['ProductName' => $params['ProductName'],
                                    'description' => $params['description'],
                                    'image' => $params['image'],
                                    'discount' => $params['discount'],
                                    'price' => $params['price'],
                                    'category_id' => $params['category_id'],
                                    'slug_product' => $params['slug_product']
                             ]);
    }

    public function showInformation($slug_product)
    {
        return $this->product->where('slug_product', '=', $slug_product)->get();
    }

    public function getInfo($id)
    {
        return $this->product->join('product_sizes', 'products.id', '=', 'product_sizes.product_id')
                             ->where('products.id', '=', $id)->get();
    }
}
