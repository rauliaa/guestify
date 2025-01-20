<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TamuSeeder;
use Database\Seeders\KehadiranSeeder;

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
