<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     * Esto permite que Filament guarde los datos del formulario.
     */
    protected $fillable = [
        'name',
        'shipping_cost',
        'is_active',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     * Esto asegura que 'is_active' siempre se trate como booleano 
     * y 'shipping_cost' como un número decimal/float.
     */
    protected $casts = [
        'is_active' => 'boolean',
        'shipping_cost' => 'decimal:2',
    ];
}