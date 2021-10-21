<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\DB;

class OrderRepository extends Repository
{
    protected $order;
    protected $orderdetail;
    // protected $friend;

    public function __construct(Order $order, Orderdetail $orderdetail)
    {
        $this->order = $order;
        $this->orderdetail = $orderdetail;
    }

    public function store($params)
    {
        $this->order->create($params);
    }

    public function storeProduct($params)
    {
        $this->orderdetail->create($params);
    }

    public function update($orderId, $total)
    {
        return $this->order->where('id', '=', $orderId)->update(['total_money' => $total]);
    }

    public function orderId($userId)
    {
        $order = $this->order->where('user_id', '=', $userId)->latest()->first();
        $orderId = $order['id'];
        return $orderId;
    }

    public function listOrder()
    {
        return $this->order->join('customers', 'orders.customer_phone', '=', 'customers.phone')
                           ->select('customers.fullname', 'orders.*')->get();
    }

    public function listTypeOrder($orderType)
    {
        return $this->order->join('customers', 'orders.customer_phone', '=', 'customers.phone')
                           ->where('orders.type', '=', $orderType)
                           ->select('customers.fullname', 'orders.*')->get();
    }

    public function informationOrder($orderId)
    {
        $inforOrder = $this->order->join('customers', 'orders.customer_phone', '=', 'customers.phone')
                                 ->join('users', 'orders.user_id', '=', 'users.id')
                                 ->where('orders.id', '=', $orderId)
                                 ->select('users.name', 'customers.fullname', 'orders.*')->get();
        return $inforOrder;
    }

    public function listProductInOrder($orderId)
    {
        return $this->orderdetail->join('products', 'orderdetails.product_id', '=', 'products.id')
                                 ->where('orderdetails.order_id', '=', $orderId)
                                 ->select('orderdetails.size', 'orderdetails.quantity', 'products.*')->get();
    }

    public function totalOrder($orderId)
    {
        return $this->orderdetail->join('products', 'orderdetails.product_id', '=', 'products.id')
                                 ->where('orderdetails.order_id', '=', $orderId)
                                 ->selectRaw('sum((price -(price*discount/100))*quantity) as total')->get();
    }

    public function orderStatistics($params)
    {
        return $this->order->join('customers', 'orders.customer_phone', '=', 'customers.phone')
        ->whereBetween('orders.created_at', [$params['order_start'], $params['order_finish']])
        ->select('customers.fullname', 'orders.*')->paginate(10);
    }

    public function totalRevenue($params)
    {
        return $this->orderdetail->join('products', 'orderdetails.product_id', '=', 'products.id')
                                 ->join('orders', 'orderdetails.order_id', '=', 'orders.id')
                                 ->whereBetween('orders.created_at', [$params['order_start'], $params['order_finish']])
                                 ->where('orders.type', '=', 0)->orWhere('orders.status_online', '=', 3)
                                 ->selectRaw('sum((price -(price*discount/100))*quantity) as total')->get();
    }
}
