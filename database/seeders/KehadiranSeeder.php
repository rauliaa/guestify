<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kehadiran;
use App\Models\Tamu;
use Faker\Factory as Faker;

class KehadiranSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $statusList = ['Hadir', 'Tidak Hadir', 'Pending'];

        foreach (Tamu::all() as $tamu) {
            Kehadiran::create([
                'id_tamu' => $tamu->id_tamu,
                'acara' => $faker->sentence(3),
                'waktu_kehadiran' => $faker->dateTimeBetween('-1 month', 'now'),
                'status_kehadiran' => $faker->randomElement($statusList),
            ]);
        }
    }
}
