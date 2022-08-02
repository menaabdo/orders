<?php

namespace App\Models;
use App\Models\Item;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{protected $table = "products";
    use HasFactory;
    public function belongstoitems()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }
}
