<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $table = 'products_categories';
    protected $fillable = [
    	'product_category_id', 'product_id'
    ];
}
