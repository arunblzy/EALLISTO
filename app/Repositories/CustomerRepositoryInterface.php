<?php
namespace App\Repositories;

use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use Illuminate\Http\Request;

interface CustomerRepositoryInterface
{
    public function all(Request $request);
    public function create(array $data);
    public function find(int $id);
    public function update(int $id,array $data);
    public function delete(int $id);
}
