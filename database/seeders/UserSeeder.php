<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Secretário(a)',
            'email' => 'secretaria@secretaria.com',
            'role' => User::ROLE_ENUM['secretario'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Analista',
            'email' => 'analista@analista.com',
            'role' => User::ROLE_ENUM['analista'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Protocolista',
            'email' => 'protocolista@protocolista.com',
            'role' => User::ROLE_ENUM['analista'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Beneficiario',
            'email' => 'beneficiario@beneficiario.com',
            'role' => User::ROLE_ENUM['analista'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('tipo_analista_user')->insert([
            'user_id' => 2,
            'tipo_analista_id' => 2,
        ]);

        DB::table('tipo_analista_user')->insert([
            'user_id' => 3,
            'tipo_analista_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Empresario',
            'email' => 'empresa@empresa.com',
            'role' => User::ROLE_ENUM['requerente'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Poda',
            'email' => 'analistapoda@analistapoda.com',
            'role' => User::ROLE_ENUM['analista'],
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);

        DB::table('tipo_analista_user')->insert([
            'user_id' => 5,
            'tipo_analista_id' => 3,
        ]);

        DB::table('tipo_analista_user')->insert([
            'user_id' => 4,
            'tipo_analista_id' => 4,
        ]);
    }
}
