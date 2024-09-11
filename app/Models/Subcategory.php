<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_name',
        'subcategory_slug',
        'subcategory_code',
        'meta_title',
        'meta_description',
        'meta_keyword'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
