<?php
namespace App\Services;

use App\Models\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CustomerService implements CustomerRepositoryInterface
{
    public function all(Request $request)
    {
        $customers = Customer::select('id', 'name', 'email', 'phone','address','created_at','updated_at')
            ->when($request->has('term'), function ($query) use ($request) {
                $query->whereAny([
                    'id',
                    'name',
                    'email',
                    'phone',
                ], 'LIKE', "%{$request->get('term')}%");
            });
        return DataTables::of($customers)->make(true);
    }

    public function create(array $data)
    {
        return Customer::create($data);
    }

    public function find(int $id)
    {
        return Customer::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $customer = $this->find($id);
        $customer->update($data);
        return $customer;
    }

    public function delete(int $id) : bool
    {
        return (bool) $this->find($id)->delete();
    }
}
