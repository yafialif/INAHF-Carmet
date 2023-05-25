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
use App\Http\Requests\CreateAdhf;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use App\MenuRole;
use App\MonthFollowUp;
use App\RumahSakit;
use Laraveldaily\Quickadmin\Models\Menu;
use Illuminate\Http\Request;
use convertObjectClass;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
		if ($role_id <= 2) {
			$patients = Patient::with("user")
				// ->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				->where('patient.categorytreatment_id', 1)
				->get();
		} else {
			$patients = Patient::with("user")
				// ->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				->where('patient.user_id', $user_id)
				->where('patient.categorytreatment_id', 1)
				->get();
		}
		$patient = array();
		foreach ($patients as $key => $value) {

			$percentage = DB::table('patient')
				->join('adhfbloodlaboratorytest', 'patient.id', '=', 'adhfbloodlaboratorytest.patient_id')
				->join('adhfechocardiography', 'patient.id', '=', 'adhfechocardiography.patient_id')
				->join('adhfbloodgasanalysis', 'patient.id', '=', 'adhfbloodgasanalysis.patient_id')
				->join('adhfetiology', 'patient.id', '=', 'adhfetiology.patient_id')
				->join('adhfmedication', 'patient.id', '=', 'adhfmedication.patient_id')
				->join('adhfoutcomes', 'patient.id', '=', 'adhfoutcomes.patient_id')
				// ->join('adhfriskfactors', 'patient.id', '=', 'adhfriskfactors.patient_id')
				// dihapus  ->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id')
				->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
				->join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
				->where('patient.id', $value->id)
				->where('patient.categorytreatment_id', 1)
				->get();
			$data = $percentage[0];
			foreach ($data as $object) {
				$array_data[] = $object;
				if (!empty($object)) {
					$arrays[] = $object;
				} else {
					$arraysnull[] = $object;
				}
			}
			$persentasi = round(count($arrays) / (count($array_data) - 2) * 100);
			array_push($patient, (object) array(
				'id' => $value->id,
				'user_id' => $value->user_id,
				'categorytreatment' => $value->treatment->treatmentName,
				'nik' => $value->nik,
				'name' => $value->name,
				'dateOfBirth' => $value->dateOfBirth,
				'age' => $value->age,
				'gender' => $value->gender,
				'phone' => $value->phone,
				'dateOfAdmission' => $value->dateOfAdmission,
				'insurance' => $value->insurance,
				'education' => $value->education,
				'dateOfDischarge' => $value->dateOfDischarge,
				'created_at' => $value->created_at,
				'updated_at' => $value->updated_at,
				'user' => $value->user,
				'percent' => $persentasi,
				// 'additional_notes' => $value->additional_notes,

			));
		}
		// return response()->json(count($patient));

		return view('admin.listpatientadhf.index', compact('patient'));
	}

	public function create()
	{
		// return 1;
		$role_id = Auth::user()->role_id;
		$menu = MonthFollowUp::get();
		$user_id = Auth::user()->id;

		if (
			$role_id <= 2
		) {
			$rumahsakit = RumahSakit::pluck('name_of_rs', 'id');
		} else {
			$rumahsakit = RumahSakit::where('user_id', $user_id)->pluck('name_of_rs', 'id');
		}
		return view('admin.listpatientadhf.create', compact('rumahsakit'));
	}
	// public function store(CreateAdhf $request)
	public function store(CreateAdhf $request)
	{
		$user_id = Auth::user()->id;
		$categorytreatment_id = 1;
		$jumlah_input_terisi = 0;
		$total_data = 0;
		// Patient
		// $result = json_encode($request);
		// $data = json_decode($result, true);
		$data = $request->all();
		foreach ($data as $key => $value) {
			// Memeriksa apakah input tidak kosong
			if (!empty($value)) {
				$jumlah_input_terisi++;
			}
			$total_data++;
			// echo $key;
		}
		$persentase_terisi = round(($jumlah_input_terisi / $total_data) * 100);

		return response()->json($persentase_terisi);

		// $patient = new Patient();
		// $patient->user_id = $user_id;
		// $patient->categorytreatment_id = $categorytreatment_id;
		// $patient->rs_id = $request->rs_id;
		// $patient->nik = $request->nik;
		// $patient->name = $request->name;
		// if ($request->dateOfBirth) {
		// 	$patient->dateOfBirth = $request->dateOfBirth;
		// }
		// $patient->age = $request->age;
		// $patient->gender = $request->gender;
		// $patient->phone = $request->phone;
		// if ($request->dateOfAdmission) {
		// 	$patient->dateOfAdmission = $request->dateOfAdmission;
		// }
		// $patient->insurance = $request->insurance;
		// $patient->education = $request->education;
		// if ($request->dateOfDischarge) {
		// 	$patient->dateOfDischarge = $request->dateOfDischarge;
		// }

		// $patient->save();

		// Clinical Profile
		// $clinicalProfile = new ClinicalProfile();
		// $clinicalProfile->user_id = $patient->id;
		// $clinicalProfile->categorytreatment_id = $categorytreatment_id;
		// $clinicalProfile->height = $request->height;
		// $clinicalProfile->weight = $request->weight;
		// $clinicalProfile->bmi = $request->bmi;
		// $clinicalProfile->sbp = $request->sbp;
		// $clinicalProfile->dbp = $request->dbp;
		// $clinicalProfile->hr = $request->hr;
		// $clinicalProfile->dyspnoea_at_rest = $request->dyspnoea_at_rest;
		// $clinicalProfile->orthopnea = $request->orthopnea;
		// $clinicalProfile->pnd = $request->pnd;
		// $clinicalProfile->peripheral_oedema = $request->peripheral_oedema;
		// $clinicalProfile->pulmonary_rales = $request->pulmonary_rales;
		// $clinicalProfile->jvp = $request->jvp;
		// $clinicalProfile->type_of_acute_HF = $request->type_of_acute_HF;
		// $clinicalProfile->nyha_class = $request->nyha_class;
		// $clinicalProfile->cardiogenic_shock = $request->cardiogenic_shock;
		// $clinicalProfile->respiratory_failure = $request->respiratory_failure;
		// $clinicalProfile->save();

		// Risk Factor
		// $riskFactor = new AdhfRiskFactors();
		// $riskFactor->patient_id = $patient->id;
		// $riskFactor->categorytreatment_id = $categorytreatment_id;
		// $riskFactor->hypertension = $request->hypertension;
		// $riskFactor->diabetes_or_prediabetes = $request->diabetes_or_prediabetes;
		// $riskFactor->dislipidemia = $request->dislipidemia;
		// $riskFactor->alcohol = $request->alcohol;
		// $riskFactor->smoker = $request->smoker;
		// $riskFactor->ckd = $request->ckd;
		// $riskFactor->valvular_heart_disease = $request->valvular_heart_disease;
		// $riskFactor->atrial_fibrillation = $request->atrial_fibrillation;
		// $riskFactor->history_of_hf = $request->history_of_hf;
		// $riskFactor->history_of_pci_or_cabg = $request->history_of_pci_or_cabg;
		// $riskFactor->historyof_heart_valve_surgery = $request->historyof_heart_valve_surgery;
		// $riskFactor->omi_or_cad = $request->omi_or_cad;
		// $riskFactor->save();

		// Etiology
		// $Etiology = new AdhfEtiology();
		// $Etiology->patient_id = $patient->id;
		// $Etiology->categorytreatment_id =  $categorytreatment_id;
		// $Etiology->precipitating_factors = $request->precipitating_factors;
		// $Etiology->save();

		// Echocardiography
		// $Echocardiography = new AdhfEchocardiography();
		// $Echocardiography->patient_id = $patient->id;
		// $Echocardiography->categorytreatment_id = $categorytreatment_id;
		// $Echocardiography->ef = $request->ef;
		// $Echocardiography->tapse = $request->tapse;
		// $Echocardiography->edv = $request->edv;
		// $Echocardiography->esv = $request->esv;
		// $Echocardiography->sign_mr = $request->sign_mr;
		// $Echocardiography->lv = $request->lv;
		// $Echocardiography->ee = $request->ee;
		// $Echocardiography->save();

		// Blood Laboratory Test
		// $BloodLaboratoryTest = new AdhfBloodLaboratoryTest();
		// $BloodLaboratoryTest->patient_id = $patient->id;
		// $BloodLaboratoryTest->categorytreatment_id = $categorytreatment_id;
		// $BloodLaboratoryTest->hemoglobin = $request->hemoglobin;
		// $BloodLaboratoryTest->hematocrite = $request->hematocrite;
		// $BloodLaboratoryTest->random_blood_glucose = $request->random_blood_glucose;
		// $BloodLaboratoryTest->natrium = $request->natrium;
		// $BloodLaboratoryTest->kalium = $request->kalium;
		// $BloodLaboratoryTest->ureum = $request->ureum;
		// $BloodLaboratoryTest->bun = $request->bun;
		// $BloodLaboratoryTest->serum_creatinine = $request->serum_creatinine;
		// $BloodLaboratoryTest->serum_iron = $request->serum_iron;
		// $BloodLaboratoryTest->hba1c = $request->hba1c;
		// $BloodLaboratoryTest->gfr = $request->gfr;
		// $BloodLaboratoryTest->NT_ProBNP = $request->NT_ProBNP;
		// $BloodLaboratoryTest->save();

		// Blood Gas Analysis
		// $BloodGasAnalysis = new AdhfBloodGasAnalysis();
		// $BloodGasAnalysis->patient_id = $patient->id;
		// $BloodGasAnalysis->categorytreatment_id = $categorytreatment_id;
		// $BloodGasAnalysis->pH = $request->pH;
		// $BloodGasAnalysis->pco2 = $request->pco2;
		// $BloodGasAnalysis->hco3 = $request->hco3;
		// $BloodGasAnalysis->po2 = $request->po2;
		// $BloodGasAnalysis->lactate = $request->lactate;
		// $BloodGasAnalysis->be = $request->be;
		// $BloodGasAnalysis->save();

		// Medication
		// $medication = new AdhfMedication();
		// $medication->patient_id = $patient->id;
		// $medication->categorytreatment_id = $categorytreatment_id;
		// $medication->acei = $request->acei;
		// $medication->aceiDoseatPredischarge = $request->aceiDoseatPredischarge;
		// $medication->arb = $request->arb;
		// $medication->arbDoseatPredischarge = $request->arbDoseatPredischarge;
		// $medication->arniDoseatPredischarge = $request->arniDoseatPredischarge;
		// $medication->mraDoseatPredischarge = $request->mraDoseatPredischarge;
		// $medication->BetaBlocker = $request->BetaBlocker;
		// $medication->BetaBlockerDoseatPredischarge = $request->BetaBlockerDoseatPredischarge;
		// $medication->LoopDiureticDoseatPredischarge = $request->LoopDiureticDoseatPredischarge;
		// $medication->sglt2i = $request->sglt2i;
		// $medication->ivabradineDoseatPredischarge = $request->ivabradineDoseatPredischarge;
		// $medication->Tolvaptan = $request->Tolvaptan;
		// $medication->insulinDose = $request->insulinDose;
		// $medication->inotropic = $request->inotropic;
		// $medication->vasoconstrictor = $request->vasoconstrictor;
		// $medication->statin = $request->statin;
		// $medication->save();

		// Hospitalization
		// $hospitalization = new AdhfHospitalization();
		// $hospitalization->patient_id = $patient->id;
		// $hospitalization->categorytreatment_id = $categorytreatment_id;
		// $hospitalization->iccu = $request->iccu;
		// $hospitalization->ward = $request->ward;
		// $hospitalization->totalLoS = $request->totalLoS;
		// $hospitalization->hospitalizationCost = $request->hospitalizationCost;
		// $hospitalization->save();

		// Outcomes
		// $Outcomes = new AdhfOutcomes();
		// $Outcomes->patient_id = $patient->id;
		// $Outcomes->categorytreatment_id = $categorytreatment_id;
		// $Outcomes->inhospitalDeath = $request->inhospitalDeath;
		// $Outcomes->vulnerablePhaseDeath = $request->vulnerablePhaseDeath;
		// $Outcomes->vulnerablePhaseRehospitalization = $request->vulnerablePhaseRehospitalization;
		// if ($request->dateofDeath) {
		// 	$Outcomes->dateofDeath = $request->dateofDeath;
		// }
		// $Outcomes->additional_notes = $request->additional_notes;
		// $Outcomes->save();

		// return redirect()->route('admin.listpatientadhf.index');
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
			// ->join('adhfrothorax', 'patient.id', '=', 'adhfrothorax.patient_id')
			->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
			->join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];
		$rumahsakit = RumahSakit::where('id', $data->rs_id)->get();

		// return response()->json($data);
		return view('admin.listpatientadhf.show', compact('data', 'rumahsakit'));
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
			->join('adhfhospitalization', 'patient.id', '=', 'adhfhospitalization.patient_id')
			->join('clinicalprofile', 'patient.id', '=', 'clinicalprofile.user_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];
		// $rumahsakit = RumahSakit::pluck('name_of_rs', 'id');
		// $rumahsakit = RumahSakit::where('id', $data->rs_id)->get();
		// return response()->json($data);

		$rumahsakit = RumahSakit::where('id', $data->rs_id)->pluck('name_of_rs', 'id');
		// $rumahsakit = RumahSakit::where('user_id', $user_id)->pluck('name_of_rs', 'id');

		return view('admin.listpatientadhf.edit', compact('data', 'rumahsakit'));
	}
	public function update($id, Request $request)
	{
		// $user_id = Auth::user()->id;
		$categorytreatment_id = 1;
		// Patient
		$patient = Patient::where('id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'rs_id' => $request->rs_id,
			'nik' => $request->nik,
			'name' => $request->name,
			'dateOfBirth' => $request->dateOfBirth,
			'age' => $request->age,
			'gender' => $request->gender,
			'phone' => $request->phone,
			'dateOfAdmission' => $request->dateOfAdmission,
			'insurance' => $request->insurance,
			'education' => $request->education,
		));

		// Clinical Profile
		$clinicalProfile = ClinicalProfile::where('user_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'height' => $request->height,
			'weight' => $request->weight,
			'bmi' => $request->bmi,
			'sbp' => $request->sbp,
			'dbp' => $request->dbp,
			'hr' => $request->hr,
			'dyspnoea_at_rest' => $request->dyspnoea_at_rest,
			'orthopnea' => $request->orthopnea,
			'pnd' => $request->pnd,
			'peripheral_oedema' => $request->peripheral_oedema,
			'pulmonary_rales' => $request->pulmonary_rales,
			'jvp' => $request->jvp,
			'type_of_acute_HF' => $request->type_of_acute_HF,
			'nyha_class' => $request->nyha_class,
			'cardiogenic_shock' => $request->cardiogenic_shock,
			'respiratory_failure' => $request->respiratory_failure,
		));

		// Risk Factor
		$riskFactor = AdhfRiskFactors::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'hypertension' => $request->hypertension,
			'diabetes_or_prediabetes' => $request->diabetes_or_prediabetes,
			'dislipidemia' => $request->dislipidemia,
			'alcohol' => $request->alcohol,
			'smoker' => $request->smoker,
			'ckd' => $request->ckd,
			'valvular_heart_disease' => $request->valvular_heart_disease,
			'atrial_fibrillation' => $request->atrial_fibrillation,
			'history_of_hf' => $request->history_of_hf,
			'history_of_pci_or_cabg' => $request->history_of_pci_or_cabg,
			'historyof_heart_valve_surgery' => $request->historyof_heart_valve_surgery,
			'omi_or_cad' => $request->omi_or_cad,
		));

		// Etiology
		$Etiology = AdhfEtiology::where('patient_id', $id)->update(array(
			'categorytreatment_id' =>  $categorytreatment_id,
			'precipitating_factors' => $request->precipitating_factors,
		));

		// Ro Thorax
		// $RoThorax = AdhfRoThorax::where('patient_id', $id)->update(array(
		// 	'categorytreatment_id' => $categorytreatment_id,
		// 	'ro_thorax' => $request->ro_thorax,
		// ));

		// Echocardiography
		$Echocardiography = AdhfEchocardiography::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'ef' => $request->ef,
			'tapse' => $request->tapse,
			'edv' => $request->edv,
			'esv' => $request->esv,
			// 'edd' => $request->edd,
			// 'esd' => $request->esd,
			'sign_mr' => $request->sign_mr,
			'lv' => $request->lv,
			'ee' => $request->ee,
		));
		// Blood Laboratory Test
		$BloodLaboratoryTest = AdhfBloodLaboratoryTest::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'hemoglobin' => $request->hemoglobin,
			'hematocrite' => $request->hematocrite,
			'random_blood_glucose' => $request->random_blood_glucose,
			'natrium' => $request->natrium,
			'kalium' => $request->kalium,
			'ureum' => $request->ureum,
			'bun' => $request->bun,
			'serum_creatinine' => $request->serum_creatinine,
			'serum_iron' => $request->serum_iron,
			'hba1c' => $request->hba1c,
			'gfr' => $request->gfr,
			'NT_ProBNP' => $request->NT_ProBNP,
		));
		// Blood Gas Analysis
		$BloodGasAnalysis = AdhfBloodGasAnalysis::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'pH' => $request->pH,
			'pco2' => $request->pco2,
			'hco3' => $request->hco3,
			'po2' => $request->po2,
			'lactate' => $request->lactate,
			'be' => $request->be,
		));
		// Medication
		$medication = AdhfMedication::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			// 'DopaminDose' => $request->DopaminDose,
			// 'DopaminDuration' => $request->DopaminDuration,
			// 'DobutaminDose' => $request->DobutaminDose,
			// 'DobutaminDuration' => $request->DobutaminDuration,
			// 'NorepinephrineDose' => $request->NorepinephrineDose,
			// 'NorepinephrineDuration' => $request->NorepinephrineDuration,
			// 'EpinephrinDose' => $request->EpinephrinDose,
			// 'EpinephrinDuration' => $request->EpinephrinDuration,
			'acei' => $request->acei,
			// 'aceiDoseatAdmission' => $request->aceiDoseatAdmission,
			'aceiDoseatPredischarge' => $request->aceiDoseatPredischarge,
			'arb' => $request->arb,
			// 'arbDoseatAdmission' => $request->arbDoseatAdmission,
			'arbDoseatPredischarge' => $request->arbDoseatPredischarge,
			// 'arniDoseatAdmission' => $request->arniDoseatAdmission,
			'arniDoseatPredischarge' => $request->arniDoseatPredischarge,
			// 'mraDoseatAdmission' => $request->mraDoseatAdmission,
			'mraDoseatPredischarge' => $request->mraDoseatPredischarge,
			'BetaBlocker' => $request->BetaBlocker,
			// 'BetaBlockerDoseatAdmission' => $request->BetaBlockerDoseatAdmission,
			'BetaBlockerDoseatPredischarge' => $request->BetaBlockerDoseatPredischarge,
			// 'LoopDiureticDoseatAdmission' => $request->LoopDiureticDoseatAdmission,
			'LoopDiureticDoseatPredischarge' => $request->LoopDiureticDoseatPredischarge,
			'sglt2i' => $request->sglt2i,
			// 'sglt2iDoseatAdmission' => $request->sglt2iDoseatAdmission,
			// 'sglt2iDoseatPredischarge' => $request->sglt2iDoseatPredischarge,
			// 'ivabradineDoseatAdmission' => $request->ivabradineDoseatAdmission,
			'ivabradineDoseatPredischarge' => $request->ivabradineDoseatPredischarge,
			'Tolvaptan' => $request->Tolvaptan,
			// 'insulin' => $request->insulin,
			'insulinDose' => $request->insulinDose,
			'inotropic' => $request->inotropic,
			'vasoconstrictor' => $request->vasoconstrictor,
			'statin' => $request->statin,
		));
		// Hospitalization
		$hospitalization = AdhfHospitalization::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'iccu' => $request->iccu,
			'ward' => $request->ward,
			'totalLoS' => $request->totalLoS,
			'hospitalizationCost' => $request->hospitalizationCost,
		));
		// Outcomes
		$Outcomes = AdhfOutcomes::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'inhospitalDeath' => $request->inhospitalDeath,
			'vulnerablePhaseDeath' => $request->vulnerablePhaseDeath,
			'vulnerablePhaseRehospitalization' => $request->vulnerablePhaseRehospitalization,
			'dateofDeath' => $request->dateofDeath,
			'additional_notes' => $request->additional_notes,
		));

		// return response()->json($id);
		return redirect()->route('admin.listpatientadhf.index');
	}
	public function massDelete(Request $request)
	{
		if ($request->get('toDelete') != 'mass') {
			$toDelete = json_decode($request->get('toDelete'));
			$patient = Patient::destroy($toDelete);
			$clinical = ClinicalProfile::where('user_id', $toDelete)->delete();
			AdhfRiskFactors::where('patient_id', $toDelete)->delete();
			AdhfEtiology::where('patient_id', $toDelete)->delete();
			AdhfEchocardiography::where('patient_id', $toDelete)->delete();
			AdhfBloodLaboratoryTest::where('patient_id', $toDelete)->delete();
			AdhfBloodGasAnalysis::where('patient_id', $toDelete)->delete();
			AdhfMedication::where('patient_id', $toDelete)->delete();
			AdhfHospitalization::where('patient_id', $toDelete)->delete();
			AdhfOutcomes::where('patient_id', $toDelete)->delete();
		} else {
			$patient =  Patient::whereNotNull('id')->delete();
		}
		// return $clinical;
		return redirect()->route('admin.listpatientadhf.index');
	}
}
