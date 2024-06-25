<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'ticket_id', 'title', 'description', 'ticket_img'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
