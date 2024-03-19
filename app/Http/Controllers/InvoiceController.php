<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Invoice;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    /**
     * @return View
     */
    public function index() : View
    {
        $allInvoicesUrl = url(Constants::ALL_INVOICES_URL);
        $deleteBaseUrl = url(Constants::SERVICE_BASE_URL);
        $appendQueryString = Constants::APPEND_INVOICES_QUERY_STRING;
        return view('pages.invoices.index', compact('allInvoicesUrl', 'deleteBaseUrl', 'appendQueryString'));
    }

    /**
     * @return View
     */
    public function create() : View
    {
        $storeUrl = url(Constants::STORE_INVOICE_URL);
        return view('pages.invoices.create', compact('storeUrl'));
    }

    /**
     * @param Invoice $invoice
     * @return View
     */
    public function edit(Invoice $invoice) : View
    {
        $invoiceUpdateUrl = url(Constants::SERVICE_BASE_URL.'/'.$invoice->id.'?tag=invoices');
        return view('pages.invoices.edit', compact('invoice', 'invoiceUpdateUrl'));
    }
}
