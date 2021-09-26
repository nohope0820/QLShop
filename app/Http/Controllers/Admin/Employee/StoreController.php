<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmployeeServices;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    protected $employeeServices;

    public function __construct(EmployeeServices $employeeServices)
    {
        $this->employeeServices = $employeeServices;
    }

    public function create()
    {
        return view('layouts.Admin.Employee.FormCreate');
    }

    public function store(Request $request)
    {
        $validator = $this->getValidator($request);
        if ($validator->fails()) {
            return abort(422, $validator->errors());
        }
        $params = $this->getParams($request);
        $this->employeeServices->store($params);
        return redirect(url('admin/employee'));
    }

    private function getValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'name' => 'bail|required|min:10|max:100',
            'phone' => ['required', 'string', 'min:10', 'max:10', 'unique:employees'],
            'hsl' => ['required', 'min:6'],
            'address' => ['required', 'string', 'min:8'],
        ]);
    }

    private function getParams(Request $request)
    {
        return $request->only(['name', 'phone','date_of_birth', 'hsl', 'address']);
    }
}
