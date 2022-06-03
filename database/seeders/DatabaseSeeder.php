<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     $this->call(TourSeeder::class);
     $this->call(GuiaSeeder::class);
     $this->call(ComentariosSeeder::class);
     $this->call(ViajesSeeder::class);
     $this->call(AdministradorSeeder::class);
    }
}
