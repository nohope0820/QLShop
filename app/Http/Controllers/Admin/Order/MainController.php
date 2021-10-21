<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\OrderServices;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $orderServices;


    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

    public function index()
    {
        $listOrder = $this->orderServices->listOrder();
        return view('layouts.Admin.Order.Index')->with('listOrder', $listOrder);
    }

    public function type($type)
    {
        if ($type == 'offline') {
            $typeOrder = 0;
            $listTypeOrder = $this->orderServices->listTypeOrder($typeOrder);
            return view('layouts.Admin.Order.Offline')->with('listTypeOrder', $listTypeOrder);
        } else {
            $typeOrder = 1;
            $listTypeOrder = $this->orderServices->listTypeOrder($typeOrder);
            return view('layouts.Admin.Order.Online')->with('listTypeOrder', $listTypeOrder);
        }
    }

    public function detail($id)
    {
        $informationOrder = $this->orderServices->informationOrder($id);
        $listProductInOrder = $this->orderServices->listProductInOrder($id);
        return view('layouts.Admin.Order.Detail')->with('informationOrder', $informationOrder)
                                                 ->with('listProductInOrder', $listProductInOrder);
    }
}
