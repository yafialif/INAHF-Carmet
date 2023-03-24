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
        $patient = Patient::select('user_id', 'name', 'dateOfAdmission')
            ->where('user_id', '=', $id_user)
            ->where('categorytreatment_id', '=', 2)
            ->get();

        if (count($patient) == 0) {
            $swal =  array(
                'swal' => false,
                'message' => 'Pesan',
            );
        } else {
            foreach ($patient as $key) {
                $MonthFollowUp = ChronicPatientMonthFollowUp::join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
                    ->select('chronicpatientmonthfollowup.id', 'chronicpatientmonthfollowup.monthfollowup_id', 'patient.name', 'patient.dateOfAdmission', 'chronicpatientmonthfollowup.created_at As MonthFollowUpDate')
                    ->where('patient.user_id', '=', $key->user_id)
                    ->orderBy('chronicpatientmonthfollowup.id', 'desc')
                    ->get();
                if ($MonthFollowUp[0]) {
                    // $result = strtotime($MonthFollowUp[0]->MonthFollowUpDate);
                    $date1 = new DateTime($MonthFollowUp[0]->created_at);
                    $date2 = new DateTime($datenow);
                    $selisih = abs(strtotime($datenow) - strtotime($MonthFollowUp[0]->created_at));
                    $jumlahHari = floor($selisih / (60 * 60 * 24));
                    // $interval = $date1->diff($date2);
                    // $jumlahBulan = ($interval->y * 12) + $interval->m;
                    if ($jumlahHari >= 130) {
                        array_push($data_followup, $key->name);
                    }
                } else {

                    $date1 = new DateTime($patient[0]->dateOfClinicVisit);
                    $date2 = new DateTime($datenow);
                    // $interval = $date1->diff($date2);
                    // $jumlahBulan = ($interval->y * 12) + $interval->m;
                    $selisih = abs(strtotime($datenow) - strtotime($patient[0]->dateOfClinicVisit));
                    $jumlahHari = floor($selisih / (60 * 60 * 24));
                    // $selisih = $date2->diff($date1);
                    // $jumlahHari = intval($selisih->format("%m"));
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
        $data = json_decode(json_encode($swal), false);
        // return response()->json($swal);
        return view('admin.dashboard', compact('data'));
    }
}
