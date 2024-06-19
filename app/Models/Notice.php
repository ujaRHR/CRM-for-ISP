<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'title', 'description', 'notice_img'];
}
