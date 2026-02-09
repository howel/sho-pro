<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VentaRepuesto extends Model
{
    protected $fillable = [
        'cliente',
        'repuesto_id',
        'cantidad',
        'precio',
        'fecha_venta',
        'estado',
    ];

    public function repuesto()
    {
        return $this->belongsTo(Product::class, 'repuesto_id');
    }
}