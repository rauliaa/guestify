<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tamu;
use Faker\Factory as Faker;

class TamuSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Tamu::create([
                'nama_tamu' => $faker->name,
                'email_tamu' => $faker->unique()->safeEmail,
                'nomor_telepon' => $faker->phoneNumber,
                'kode_unik' => $this->generateUniqueCode(), // Menambahkan kode unik
            ]);
        }
    }

    // Fungsi untuk menghasilkan kode unik
    private function generateUniqueCode()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for ($i = 0; $i < 6; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $code;
    }
}
