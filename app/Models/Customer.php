<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'email', 'phone', 'personal_id', 'type', 'status', 'avatar', 'address', 'password', 'reset_token'];

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
