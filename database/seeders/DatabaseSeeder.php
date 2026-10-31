<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Bapak Andi (Pelapor)',
            'email' => 'pelapor@demo.com',
            'password' => Hash::make('password'),
            'role' => 'pelapor',
        ]);

        User::create([
            'name' => 'Ibu Sari (Relawan Pemantau)',
            'email' => 'relawan@demo.com',
            'password' => Hash::make('password'),
            'role' => 'relawan_pemantau',
        ]);

        User::create([
            'name' => 'Budi (Koordinator)',
            'email' => 'koordinator@demo.com',
            'password' => Hash::make('password'),
            'role' => 'koordinator',
        ]);

        $areas = ['Hutan Lindung Merapi', 'Kawasan Perkebunan Sawit Raya', 'Lahan Gambut Timur'];
        foreach ($areas as $area) {
            Area::create(['name' => $area]);
        }
    }
}