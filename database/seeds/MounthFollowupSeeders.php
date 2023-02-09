<?php

use App\MonthFollowUp;
use Illuminate\Database\Seeder;

class MounthFollowupSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MonthFollowUp::insert(array(
            [
                "id" => 1,
                "mount" => "6th Month Follow Up",
                "created_at" => "2023-01-28 14:28:18",
                "updated_at" => "2023-01-28 14:28:18"
            ],
            [
                "id" => 2,
                "mount" => "12th Month Follow Up",
                "created_at" => "2023-01-28 14:28:28",
                "updated_at" => "2023-01-28 14:28:28"
            ],
            [
                "id" => 3,
                "mount" => "18 Month Follow Up",
                "created_at" => "2023-01-28 14:28:38",
                "updated_at" => "2023-01-28 14:28:38"
            ],
            [
                "id" => 4,
                "mount" => "24 Month Follow Up",
                "created_at" => "2023-01-28 14:28:48",
                "updated_at" => "2023-01-28 14:28:48"
            ],
            [
                "id" => 5,
                "mount" => "30 Month Follow Up",
                "created_at" => "2023-01-28 14:29:00",
                "updated_at" => "2023-01-28 14:29:00"
            ],
            [
                "id" => 6,
                "mount" => "36 Month Follow Up",
                "created_at" => "2023-01-28 14:29:10",
                "updated_at" => "2023-01-28 14:29:10"
            ]


        ));
    }
}
