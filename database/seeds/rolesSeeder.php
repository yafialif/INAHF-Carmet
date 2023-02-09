<?php

use Illuminate\Database\Seeder;
use App\Role;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::insert(array(
            [
                'title' => 'Administrator',
                'created_at' => date(now())

            ],
            [
                'title' => 'Admin',
                'created_at' => date(now())

            ],
            [
                'title' => 'Dokter',
                'created_at' => date(now())

            ],


        ));
    }
}
