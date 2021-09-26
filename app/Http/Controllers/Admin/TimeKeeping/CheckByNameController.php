<?php

namespace App\Http\Controllers\Admin\TimeKeeping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TimeKeepingServices;
use App\Services\EmployeeServices;

class CheckByNameController extends Controller
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
        $listEmployee = $this->employeeServices->listEmployee();
        return view('layouts.Admin.TimeKeeping.FormCheckByName')->with('listEmployee', $listEmployee);
    }

    public function checkByName(Request $request)
    {
        $MaNV = $request->only(['MaNV']);
        $listByName = $this->timekeepingServices->listByName($MaNV);
        $listEmployee = $this->employeeServices->listEmployee();
        return view('layouts.Admin.TimeKeeping.FormCheckByName')->with('listByName', $listByName)
                                                      ->with('listEmployee', $listEmployee);
    }
}
