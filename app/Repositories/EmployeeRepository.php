<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeRepository extends Repository
{
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }
    
    public function store($params)
    {
        $this->employee->create($params);
    }

    public function update($params, $id)
    {
        return $this->employee->where('id', '=', $id)
                          ->update(['name' => $params['name'],
                             'phone' => $params['phone'],
                             'address' => $params['address'],
                             'date_of_birth' => $params['date_of_birth'],
                             'hsl' => $params['hsl']
                             ]);
    }

    public function destroy($id)
    {
        return $this->employee->where('id', '=', $id)
                          ->delete();
    }

    public function listEmployee()
    {
        return $this->employee->paginate(10);
    }

    public function showInformation($id)
    {
        return $this->employee->where('id', '=', $id)->get();
    }
}
