<?php

namespace App\Service;
use App\Customer;

class CustomerService
{
    public function getCustomers()
    {
        return Customer::query()->select(['id', 'name'])->get();
    }
}

?>