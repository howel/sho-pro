<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'price', 
        'sale_price', 
        'stock', 
        'image',     // Imagen principal
        'images',    // Galería de fotos (JSON)
        'is_active', 
        'is_featured',
        'category_id'
    ];

    // Fundamental para manejar múltiples imágenes
    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}