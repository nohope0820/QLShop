<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerRepository extends Repository
{
    protected $customer;
    // protected $friend;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function store($params)
    {
        $this->customer->create($params);
    }
}
