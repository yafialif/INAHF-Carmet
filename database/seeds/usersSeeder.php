<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert(array(
            [
                'name' => 'Administrator',
                'role_id' => 1,
                'email' => 'admin@inahfcarmet.org',
                'password' => Hash::make('Semangat123@'),
                'created_at' => date(now())
            ],
            [
                'name' => 'Admin',
                'role_id' => 2,
                'email' => 'user@inahfcarmet.org',
                'password' => Hash::make('Semangat123@'),
                'created_at' => date(now())
            ],
            [
                'name' => 'Dokter',
                'role_id' => 3,
                'email' => 'dokter@inahfcarmet.org',
                'password' => Hash::make('Semangat123@'),
                'created_at' => date(now())
            ]
        ));
    }
}
