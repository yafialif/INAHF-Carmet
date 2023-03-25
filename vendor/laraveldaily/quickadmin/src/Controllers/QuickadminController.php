<?php

namespace Laraveldaily\Quickadmin\Controllers;

use App\Http\Controllers\Controller;
use App\ChronicPatientMonthFollowUp;
use App\Patient;
use DateTime;
use App\User;
use Illuminate\Support\Facades\Auth;



class QuickadminController extends Controller
{
    /**
     * Show QuickAdmin dashboard page
     *
     * @return Response
     */
    public function index()
    {
        $datenow =  date("Y-m-d H:i:s");
        $id_user = Auth::user()->id;
        // $id_user = 6;
        $data_followup = array();
        $role_id = Auth::user()->role_id;
        if ($role_id <= 2) {
            $patient = Patient::select('user_id', 'name', 'dateOfClinicVisit')
                ->where('categorytreatment_id', '=', 2)
                ->get();
        } else {
            $patient = Patient::select('user_id', 'name', 'dateOfClinicVisit')
                ->where('user_id', '=', $id_user)
                ->where('categorytreatment_id', '=', 2)
                ->get();
        }
        if (count($patient) == 0) {
            $swal =  array(
                'swal' => false,
                'message' => 'Pesan',
            );
        } else {

            foreach ($patient as $key) {
                $MonthFollowUp = ChronicPatientMonthFollowUp::join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
                    ->select('chronicpatientmonthfollowup.id', 'chronicpatientmonthfollowup.monthfollowup_id', 'patient.name', 'patient.dateOfClinicVisit', 'chronicpatientmonthfollowup.created_at As MonthFollowUpDate')
                    ->where('patient.user_id', '=', $key->user_id)
                    ->orderBy('chronicpatientmonthfollowup.id', 'desc')->limit(1)
                    ->get();
                // print_r($key);
                if (count($MonthFollowUp) >= 1) {
                    $selisih = abs(strtotime($datenow) - strtotime($MonthFollowUp[0]->MonthFollowUpDate));
                    $jumlahHari = floor($selisih / (60 * 60 * 24));
                    if ($jumlahHari >= 130) {
                        array_push($data_followup, $key->name);
                        array_push($data_followup, $MonthFollowUp[0]->monthfollowup_id);
                    }
                } else {
                    $selisih = abs(strtotime($datenow) - strtotime($patient[0]->dateOfClinicVisit));
                    $jumlahHari = floor($selisih / (60 * 60 * 24));
                    if ($jumlahHari >= 130) {
                        array_push($data_followup, $key->name);
                    }
                }
            }
        }

        if (count($data_followup) >= 1) {
            $swal = array(
                'swal' => true,
                'message' => 'Pasien atas nama ' . implode(", ", $data_followup) . ' sudah waktunya pemeriksaan berikutnya',
            );
        } else {
            $swal = array(
                'swal' => false,
                'message' => '',
            );
        }
        // print_r($swal);
        $data = json_decode(json_encode($swal), false);
        // return response()->json($data);
        return view('admin.dashboard', compact('data'));
    }
}
