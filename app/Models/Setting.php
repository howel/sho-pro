<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // Solo estas tres columnas
    protected $fillable = ['key', 'value_text', 'value_file'];

    // IMPORTANTE: Asegúrate de que NO haya una línea que diga:
    // protected $casts = ['value_file' => 'array']; <--- SI ESTÁ, BÓRRALA
    
    /**
     * Helper para obtener valores en el Frontend.
     */
    public static function getVal($key, $default = null)
    {
        $setting = self::where('key', $key)->first();

        if (!$setting) return $default;

        // Si la clave tiene la palabra 'logo', devolvemos la ruta de la imagen.
        if (str_contains($key, 'logo')) {
            return $setting->value_file ?? $default;
        }

        return $setting->value_text ?? $default;
    }
}