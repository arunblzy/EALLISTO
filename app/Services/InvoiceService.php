<?php
namespace App\Services;

use App\Models\Invoice;
use App\Repositories\InvoiceRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InvoiceService implements InvoiceRepositoryInterface
{
    public function all(Request $request)
    {
        $invoices = Invoice::with(['customer' => function ($query) {
            $query->select('id', 'name');
        }])
            ->select(
                'id',
                'customer_id',
                'date',
                'amount',
                'status',
                'created_at',
                'updated_at'
            )
            ->when($request->has('term'), function ($query) use ($request) {
                $term = $request->input('term');
                $searchDate = date('Y-m-d', strtotime($term));
                $amount = ($term) ? amountStringToDouble($term) : $term;
                $query->where(function ($subQuery) use ($term, $searchDate,$amount) {
                    $subQuery->where('date', 'like', '%' . $searchDate . '%')
                        ->orWhere('amount', 'like', '%' . $amount . '%')
                        ->orWhere('status', 'like', '%' . $term . '%')
                        ->orWhereHas('customer', function ($q) use ($term) {
                            $q->where('name', 'like', '%' . $term . '%');
                        });
                });
            });
        return DataTables::of($invoices)->make(true);
    }

    public function create(array $data)
    {
        return Invoice::create($data);
    }

    public function find(int $id)
    {
        return Invoice::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $invoice = $this->find($id);
        $invoice->update($data);
        return $invoice;
    }

    public function delete(int $id) : bool
    {
        return (bool) $this->find($id)->delete();
    }
}
