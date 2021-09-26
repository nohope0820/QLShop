<?php

namespace App\Http\Controllers\Admin\TimeKeeping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TimeKeepingServices;
use App\Services\EmployeeServices;

class CheckSalaryController extends Controller
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
        return view('layouts.Admin.TimeKeeping.FormCheckSalary');
    }

    public function checkSalary(Request $request)
    {
        $params = $this->getParams($request);
        $salaryPerEmployee = $this->timekeepingServices->salaryPerEmployee($params);
        return view('layouts.Admin.TimeKeeping.FormCheckSalary')->with('salaryPerEmployee', $salaryPerEmployee);
    }

    private function getParams(Request $request)
    {
        return $request->only(['check_date_start', 'check_date_finish']);
    }
}
