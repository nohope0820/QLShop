<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmployeeServices;

class ListController extends Controller
{
    protected $employeeServices;

    public function __construct(EmployeeServices $employeeServices)
    {
        $this->employeeServices = $employeeServices;
    }

    public function index()
    {
        $data = $this->employeeServices->listEmployee();
        return view('layouts.Admin.Employee.Index')->with('data', $data);
    }
}
