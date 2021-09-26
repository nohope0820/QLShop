<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmployeeServices;

class DestroyController extends Controller
{
    protected $employeeServices;

    public function __construct(EmployeeServices $employeeServices)
    {
        $this->employeeServices = $employeeServices;
    }

    public function destroy($id)
    {
        $this->employeeServices->destroy($id);
        return redirect(url('admin/employee'));
    }
}
