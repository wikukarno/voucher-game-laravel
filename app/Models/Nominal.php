<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nominal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'coinName', 'coinQuantity', 'price'
    ];
}
