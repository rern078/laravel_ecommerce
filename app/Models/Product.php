<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_type',
        'product_name',
        'product_code',
        'brand',
        'category',
        'sub_category',
        'product_unit',
        'prodcut_sale_unit',
        'product_purchase_unit',
        'product_weight',
        'product_price',
        'discount',
        'stock',
        'alert_stock',
        'product_image',
        'product_gallery_image',
        'product_details',
        'product_details_invoice',
        'status'
    ];
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
