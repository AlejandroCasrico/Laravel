<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('usuarios')->insert([
            'name'=>'usuario2',
            'password'=>Hash::make('12345'),
            'surnames'=>"name3 name2",
            'idStatus'=>1,
            'login'=>'mi_login',
            'api_token' => 'token2',
             'remember_token' => 'token2',
        ]);

        DB::table('catStatus')->insert([
            'status' => 'Activo',



            ]);
            DB::table('catStatus')->insert([
                'status' => 'Suspendido',

                ]);
            DB::table('catStatus')->insert([
                    'status' => 'Baja',


                    ]);
    }
}
