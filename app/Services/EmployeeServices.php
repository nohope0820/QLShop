<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;

class EmployeeServices
{
    protected $EmployeeRepository;

    public function __construct(EmployeeRepository $accountRepository)
    {
        return $this->EmployeeRepository = $accountRepository;
    }

    public function listEmployee()
    {
        return $this->EmployeeRepository->listEmployee();
    }

    public function store(array $params)
    {
        return $this->EmployeeRepository->store($params);
    }

    public function update(array $params, $id)
    {
        return $this->EmployeeRepository->update($params, $id);
    }

    public function destroy($id)
    {
        return $this->EmployeeRepository->destroy($id);
    }

    public function showInformation($id)
    {
        return $this->EmployeeRepository->showInformation($id);
    }
}
