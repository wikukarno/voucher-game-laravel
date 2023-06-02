<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'banks_id',
        'type',
        'status'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'banks_id', 'id');
    }
}
