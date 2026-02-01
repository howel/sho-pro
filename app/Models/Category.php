<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // El "fillable" permite que Laravel guarde estos campos de forma masiva
    protected $fillable = ['name', 'slug', 'parent_id', 'is_visible'];

    // Relación: Una categoría puede tener una categoría padre
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Relación: Una categoría puede tener muchas subcategorías
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Relación: Una categoría tiene muchos productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
