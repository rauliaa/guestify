<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeder\TamuSeeder;
use Database\Seeder\KehadiranSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TamuSeeder::class,
            KehadiranSeeder::class,
        ]);
    }
}
