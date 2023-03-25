<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Patient;
use App\ChronicClinicalProfile;
use App\CronicRiskFactors;
use App\ChronicRoThorax;
use App\ChronicEchocardiography;
use App\ChronicBloodLaboratoryTest;
use App\ChronicMedication;
use App\MonthFollowUp;
use App\ChronicOutcomes;
use App\ChronicPatientFollowup;
use App\ChronicPatientMonthFollowUp;
use App\Http\Requests\CreateChronic;
use Illuminate\Support\Facades\Auth;
use App\MenuRole;
use App\RumahSakit;
use Laraveldaily\Quickadmin\Models\Menu;
use Illuminate\Http\Request;
use convertObjectClass;
use Illuminate\Support\Facades\DB;

class ListPatientCronicController extends Controller
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
				->where('categorytreatment_id', 2)
				->get();
		} else {
			$patients = Patient::with("user")
				->where('user_id', $user_id)
				->where('categorytreatment_id', 2)
				->get();
		}
		$patient = array();
		// $patientFollowup = DB::table('chronicpatientmonthfollowup')
		// 	->select('mount')
		// 	->join('monthfollowup', 'monthfollowup.id', '=', 'chronicpatientmonthfollowup.monthfollowup_id')
		// 	->where('chronicpatientmonthfollowup.patient_id', 13)
		// 	->get();
		// $FollowupToString = implode(" ", $patientFollowup);

		foreach ($patients as $key => $value) {
			$percentage = DB::table('patient')
				->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
				->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
				// ->join('chronicrothorax', 'patient.id', '=', 'chronicrothorax.patient_id')
				->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
				->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
				->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
				// ->join('chronicoutcomes', 'patient.id', '=', 'chronicoutcomes.patient_id')
				->where('patient.id', $value->id)
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
				'dateOfClinicVisit' => $value->dateOfClinicVisit,
				'insurance' => $value->insurance,
				'education' => $value->education,
				'created_at' => $value->created_at,
				'updated_at' => $value->updated_at,
				'user' => $value->user,
				'percent' => $persentasi,
			));
		}
		$monthfollowupdata = ChronicPatientMonthFollowUp::select('chronicpatientmonthfollowup.id', 'patient_id', 'monthfollowup_id', 'mount')
			->join('monthfollowup', 'monthfollowup_id', '=', 'monthfollowup.id')->get();
		// return response()->json($monthfollowupdata);

		return view('admin.listpatientcronic.index', compact('patient', 'monthfollowupdata'));
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
		return view('admin.listpatientcronic.create', compact('rumahsakit'));
	}
	public function store(CreateChronic $request)
	{
		$user_id = Auth::user()->id;
		$categorytreatment_id = 2;
		// Patient
		$patient = new Patient();
		$patient->user_id = $user_id;
		$patient->categorytreatment_id = $categorytreatment_id;
		$patient->rs_id = $request->rs_id;
		$patient->nik = $request->nik;
		$patient->name = $request->name;
		$patient->dateOfBirth = $request->dateOfBirth;
		$patient->age = $request->age;
		$patient->gender = $request->gender;
		$patient->phone = $request->phone;
		$patient->yearOfAdmission = $request->yearOfAdmission;
		$patient->dateOfClinicVisit = $request->dateOfClinicVisit;
		$patient->insurance = $request->insurance;
		$patient->education = $request->education;
		// if ($request->dateOfDischarge) {
		// 	$patient->dateOfDischarge = $request->dateOfDischarge;
		// } else {
		// 	$patient->dateOfDischarge = date("0000-00-00");
		// }
		$patient->save();


		// Clinical Profile
		$clinicalProfile = new ChronicClinicalProfile();
		$clinicalProfile->patient_id = $patient->id;
		$clinicalProfile->categorytreatment_id = $categorytreatment_id;
		$clinicalProfile->height = $request->height;
		$clinicalProfile->weight = $request->weight;
		$clinicalProfile->bmi = $request->bmi;
		$clinicalProfile->sbp = $request->sbp;
		$clinicalProfile->dbp = $request->dbp;
		$clinicalProfile->hr = $request->hr;
		$clinicalProfile->dyspnoeaOnExertion = $request->dyspnoeaOnExertion;
		$clinicalProfile->orthopnea = $request->orthopnea;
		$clinicalProfile->pnd = $request->pnd;
		$clinicalProfile->peripheralOedema = $request->peripheralOedema;
		$clinicalProfile->pulmonaryRales = $request->pulmonaryRales;
		$clinicalProfile->jvp = $request->jvp;
		// $clinicalProfile->ahaStaging = $request->ahaStaging;
		$clinicalProfile->nyhaClass = $request->nyhaClass;
		$clinicalProfile->etiology = $request->etiology;
		$clinicalProfile->save();
		// Risk Factor
		$riskFactor = new CronicRiskFactors();
		$riskFactor->patient_id = $patient->id;
		$riskFactor->categorytreatment_id = $categorytreatment_id;
		$riskFactor->hypertension = $request->hypertension;
		$riskFactor->diabetesorPrediabetes = $request->diabetesorPrediabetes;
		$riskFactor->dislipidemia = $request->dislipidemia;
		$riskFactor->alcohol = $request->alcohol;
		$riskFactor->smoker = $request->smoker;
		$riskFactor->ckd = $request->ckd;
		$riskFactor->atrialFibrillation = $request->atrialFibrillation;
		$riskFactor->bundleBranchBlock = $request->bundleBranchBlock;
		$riskFactor->historyofCad = $request->historyofCad;
		$riskFactor->historyofHf = $request->historyofHf;
		$riskFactor->historyofPciorCabg = $request->historyofPciorCabg;
		$riskFactor->valvularHeartDiesease = $request->valvularHeartDiesease;
		$riskFactor->save();

		// Ro Thorax
		// $RoThorax = new ChronicRoThorax();
		// $RoThorax->patient_id = $patient->id;
		// $RoThorax->categorytreatment_id = $categorytreatment_id;
		// $RoThorax->roThorax = $request->roThorax;
		// $RoThorax->save();
		// Echocardiography
		$Echocardiography = new ChronicEchocardiography();
		$Echocardiography->patient_id = $patient->id;
		$Echocardiography->categorytreatment_id = $categorytreatment_id;
		$Echocardiography->efAtFirst = $request->efAtFirst;
		$Echocardiography->efAtFirstDate = $request->efAtFirstDate;
		$Echocardiography->latestEf = $request->latestEf;
		$Echocardiography->latestEfDate = $request->latestEfDate;
		$Echocardiography->tapse = $request->tapse;
		$Echocardiography->edv = $request->edv;
		$Echocardiography->esv = $request->esv;
		// $Echocardiography->edd = $request->edd;
		// $Echocardiography->esd = $request->esd;
		$Echocardiography->signMr = $request->signMr;
		$Echocardiography->lvMaxIndex = $request->lvMaxIndex;
		$Echocardiography->eeAverage = $request->eeAverage;
		$Echocardiography->save();
		// Blood Laboratory Test
		$BloodLaboratoryTest = new ChronicBloodLaboratoryTest();
		$BloodLaboratoryTest->patient_id = $patient->id;
		$BloodLaboratoryTest->categorytreatment_id = $categorytreatment_id;
		$BloodLaboratoryTest->hemoglobin = $request->hemoglobin;
		$BloodLaboratoryTest->hematocrite = $request->hematocrite;
		$BloodLaboratoryTest->randomBloodGlucose = $request->randomBloodGlucose;
		$BloodLaboratoryTest->hbA1C = $request->hbA1C;
		$BloodLaboratoryTest->fastingBloodGlucose = $request->fastingBloodGlucose;
		$BloodLaboratoryTest->twoHoursPostPrandialBloodGlucose = $request->twoHoursPostPrandialBloodGlucose;
		$BloodLaboratoryTest->natrium = $request->natrium;
		$BloodLaboratoryTest->kalium = $request->kalium;
		$BloodLaboratoryTest->ureum = $request->ureum;
		$BloodLaboratoryTest->bun = $request->bun;
		$BloodLaboratoryTest->serumCreatinine = $request->serumCreatinine;
		$BloodLaboratoryTest->gfr = $request->gfr;
		$BloodLaboratoryTest->nt_ProBnp = $request->nt_ProBnp;
		$BloodLaboratoryTest->save();
		// Medication
		$medication = new ChronicMedication();
		$medication->patient_id = $patient->id;
		$medication->categorytreatment_id = $categorytreatment_id;
		$medication->acei = $request->acei;
		$medication->aceiDose = $request->aceiDose;
		$medication->aceiIntolerance = $request->aceiIntolerance;
		$medication->betaBlocker = $request->betaBlocker;
		$medication->betaBlockerDose = $request->betaBlockerDose;
		$medication->betaBlockerIntolerance = $request->betaBlockerIntolerance;
		$medication->arb = $request->arb;
		$medication->arbDose = $request->arbDose;
		$medication->arniDose = $request->arniDose;
		$medication->mraDose = $request->mraDose;
		$medication->mraIntolerance = $request->mraIntolerance;
		$medication->sglt2i = $request->sglt2i;
		$medication->sglt2iDose = $request->sglt2iDose;
		// $medication->loopDiuretic = $request->loopDiuretic;
		$medication->loopDiureticDose = $request->loopDiureticDose;
		$medication->ivabradineDose = $request->ivabradineDose;
		$medication->statin = $request->statin;
		$medication->insulin = $request->insulin;
		$medication->devices = $request->devices;
		$medication->save();


		// $data = [
		// 	'patient' => $patient,
		// 	'clinicalProfile' => $clinicalProfile,
		// 	'riskFactor' => $riskFactor,
		// 	'Etiology' => $Etiology,
		// 	'RoThorax' => $RoThorax,
		// 	'Echocardiography' => $Echocardiography,
		// 	'BloodLaboratoryTest' => $BloodLaboratoryTest,
		// 	'BloodGasAnalysis' => $BloodGasAnalysis,
		// 	'medication' => $medication,
		// 	'hospitalization' => $hospitalization,
		// 	'Outcomes' => $Outcomes

		// ];
		// return view('admin.listpatientadhf.index', compact('patient'));

		return redirect()->route('admin.listpatientcronic.index');


		// return response()->json($request);
		// return 1;
	}

	public function show($id)
	{
		$patient = DB::table('patient')
			->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
			->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
			->join('chronicrothorax', 'patient.id', '=', 'chronicrothorax.patient_id')
			->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
			->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
			->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
			// ->join('chronicoutcomes', 'patient.id', '=', 'chronicoutcomes.patient_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];
		$monthfollowup = ChronicPatientMonthFollowUp::where('patient_id', $id)
			->join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
			->join('monthfollowup', 'monthfollowup.id', '=', 'chronicpatientmonthfollowup.monthfollowup_id')
			->get();
		// return response()->json($monthfollowup);
		return view('admin.listpatientcronic.show', compact('data', 'monthfollowup'));
	}
	public function edit($id)
	{
		$patient = DB::table('patient')
			->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
			->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
			->join('chronicrothorax', 'patient.id', '=', 'chronicrothorax.patient_id')
			->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
			->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
			->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
			// ->join('chronicoutcomes', 'patient.id', '=', 'chronicoutcomes.patient_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];
		$rumahsakit = RumahSakit::pluck('name_of_rs', 'id');
		// return response()->json($data);

		return view('admin.listpatientcronic.edit', compact('data', 'rumahsakit'));
	}
	public function update($id, Request $request)
	{
		// return response()->json($request);

		$user_id = Auth::user()->id;
		$categorytreatment_id = 2;
		// Patient
		$patient = Patient::where('id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
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
		$clinicalProfile = ChronicClinicalProfile::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'height' => $request->height,
			'weight' => $request->weight,
			'bmi' => $request->bmi,
			'sbp' => $request->sbp,
			'dbp' => $request->dbp,
			'hr' => $request->hr,
			'dyspnoeaOnExertion' => $request->dyspnoeaOnExertion,
			'orthopnea' => $request->orthopnea,
			'pnd' => $request->pnd,
			'peripheralOedema' => $request->peripheralOedema,
			'pulmonaryRales' => $request->pulmonaryRales,
			'jvp' => $request->jvp,
			'ahaStaging' => $request->ahaStaging,
			'nyhaClass' => $request->nyhaClass,
			'etiology' => $request->etiology,
		));
		// Risk Factor
		$riskFactor = CronicRiskFactors::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'hypertension' => $request->hypertension,
			'diabetesorPrediabetes' => $request->diabetesorPrediabetes,
			'dislipidemia' => $request->dislipidemia,
			'alcohol' => $request->alcohol,
			'smoker' => $request->smoker,
			'ckd' => $request->ckd,
			'atrialFibrillation' => $request->atrialFibrillation,
			'bundleBranchBlock' => $request->bundleBranchBlock,
			'historyofCad' => $request->historyofCad,
			'historyofHf' => $request->historyofHf,
			'historyofPciorCabg' => $request->historyofPciorCabg,
		));
		// Ro Thorax
		$RoThorax = ChronicRoThorax::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'roThorax' => $request->roThorax,
		));
		// Echocardiography
		$Echocardiography = ChronicEchocardiography::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'ef' => $request->ef,
			'tapse' => $request->tapse,
			'edv' => $request->edv,
			'esv' => $request->esv,
			'edd' => $request->edd,
			'esd' => $request->esd,
			'signMr' => $request->signMr,
			'diastolicFunction' => $request->diastolicFunction,
		));
		// Blood Laboratory Test
		$BloodLaboratoryTest = ChronicBloodLaboratoryTest::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'hemoglobin' => $request->hemoglobin,
			'hematocrite' => $request->hematocrite,
			'hematocrite' => $request->erythrocyte,
			'hbA1C' => $request->hbA1C,
			'fastingBloodGlucose' => $request->fastingBloodGlucose,
			'twoHoursPostPrandialBloodGlucose' => $request->twoHoursPostPrandialBloodGlucose,
			'natrium' => $request->natrium,
			'kalium' => $request->kalium,
			'ureum' => $request->ureum,
			'bun' => $request->bun,
			'serumCreatinine' => $request->serumCreatinine,
			'gfr' => $request->gfr,
			'nt_ProBnp' => $request->nt_ProBnp,
		));
		// Medication
		$medication = ChronicMedication::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'acei' => $request->acei,
			'aceiDose' => $request->aceiDose,
			'aceiIntolerance' => $request->aceiIntolerance,
			'arb' => $request->arb,
			'arbDose' => $request->arbDose,
			'arniDose' => $request->arniDose,
			'BetaBlocker' => $request->BetaBlocker,
			'betaBlockerDose' => $request->betaBlockerDose,
			'betaBlockerIntolerance' => $request->betaBlockerIntolerance,
			'mraDose' => $request->mraDose,
			'mraIntolerance' => $request->mraIntolerance,
			'sglt2i' => $request->sglt2i,
			'sglt2iDose' => $request->sglt2iDose,
			'loopDiuretic' => $request->loopDiuretic,
			'loopDiureticDose' => $request->loopDiureticDose,
			'ivabradineDose' => $request->ivabradineDose,
			'insulin' => $request->insulin,
			'devices' => $request->devices,
		));
		// Outcomes
		$Outcomes = ChronicOutcomes::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'totalRehospitalization' => $request->totalRehospitalization,
			'allCauseDeath' => $request->allCauseDeath,
			'cardiacRelatedDeath' => $request->cardiacRelatedDeath,
			'dateofDeath' => $request->dateofDeath,
			'additional_notes' => $request->additional_notes,
		));
		return redirect()->route('admin.listpatientcronic.index');
	}
}
