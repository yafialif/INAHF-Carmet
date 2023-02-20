<?php

use Illuminate\Database\Seeder;
use Laraveldaily\Quickadmin\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Menu::insert(array(
            [
                "id" => 1,
                "position" => 0,
                "menu_type" => 0,
                "icon" => null,
                "name" => "User",
                "title" => "User",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 2,
                "position" => null,
                "menu_type" => 0,
                "icon" => null,
                "name" => "Role",
                "title" => "Role",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 4,
                "position" => 10,
                "menu_type" => 1,
                "icon" => "fa-database",
                "name" => "Patient",
                "title" => "Patient",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 5,
                "position" => 2,
                "menu_type" => 2,
                "icon" => "fa-database",
                "name" => "ITreatHF(ADHF)",
                "title" => "I-Treat HF (ADHF)",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 6,
                "position" => 3,
                "menu_type" => 2,
                "icon" => "fa-database",
                "name" => "ITreatHF(Chronic)",
                "title" => "I-Treat HF (Chronic)",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 7,
                "position" => 6,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ListPatientAdhf",
                "title" => "List Patient Adhf",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 8,
                "position" => 4,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ListPatientCronic",
                "title" => "List Patient Cronic",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 9,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ClinicalProfile",
                "title" => "Clinical Profile",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 10,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfRiskFactors",
                "title" => "Adhf Risk Factors",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 11,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfEtiology",
                "title" => "Adhf Etiology",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 12,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfRoThorax",
                "title" => "Adhf Ro Thorax",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 13,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfEchocardiography",
                "title" => "Adhf Echocardiography",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 14,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfBloodLaboratoryTest",
                "title" => "Adhf Blood Laboratory Test",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 15,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfBloodGasAnalysis",
                "title" => "Adhf Blood Gas Analysis",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 16,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfMedication",
                "title" => "Adhf Medication",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 17,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfHospitalization",
                "title" => "Adhf Hospitalization",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 18,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "AdhfOutcomes",
                "title" => "Adhf Outcomes",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 19,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ChronicClinicalProfile",
                "title" => "Chronic Clinical Profile",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 20,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "CronicRiskFactors",
                "title" => "Cronic Risk Factors",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 21,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ChronicRoThorax",
                "title" => "Chronic Ro Thorax",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 22,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ChronicEchocardiography",
                "title" => "Chronic Echocardiography",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 23,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ChronicBloodLaboratoryTest",
                "title" => "Chronic Blood Laboratory Test",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 24,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ChronicMedication",
                "title" => "Chronic Medication",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 25,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ChronicOutcomes",
                "title" => "Chronic Outcomes",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 26,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "MonthFollowUp",
                "title" => "MonthFollow Up",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 27,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "CategoryTreatment",
                "title" => "Category Treatment",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 28,
                "position" => 9,
                "menu_type" => 1,
                "icon" => "fa-database",
                "name" => "RumahSakit",
                "title" => "Rumah Sakit",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 29,
                "position" => 7,
                "menu_type" => 1,
                "icon" => "fa-database",
                "name" => "ManageDokter",
                "title" => "Manage Dokter",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 30,
                "position" => 0,
                "menu_type" => 3,
                "icon" => null,
                "name" => "ExportAdhf",
                "title" => "Export Data Patient Adhf",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 32,
                "position" => 0,
                "menu_type" => 1,
                "icon" => null,
                "name" => "ChronicPatientMonthFollowUp",
                "title" => "Patient Month Followup",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 33,
                "position" => 1,
                "menu_type" => 3,
                "icon" => "fa-database",
                "name" => "Dashboard",
                "title" => "Dashboard",
                "parent_id" => null,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 34,
                "position" => 0,
                "menu_type" => 3,
                "icon" => null,
                "name" => "Chartadhf",
                "title" => "Chart Adhf",
                "parent_id" => 5,
                "created_at" => null,
                "updated_at" => null
            ],
            [
                "id" => 35,
                "position" => 0,
                "menu_type" => 3,
                "icon" => null,
                "name" => "Chartchronic",
                "title" => "Chart Chronic",
                "parent_id" => 6,
                "created_at" => null,
                "updated_at" => null
            ]



        ));
    }
}
