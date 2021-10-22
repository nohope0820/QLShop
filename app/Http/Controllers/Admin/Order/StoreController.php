<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\CustomerServices;
use App\Services\OrderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Services\ProductServices;

class StoreController extends Controller
{
    protected $orderServices;
    protected $customerServices;
    protected $productServices;

    public function __construct(OrderServices $orderServices, CustomerServices $customerServices, ProductServices $productServices)
    {
        $this->orderServices = $orderServices;
        $this->customerServices = $customerServices;
        $this->productServices = $productServices;
    }

    public function index()
    {
        return view('layouts.Admin.Order.FormCreate');
    }

    public function addProduct()
    {
        $orderId = $this->orderServices->orderId();
        $informationOrder = $this->orderServices->informationOrder($orderId);
        $listProductInOrder = $this->orderServices->listProductInOrder($orderId);
        $totalOrder = $this->orderServices->totalOrder($orderId);
        return view('layouts.Admin.Order.FormAddProduct')->with('informationOrder', $informationOrder)
                                                         ->with('listProductInOrder', $listProductInOrder)
                                                         ->with('totalOrder', $totalOrder)
                                                         ->with('orderId', $orderId);
    }

    public function familiarCustomer(Request $request)
    {
        $params = $request->only(['customer_phone']);
        $this->orderServices->store($params);
        $orderId = $this->orderServices->orderId();
        return redirect(url('admin/order/xac-nhan-don-hang', ['id' => $orderId]));
    }

    public function newCustomer(Request $request)
    {
        $infors = $request->only(['fullname', 'phone']);
        $params['customer_phone'] = $infors['phone'];
        $this->orderServices->store($params);
        $this->customerServices->store($infors);
        $orderId = $this->orderServices->orderId();
        return redirect(url('admin/order/xac-nhan-don-hang', ['id' => $orderId]));
    }

    public function storeProduct(Request $request, $orderId)
    {
        $params = $this->getParams($request);
        $params['order_id'] = $orderId;
        $this->orderServices->storeProduct($params);
        // $this->orderServices->reduceProduct($params);
        return redirect(url('admin/order/xac-nhan-don-hang', ['id' => $orderId]));
    }

    public function update($orderId, $total)
    {
        $this->orderServices->update($orderId, $total);
        return redirect(url('admin/order'));
    }

    private function getParams(Request $request)
    {
        return $request->only(['product_id', 'size', 'quantity']);
    }

    public function getInfo($id)
    {
        $fill = $this->productServices->getInfo($id);
        return Response::json(['success'=>true, 'info'=>$fill]);
    }
}
