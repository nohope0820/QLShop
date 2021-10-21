<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\OrderServices;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    protected $orderServices;


    public function __construct(OrderServices $orderServices)
    {
        $this->orderServices = $orderServices;
    }

    public function index()
    {
        return view('layouts.Admin.Order.Statistics');
    }

    public function action(Request $request)
    {
        $params = $this->getParams($request);
        $orderStart = $params['order_start'];
        $orderFinish = $params['order_finish'];
        $orderStatistics = $this->orderServices->orderStatistics($params);
        $totalRevenue = $this->orderServices->totalRevenue($params);
        return view('layouts.Admin.Order.Statistics')->with('orderStart', $orderStart)
                                                     ->with('orderFinish', $orderFinish)
                                                     ->with('totalRevenue', $totalRevenue)
                                                     ->with('orderStatistics', $orderStatistics);
    }

    private function getParams(Request $request)
    {
        return $request->only(['order_start', 'order_finish']);
    }
}
