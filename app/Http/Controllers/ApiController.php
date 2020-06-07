<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CustomerService;

class ApiController extends Controller
{

    public function getCustomers(CustomerService $customer_service)
    {
        return response()->json($customer_service->getCustomers());
    }

    public function postCustomers(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $customer = new \App\Customer();
        $customer->name = $request->json('name');
        $customer->save();
    }

    public function getCustomer()
    {
    } 
    
    public function putCustomer()
    {        
    }

    public function deleteCustomer()
    {
    }

    public function getReports()
    {
    }

    public function postReport()
    {
    }

    public function getReport()
    {
    }

    public function putReport()
    {
    }

    public function deleteReport()
    {
    }
}
