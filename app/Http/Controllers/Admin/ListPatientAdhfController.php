<?php

namespace App\Http\Controllers\Admin;

use App\AdhfBloodGasAnalysis;
use App\AdhfBloodLaboratoryTest;
use App\AdhfEchocardiography;
use App\AdhfEtiology;
use App\AdhfHospitalization;
use App\AdhfMedication;
use App\AdhfOutcomes;
use App\AdhfRiskFactors;
use App\AdhfRoThorax;
use App\ClinicalProfile;
use App\Http\Controllers\Controller;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use App\MenuRole;
use App\MonthFollowUp;
use App\RumahSakit;
use Laraveldaily\Quickadmin\Models\Menu;
use Illuminate\Http\Request;
use convertObjectClass;
use Illuminate\Support\Facades\DB;


class ListPatientAdhfController extends Controller
{

	/**
	 * Index page
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$user_id = Auth::user()->id;
		$role_id = Auth::user()->role_id;
		$menu = MonthFollowUp::get();
		if ($role_id != 3) {
			$patient = Patient::with("user")
				->where('categorytreatment_id', 1)
				->get();
		} else {
			$patient = Patient::with("user")
				->where('user_id', $user_id)
				->where('categorytreatment_id', 1)
				->get();
		}

		return view('admin.listpatientadhf.index', compact('patient'));
	}
	public function create()
	{
		// return 1;
		$user_id = Auth::user()->id;
		$rumahsakit = RumahSakit::pluck('name_of_rs', 'id');
		return view('admin.listpatientadhf.create', compact('rumahsakit'));
	}
	public function store(Request $request)
	{

		$user_id = Auth::user()->id;
		$categorytreatment_id = 1;
		// Patient
		$patient = new Patient();
		$patient->user_id = $user_id;
		$patient->categorytreatment_id = $categorytreatment_id;
		$patient->nik = $request->nik;
		$patient->name = $request->name;
		$patient->dateOfBirth = $request->dateOfBirth;
		$patient->age = $request->age;
		$patient->gender = $request->gender;
		$patient->phone = $request->phone;
		$patient->dateOfAdmission = $request->dateOfAdmission;
		$patient->insurance = $request->insurance;
		$patient->education = $request->education;
		if ($request->dateOfDischarge) {
			$patient->dateOfDischarge = $request->dateOfDischarge;
		} else {
			$patient->dateOfDischarge = "0000-00-00";
		}
		$patient->save();


		// Clinical Profile
		$clinicalProfile = new ClinicalProfile();
		$clinicalProfile->user_id = $patient->id;
		$clinicalProfile->categorytreatment_id = $categorytreatment_id;
		$clinicalProfile->height = $request->height;
		$clinicalProfile->weight = $request->weight;
		$clinicalProfile->bmi = $request->bmi;
		$clinicalProfile->sbp = $request->sbp;
		$clinicalProfile->dbp = $request->dbp;
		$clinicalProfile->hr = $request->hr;
		$clinicalProfile->dyspnoea_at_rest = $request->dyspnoea_at_rest;
		$clinicalProfile->orthopnea = $request->orthopnea;
		$clinicalProfile->pnd = $request->pnd;
		$clinicalProfile->peripheral_oedema = $request->peripheral_oedema;
		$clinicalProfile->pulmonary_rales = $request->pulmonary_rales;
		$clinicalProfile->jvp = $request->jvp;
		$clinicalProfile->type_of_acute_HF = $request->type_of_acute_HF;
		$clinicalProfile->nyha_class = $request->nyha_class;
		$clinicalProfile->cardiogenic_shock = $request->cardiogenic_shock;
		$clinicalProfile->respiratory_failure = $request->respiratory_failure;
		$clinicalProfile->save();
		// Risk Factor
		$riskFactor = new AdhfRiskFactors();
		$riskFactor->patient_id = $patient->id;
		$riskFactor->categorytreatment_id = $categorytreatment_id;
		$riskFactor->hypertension = $request->hypertension;
		$riskFactor->diabetes_or_prediabetes = $request->diabetes_or_prediabetes;
		$riskFactor->dislipidemia = $request->dislipidemia;
		$riskFactor->alcohol = $request->alcohol;
		$riskFactor->smoker = $request->smoker;
		$riskFactor->ckd = $request->ckd;
		$riskFactor->valvular_heart_disease = $request->valvular_heart_disease;
		$riskFactor->atrial_fibrillation = $request->atrial_fibrillation;
		$riskFactor->history_of_hf = $request->history_of_hf;
		$riskFactor->history_of_pci_or_cabg = $request->history_of_pci_or_cabg;
		$riskFactor->historyof_heart_valve_surgery = $request->historyof_heart_valve_surgery;
		$riskFactor->omi_or_cad = $request->omi_or_cad;
		$riskFactor->save();
		// Etiology
		$Etiology = new AdhfEtiology();
		$Etiology->patient_id = $patient->id;
		$Etiology->categorytreatment_id =  $categorytreatment_id;
		$Etiology->acs = $request->acs;
		$Etiology->hypertension_emergency =  $request->hypertension_emergency;
		$Etiology->arrhytmia =  $request->arrhytmia;
		$Etiology->acute_nechanical_cause =  $request->acute_nechanical_cause;
		$Etiology->pulmonary_embolism =  $request->pulmonary_embolism;
		$Etiology->infections =  $request->infections;
		$Etiology->tamponade = $request->tamponade;
		$Etiology->save();
		// Ro Thorax
		$RoThorax = new AdhfRoThorax();
		$RoThorax->patient_id = $patient->id;
		$RoThorax->categorytreatment_id = $categorytreatment_id;
		$RoThorax->ro_thorax = $request->ro_thorax;
		$RoThorax->save();
		// Echocardiography
		$Echocardiography = new AdhfEchocardiography();
		$Echocardiography->patient_id = $patient->id;
		$Echocardiography->categorytreatment_id = $categorytreatment_id;
		$Echocardiography->ef = $request->ef;
		$Echocardiography->tapse = $request->tapse;
		$Echocardiography->edv = $request->edv;
		$Echocardiography->esv = $request->esv;
		$Echocardiography->edd = $request->edd;
		$Echocardiography->esd = $request->esd;
		$Echocardiography->sign_mr = $request->sign_mr;
		$Echocardiography->diastolic_function = $request->diastolic_function;
		$Echocardiography->save();
		// Blood Laboratory Test
		$BloodLaboratoryTest = new AdhfBloodLaboratoryTest();
		$BloodLaboratoryTest->patient_id = $patient->id;
		$BloodLaboratoryTest->categorytreatment_id = $categorytreatment_id;
		$BloodLaboratoryTest->hemoglobin = $request->hemoglobin;
		$BloodLaboratoryTest->hematocrite = $request->hematocrite;
		$BloodLaboratoryTest->erythrocyte = $request->erythrocyte;
		$BloodLaboratoryTest->random_blood_glucose = $request->random_blood_glucose;
		$BloodLaboratoryTest->fasting_blood_glucose = $request->fasting_blood_glucose;
		$BloodLaboratoryTest->twoHoursPostPrandialBloodGlucose = $request->twoHoursPostPrandialBloodGlucose;
		$BloodLaboratoryTest->natrium = $request->natrium;
		$BloodLaboratoryTest->kalium = $request->kalium;
		$BloodLaboratoryTest->ureum = $request->ureum;
		$BloodLaboratoryTest->bun = $request->bun;
		$BloodLaboratoryTest->serum_creatinine = $request->serum_creatinine;
		$BloodLaboratoryTest->gfr = $request->gfr;
		$BloodLaboratoryTest->uric_acid = $request->uric_acid;
		$BloodLaboratoryTest->NT_ProBNP_at_admission = $request->NT_ProBNP_at_admission;
		$BloodLaboratoryTest->NT_ProBNP_at_discharge = $request->NT_ProBNP_at_discharge;
		$BloodLaboratoryTest->save();
		// Blood Gas Analysis
		$BloodGasAnalysis = new AdhfBloodGasAnalysis();
		$BloodGasAnalysis->patient_id = $patient->id;
		$BloodGasAnalysis->categorytreatment_id = $categorytreatment_id;
		$BloodGasAnalysis->pH = $request->pH;
		$BloodGasAnalysis->pco2 = $request->pco2;
		$BloodGasAnalysis->hco3 = $request->hco3;
		$BloodGasAnalysis->po2 = $request->po2;
		$BloodGasAnalysis->lactate = $request->lactate;
		$BloodGasAnalysis->be = $request->be;
		$BloodGasAnalysis->save();
		// Medication
		$medication = new AdhfMedication();
		$medication->patient_id = $patient->id;
		$medication->categorytreatment_id = $categorytreatment_id;
		$medication->DopaminDose = $request->DopaminDose;
		$medication->DopaminDuration = $request->DopaminDuration;
		$medication->DobutaminDose = $request->DobutaminDose;
		$medication->DobutaminDuration = $request->DobutaminDuration;
		$medication->NorepinephrineDose = $request->NorepinephrineDose;
		$medication->NorepinephrineDuration = $request->NorepinephrineDuration;
		$medication->EpinephrinDose = $request->EpinephrinDose;
		$medication->EpinephrinDuration = $request->EpinephrinDuration;
		$medication->acei = $request->acei;
		$medication->aceiDoseatAdmission = $request->aceiDoseatAdmission;
		$medication->aceiDoseatPredischarge = $request->aceiDoseatPredischarge;
		$medication->arb = $request->arb;
		$medication->arbDoseatAdmission = $request->arbDoseatAdmission;
		$medication->arbDoseatPredischarge = $request->arbDoseatPredischarge;
		$medication->arniDoseatAdmission = $request->arniDoseatAdmission;
		$medication->arniDoseatPredischarge = $request->arniDoseatPredischarge;
		$medication->mraDoseatAdmission = $request->mraDoseatAdmission;
		$medication->mraDoseatPredischarge = $request->mraDoseatPredischarge;
		$medication->BetaBlocker = $request->BetaBlocker;
		$medication->BetaBlockerDoseatAdmission = $request->BetaBlockerDoseatAdmission;
		$medication->BetaBlockerDoseatPredischarge = $request->BetaBlockerDoseatPredischarge;
		$medication->LoopDiureticDoseatAdmission = $request->LoopDiureticDoseatAdmission;
		$medication->LoopDiureticDoseatPredischarge = $request->LoopDiureticDoseatPredischarge;
		$medication->sglt2i = $request->sglt2i;
		$medication->sglt2iDoseatAdmission = $request->sglt2iDoseatAdmission;
		$medication->sglt2iDoseatPredischarge = $request->sglt2iDoseatPredischarge;
		$medication->ivabradineDoseatAdmission = $request->ivabradineDoseatAdmission;
		$medication->ivabradineDoseatPredischarge = $request->ivabradineDoseatPredischarge;
		$medication->TolvaptanTotalDose = $request->TolvaptanTotalDose;
		$medication->insulin = $request->insulin;
		$medication->insulinDose = $request->insulinDose;
		$medication->otherOAD = $request->otherOAD;
		$medication->save();
		// Hospitalization
		$hospitalization = new AdhfHospitalization();
		$hospitalization->patient_id = $patient->id;
		$hospitalization->categorytreatment_id = $categorytreatment_id;
		$hospitalization->rs_id = $request->rs_id;
		$hospitalization->iccu = $request->iccu;
		$hospitalization->ward = $request->ward;
		$hospitalization->totalLoS = $request->totalLoS;
		$hospitalization->hospitalizationCost = $request->hospitalizationCost;
		$hospitalization->save();
		// Outcomes
		$Outcomes = new AdhfOutcomes();
		$Outcomes->patient_id = $patient->id;
		$Outcomes->categorytreatment_id = $categorytreatment_id;
		$Outcomes->inhospitalDeath = $request->inhospitalDeath;
		$Outcomes->vulnerablePhaseDeath = $request->vulnerablePhaseDeath;
		$Outcomes->vulnerablePhaseRehospitalization = $request->vulnerablePhaseRehospitalization;
		$Outcomes->dateofDeath = $request->dateofDeath;
		$Outcomes->additional_notes = $request->additional_notes;
		$Outcomes->save();

		$data = [
			'patient' => $patient,
			'clinicalProfile' => $clinicalProfile,
			'riskFactor' => $riskFactor,
			'Etiology' => $Etiology,
			'RoThorax' => $RoThorax,
			'Echocardiography' => $Echocardiography,
			'BloodLaboratoryTest' => $BloodLaboratoryTest,
			'BloodGasAnalysis' => $BloodGasAnalysis,
			'medication' => $medication,
			'hospitalization' => $hospitalization,
			'Outcomes' => $Outcomes

		];
		// return view('admin.listpatientadhf.index', compact('patient'));
		return route('admin.listpatientadhf.index ');


		// return response()->json($data);
		// return 1;
	}

	public function show($id)
	{
		$patient = DB::table('patient')
			->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
			->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
			->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
			->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
			->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
			->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
			->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
			->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id')
			->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
			->join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];

		// return response()->json($data);
		return view('admin.listpatientadhf.show', compact('data'));
	}
	public function edit($id)
	{
		$patient = DB::table('patient')
			->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
			->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
			->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
			->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
			->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
			->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
			->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
			->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id')
			->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
			->join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];
		$rumahsakit = RumahSakit::pluck('name_of_rs', 'id');

		return view('admin.listpatientadhf.edit', compact('data', 'rumahsakit'));
	}
}
