<?php
namespace App\Repositories;
use Illuminate\Http\Request;

interface InvoiceRepositoryInterface
{
    public function all(Request $request);
    public function create(array $data);
    public function find(int $id);
    public function update(int $id,array $data);
    public function delete(int $id);
}
