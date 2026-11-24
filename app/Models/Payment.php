<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Bill;
use App\Models\User;

class Payment extends Model
{
    protected $fillable = [
        'bill_id',
        'receipt_number',
        'amount_paid',
        'payment_method',
        'reference_number',
        'received_by',
        'payment_date',
    ];

    protected function casts(): array
    {
        return [
            'amount_paid' => 'decimal:2',
            'payment_date' => 'datetime',
        ];
    }

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }

    public function cashier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'received_by');
    }
}

