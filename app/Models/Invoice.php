<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'date',
        'amount',
        'status',
    ];

    public const STATUS_PAID = 'Paid';
    public const STATUS_UNPAID = 'Unpaid';
    public const STATUS_CANCELLED = 'Cancelled';
    public const STATUSES = [
        self::STATUS_PAID,
        self::STATUS_UNPAID,
        self::STATUS_CANCELLED,
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id', 'customer_id');
    }

    protected function amount(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => amountDoubleToString($value),
            set: fn (string $value) => amountStringToDouble($value),
        );
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d-m-Y'),
            set: fn (string $value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d-m-Y')
        );
    }


    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d-m-Y')
        );
    }
}
