<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'degree' => 'Master',
            'name' => 'Oldahir',
            'lastname' => 'Gomez',
            'familyname' => 'Gomez',
            'institution' => 'Benemerita Universidad Autonoma de Puebla',
            'acronym' => 'BUAP',
            'dependence' => 'Computacion',
            'city' => 'Puebla',
            'state' => 'Puebla',
            'country' => 'Mexico',
            'phone' => '2227485891',
            'email' => 'mi@correo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $user2 = User::create([
            'degree' => 'Doctor',
            'name' => 'Alejandra',
            'lastname' => 'Robles',
            'familyname' => 'Ruiz',
            'institution' => 'Benemerita Universidad Autonoma de Puebla',
            'acronym' => 'BUAP',
            'dependence' => 'Mercadotecnia',
            'city' => 'Puebla',
            'state' => 'Puebla',
            'country' => 'Mexico',
            'phone' => '2227484415',
            'email' => 'mi2@correo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $user3 = User::create([
            'degree' => 'Lic',
            'name' => 'Sarah',
            'lastname' => 'Bautista',
            'familyname' => 'Leon',
            'institution' => 'Benemerita Universidad Autonoma de Puebla',
            'acronym' => 'BUAP',
            'dependence' => 'Derecho',
            'city' => 'Puebla',
            'state' => 'Puebla',
            'country' => 'Mexico',
            'phone' => '2227484518',
            'email' => 'mi3@correo.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('123456789'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
