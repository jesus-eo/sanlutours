<?php

namespace Database\Seeders;

use App\Models\Administrador as ModelsAdministrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Administrador')->insert([
            'nombre'=> 'admin',
            'email'=>'admin@admin.com',
            'user_id'=>1,
        ]);
    }
}
