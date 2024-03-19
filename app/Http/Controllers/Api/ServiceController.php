<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use App\Services\InvoiceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\StoreRequest as CustomerStoreRequest;
use App\Http\Requests\Customer\UpdateRequest as CustomerUpdateRequest;
use App\Http\Requests\Invoice\StoreRequest as InvoiceStoreRequest;
use App\Http\Requests\Invoice\UpdateRequest as InvoiceUpdateRequest;

class ServiceController extends Controller
{
    protected CustomerService $customerService;
    protected InvoiceService $invoiceService;

    public function __construct(
        CustomerService $customerService,
        InvoiceService $invoiceService
    )
    {
        $this->customerService = $customerService;
        $this->invoiceService = $invoiceService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $serviceType = $request->query('tag');
        switch ($serviceType) {
            case 'customers':
                return $this->customerService->all($request);
            case 'invoices':
                return $this->invoiceService->all($request);
            default:
                abort(404);
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $serviceType = $request->query('tag');
        switch ($serviceType) {
            case 'customers':
                $validatedData = $request->validate((new CustomerStoreRequest)->rules());
                return $this->customerService->create($validatedData);
            case 'invoices':
                $validatedData = $request->validate((new InvoiceStoreRequest)->rules());
                $validatedData['customer_id'] = $validatedData['customer'];
                return $this->invoiceService->create($validatedData);
            default:
                abort(404);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request,int $id)
    {
        $serviceType = $request->query('tag');
        switch ($serviceType) {
            case 'customers':
                $validatedData = $request->validate((new CustomerUpdateRequest)->rules());
                return $this->customerService->update($id, $validatedData);
            case 'invoices':
                $validatedData = $request->validate((new InvoiceUpdateRequest)->rules());
                $validatedData['customer_id'] = $validatedData['customer'];
                return $this->invoiceService->update($id, $validatedData);
            default:
                abort(404);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return bool|null
     */
    public function destroy(Request $request, int $id) : null|bool
    {
        $serviceType = $request->query('tag');
        switch ($serviceType) {
            case 'customers':
                return $this->customerService->delete($id);
            case 'invoices':
                return $this->invoiceService->delete($id);
            default:
                abort(404);
        }
    }
}
