<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{protected $table = "items";
    use HasFactory;
    public function hasproducts()
    {
        return $this->hasMany(Product::class);
    }
}
