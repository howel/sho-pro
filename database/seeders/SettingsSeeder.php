<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            [
                'key' => 'site_phone',
                'value' => '+51 969 979 954',
            ],
            [
                'key' => 'site_email',
                'value' => 'ventas@salazar.com',
            ],
            [
                'key' => 'site_address',
                'value' => 'Tarapoto, San Martín, Perú',
            ],
        ];

        foreach ($defaults as $item) {
            Setting::updateOrCreate(
                ['key' => $item['key']],
                ['value' => $item['value']]
            );
        }
        $this->call(SettingsSeeder::class);
    }
}