<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'ciudad_id' => 1,
            'identificador' => '1234567890',
            'password' => Hash::make('secreto'),
            'nombre' => 'Admin',
            'celular' => '0987654321',
            'cedula' => '1177228833',
            'email' => 'admin@mailer.com',
            'rol' => 'Administrador',   
        ]);
    }
}
