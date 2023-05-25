<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'users_id',
        'nominals_id',
        'categories_id',
        'isFeatured',
        'status',
        'thumbnail',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function nominal()
    {
        return $this->belongsTo(Nominal::class, 'nominals_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
