<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
class Order extends Model
{protected $table = "orders";
    use HasFactory;
    public function belongstouser()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function detailes()
    {
        return $this->hasMany(OrderProduct::class,'order_id','id');
    }
}
