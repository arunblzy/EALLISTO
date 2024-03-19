<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Customer;
use Illuminate\View\View;

class CustomerController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $allCustomersUrl = url(Constants::ALL_CUSTOMERS_URL);
        $deleteBaseUrl = url(Constants::SERVICE_BASE_URL);
        $appendQueryString = Constants::APPEND_CUSTOMERS_QUERY_STRING;
        return view('pages.customers.index', compact('allCustomersUrl', 'deleteBaseUrl', 'appendQueryString'));
    }

    /**
     * @return View
     */
    public function create() : View
    {
        $storeUrl = url(Constants::STORE_CUSTOMER_URL);
        return view('pages.customers.create', compact('storeUrl'));
    }

    /**
     * @param Customer $customer
     * @return View
     */
    public function edit(Customer $customer) : View
    {
        $customerUpdateUrl = url(Constants::SERVICE_BASE_URL.'/'.$customer->id.'?tag=customers');
        return view('pages.customers.edit', compact('customer', 'customerUpdateUrl'));
    }
}
