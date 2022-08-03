<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;
class Detaile extends Model
{protected $table = "detailes";
    use HasFactory;
    public function belongstoorder()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function belongsproduct()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
