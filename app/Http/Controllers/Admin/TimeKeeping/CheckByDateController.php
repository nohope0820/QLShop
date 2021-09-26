<?php

namespace App\Http\Controllers\Admin\TimeKeeping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TimeKeepingServices;
use App\Services\EmployeeServices;

class CheckByDateController extends Controller
{
    protected $timekeepingServices;
    protected $employeeServices;

    public function __construct(EmployeeServices $employeeServices, TimeKeepingServices $timekeepingServices)
    {
        $this->timekeepingServices = $timekeepingServices;
        $this->employeeServices = $employeeServices;
    }

    public function index()
    {
        return view('layouts.Admin.TimeKeeping.FormCheckByDate');
    }

    public function checkByDate(Request $request)
    {
        $date = $request->only(['check_date']);
        $listByDate = $this->timekeepingServices->listByDate($date);
        return view('layouts.Admin.TimeKeeping.FormCheckByDate')->with('listByDate', $listByDate);
    }
}
