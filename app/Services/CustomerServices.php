<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerServices
{
    protected $CustomerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        return $this->CustomerRepository = $customerRepository;
    }

    public function store(array $params)
    {
        $params['email'] = "";
        $params['address'] = "";
        $params['password'] = "";
        return $this->CustomerRepository->store($params);
    }
}