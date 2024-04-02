<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'email', 'phone', 'personal_id', 'type', 'status', 'avatar', 'address', 'password', 'remember_token'];
}
