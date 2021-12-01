<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','purchase_price', 'selling_price', 'description', 'status', 'image_path', 'category_id', 'stock', 'tag'];
}
