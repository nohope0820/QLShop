<?php

namespace App\Http\Controllers\Admin\TimeKeeping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TimeKeepingServices;
use App\Services\EmployeeServices;

class StoreController extends Controller
{
    protected $timekeepingServices;
    protected $employeeServices;

    public function __construct(EmployeeServices $employeeServices, TimeKeepingServices $timekeepingServices)
    {
        $this->timekeepingServices = $timekeepingServices;
        $this->employeeServices = $employeeServices;
    }

    public function store(Request $request, $id)
    {
        $params = $this->getParams($request);
        $params['MaNV'] = $id;
        $params['note'] = ' ';
        $check = $this->timekeepingServices->checkTimeKeeping($params);
        if ($check == 0) {
            $this->timekeepingServices->store($params);
            return redirect(url('admin/timekeeping'));
        } else {
            return redirect(url('admin/timekeeping'))->with('alert', 'Bạn đã chấm công hôm nay cho người này rồi');
        }
    }

    private function getParams(Request $request)
    {
        return $request->only(['SoCong','working_day']);
    }
}
