<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'category_slug',
        'category_image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_author',
        'parent_id',
    ];
    // Define the relationship to itself for hierarchical categories
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    // Define the relationship to products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
