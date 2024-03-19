<?php
namespace App\Constants;

class Constants {
    const SERVICE_BASE_URL = '/api/services';
    const CUSTOMERS_QUERY_STRING = 'customers';
    const INVOICES_QUERY_STRING = 'invoices';
    const APPEND_CUSTOMERS_QUERY_STRING = '?tag=customers';
    const APPEND_INVOICES_QUERY_STRING = '?tag=invoices';
    const ALL_CUSTOMERS_URL = '/api/services?tag=customers';
    const STORE_CUSTOMER_URL = '/api/services?tag=customers';
    const ALL_INVOICES_URL = '/api/services?tag=invoices';
    const STORE_INVOICE_URL = '/api/services?tag=invoices';
}
