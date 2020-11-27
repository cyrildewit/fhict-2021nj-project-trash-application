<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrashCan extends Model
{
    use HasFactory;

    public $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFromCustomer($query, Customer $customer)
    {
        return $query->where('customer_id', $customer->id);
    }
}
