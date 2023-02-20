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
                "id" => 1,
                "title" => "Administrator",
            ],
            [
                "id" => 2,
                "title" => "Admin",
            ],
            [
                "id" => 3,
                "title" => "Dokter ADHF",
            ],
            [
                "id" => 4,
                "title" => "Dokter Chronic",
            ],
            [
                "id" => 5,
                "title" => "Dokter ADHF & Chronic",
            ]


        ));
    }
}
