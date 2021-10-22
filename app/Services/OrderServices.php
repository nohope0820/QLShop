<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;

class OrderServices
{
    protected $OrderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        return $this->OrderRepository = $orderRepository;
    }

    public function store(array $params)
    {
        $params['user_id'] = Auth::user()->id;
        $params['type'] = 0;
        $params['total_money'] = "";
        $params['status_online'] = 0;
        return $this->OrderRepository->store($params);
    }

    public function storeProduct(array $params)
    {
        return $this->OrderRepository->storeProduct($params);
    }

    // public function reduceProduct(array $params)
    // {
    //     return $this->OrderRepository->reduceProduct($params);
    // }

    public function update($orderId, $total)
    {
        return $this->OrderRepository->update($orderId, $total);
    }

    public function listOrder()
    {
        return $this->OrderRepository->listOrder();
    }

    public function listTypeOrder($orderType)
    {
        return $this->OrderRepository->listTypeOrder($orderType);
    }

    public function orderId()
    {
        $userId = Auth::user()->id;
        return $this->OrderRepository->orderId($userId);
    }

    public function informationOrder($orderId)
    {
        return $this->OrderRepository->informationOrder($orderId);
    }

    public function listProductInOrder($orderId)
    {
        return $this->OrderRepository->listProductInOrder($orderId);
    }

    public function totalOrder($orderId)
    {
        return $this->OrderRepository->totalOrder($orderId);
    }

    public function orderStatistics($params)
    {
        return $this->OrderRepository->orderStatistics($params);
    }

    public function totalRevenue($params)
    {
        return $this->OrderRepository->totalRevenue($params);
    }
}
