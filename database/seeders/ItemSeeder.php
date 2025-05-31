<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item; // Jangan lupa import model

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        Item::create([
            'name' => 'Laptop ABC',
            'description' => 'Laptop gaming dengan spesifikasi tinggi',
            'quantity' => 10,
            'price' => 15000000.00
        ]);

        Item::create([
            'name' => 'Mouse Logitech',
            'description' => 'Mouse wireless ergonomis',
            'quantity' => 50,
            'price' => 350000.00
        ]);

        Item::create([
            'name' => 'Keyboard Mekanikal',
            'description' => 'Keyboard dengan switch biru',
            'quantity' => 25,
            'price' => 750000.00
        ]);

        // Jika ingin menggunakan factory untuk data lebih banyak
        // Item::factory()->count(10)->create();
    }
}
