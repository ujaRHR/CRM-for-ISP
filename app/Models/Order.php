<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Plan;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'plan_id', 'address', 'total_price', 'payment_method'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public  function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
