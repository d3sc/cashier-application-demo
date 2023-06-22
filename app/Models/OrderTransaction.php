<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
