<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    public $appends  = ['full_product_url'];
    protected $fillable = [
        'category_id', 'product_name', 'product_description', 'product_image', 'product_status'
    ];

    public function getFullProductUrlAttribute()
    {
        return asset('/upload/profile/' . $this->product_image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
