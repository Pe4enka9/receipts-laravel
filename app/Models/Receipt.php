<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'created_at',
    ];
}
