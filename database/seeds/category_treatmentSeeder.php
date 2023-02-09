<?php

use Illuminate\Database\Seeder;
use App\CategoryTreatment;

class category_treatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategoryTreatment::insert(array(
            [
                'treatmentName' => 'I-TREAT HF (ADHF)',
                'created_at' => date(now())

            ],
            [
                'treatmentName' => 'I-TREAT HF (Chronic)',
                'created_at' => date(now())
            ]
        ));
    }
}
