<?php

namespace Database\Seeders;

use App\Models\Administrador as ModelsAdministrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =new ModelsAdministrador();
        $admin->nombre= 'admin';
        $admin->email='admin@admin.com' ;
        $admin->user_id= 1;
    }
}
