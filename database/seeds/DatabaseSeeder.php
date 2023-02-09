<?php

use Illuminate\Database\Seeder;
// use usersSeeder;
// use rolesSeeder;
// use menu_roleSeeder;
// use category_treatmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(
            [
                rolesSeeder::class,
                usersSeeder::class,
                MenuSeeder::class,
                menu_roleSeeder::class,
                MounthFollowupSeeders::class,
                category_treatmentSeeder::class,
            ]
        );
    }
}
