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
use phpDocumentor\Reflection\Types\Integer;

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
			$patients = Patient::select(
				'patient.id AS id',
				'patient.user_id',
				'patient.categorytreatment_id',
				'patient.rs_id',
				'patient.nik',
				'patient.name',
				'patient.dateOfBirth',
				'patient.age',
				'patient.gender',
				'patient.phone',
				'patient.dateOfAdmission',
				'patient.insurance',
				'patient.education',
				'patient.dateOfDischarge',
				'patient.yearOfAdmission',
				'patient.dateOfClinicVisit'
			)->with(['user', 'chronicclinicalprofile', 'cronicriskfactors', 'chronicechocardiography', 'chronicechocardiography', 'chronicbloodlaboratorytest', 'chronicmedication'])
				->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
				->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
				->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
				->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
				->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
				->where('patient.categorytreatment_id', 2)
				->get();
		} else {

			$patients = Patient::select(
				'patient.id AS id',
				'patient.user_id',
				'patient.categorytreatment_id',
				'patient.rs_id',
				'patient.nik',
				'patient.name',
				'patient.dateOfBirth',
				'patient.age',
				'patient.gender',
				'patient.phone',
				'patient.dateOfAdmission',
				'patient.insurance',
				'patient.education',
				'patient.dateOfDischarge',
				'patient.yearOfAdmission',
				'patient.dateOfClinicVisit'
			)->with(['user', 'chronicclinicalprofile', 'cronicriskfactors', 'chronicechocardiography', 'chronicechocardiography', 'chronicbloodlaboratorytest', 'chronicmedication'])
				->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
				->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
				->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
				->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
				->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
				->where('patient.user_id', $user_id)
				->where('patient.categorytreatment_id', 2)
				->get();
		}


		$patient2 = json_decode($patients, true); // Mengubah data JSON menjadi array asosiatif

		$excludedFields = ['created_at', 'updated_at', 'dateOfAdmission']; // Daftar field yang ingin dikecualikan

		foreach ($patient2 as &$row) {
			$totalFields = count($row) - count($excludedFields); // Total jumlah field yang dihitung

			$filledFields = 0; // Jumlah field yang terisi

			foreach ($row as $field => $value) {
				if (!in_array($field, $excludedFields) && !empty($value)) {
					$filledFields++;
				}
			}
			$percentage = ($filledFields / $totalFields) * 100; // Menghitung persentase data yang terisi
			$row['percent'] = round($percentage); // Menambahkan hasil persentase ke dalam array data
		}

		$patient = array();

		$monthfollowupdata = ChronicPatientMonthFollowUp::select('chronicpatientmonthfollowup.id', 'patient_id', 'monthfollowup_id', 'mount')
			->join('monthfollowup', 'monthfollowup_id', '=', 'monthfollowup.id')->get();
		// return response()->json($monthfollowupdata);
		for ($i = 0; $i < count($patient2); $i++) {
			array_push($patient, (object) $patient2[$i]);
		}
		// return response()->json($patients);

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
		if ($request->dateOfBirth) {
			$patient->dateOfBirth = $request->dateOfBirth;
		}

		$patient->age = $request->age;
		$patient->gender = $request->gender;
		$patient->phone = $request->phone;
		$patient->yearOfAdmission = $request->yearOfAdmission;
		if ($request->dateOfClinicVisit) {
			$patient->dateOfClinicVisit = $request->dateOfClinicVisit;
		}

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

		// Echocardiography
		$Echocardiography = new ChronicEchocardiography();
		$Echocardiography->patient_id = $patient->id;
		$Echocardiography->categorytreatment_id = $categorytreatment_id;
		$Echocardiography->efAtFirst = $request->efAtFirst;
		if ($request->efAtFirstDate) {
			$Echocardiography->efAtFirstDate = $request->efAtFirstDate;
		}

		$Echocardiography->latestEf = $request->latestEf;
		if ($request->latestEfDate) {
			$Echocardiography->latestEfDate = $request->latestEfDate;
		}
		$Echocardiography->tapse = $request->tapse;
		$Echocardiography->edv = $request->edv;
		$Echocardiography->esv = $request->esv;
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
		$medication->loopDiureticDose = $request->loopDiureticDose;
		$medication->ivabradineDose = $request->ivabradineDose;
		$medication->statin = $request->statin;
		$medication->insulin = $request->insulin;
		$medication->devices = $request->devices;
		$medication->additional_notes = $request->additional_notes;
		$medication->save();

		return redirect()->route('admin.listpatientcronic.index');
	}

	public function show($id)
	{
		// $patient =
		// 	Patient::select(
		// 		'patient.id AS id',
		// 		'patient.user_id',
		// 		'patient.categorytreatment_id',
		// 		'patient.rs_id',
		// 		'patient.nik',
		// 		'patient.name',
		// 		'patient.dateOfBirth',
		// 		'patient.age',
		// 		'patient.gender',
		// 		'patient.phone',
		// 		'patient.dateOfAdmission',
		// 		'patient.insurance',
		// 		'patient.education',
		// 		'patient.dateOfDischarge',
		// 		'patient.yearOfAdmission',
		// 		'patient.dateOfClinicVisit'
		// 	)->with([
		// 		// 'user',
		// 		'chronicclinicalprofile',
		// 		'cronicriskfactors',
		// 		'chronicechocardiography',
		// 		'chronicbloodlaboratorytest',
		// 		'chronicmedication'
		// 	])
		// 	->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
		// 	->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
		// 	->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
		// 	->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
		// 	->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
		// 	->where('patient.id', $id)
		// 	->where('patient.categorytreatment_id', 2)
		// 	->get();
		$patient = DB::table('patient')
			->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
			->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
			->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
			->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
			->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];
		$monthfollowup = ChronicPatientMonthFollowUp::where('patient_id', $id)
			->join('patient', 'patient.id', '=', 'chronicpatientmonthfollowup.patient_id')
			->join('monthfollowup', 'monthfollowup.id', '=', 'chronicpatientmonthfollowup.monthfollowup_id')
			->get();
		// return response()->json($data);
		return view('admin.listpatientcronic.show', compact('data', 'monthfollowup'));
	}
	public function edit($id)
	{
		$patient = DB::table('patient')
			->join('chronicclinicalprofile', 'patient.id', '=', 'chronicclinicalprofile.patient_id')
			->join('cronicriskfactors', 'patient.id', '=', 'cronicriskfactors.patient_id')
			->join('chronicechocardiography', 'patient.id', '=', 'chronicechocardiography.patient_id')
			->join('chronicbloodlaboratorytest', 'patient.id', '=', 'chronicbloodlaboratorytest.patient_id')
			->join('chronicmedication', 'patient.id', '=', 'chronicmedication.patient_id')
			->where('patient.id', $id)
			->get();
		$data = $patient[0];
		$rumahsakit = RumahSakit::where('id', $data->rs_id)->pluck('name_of_rs', 'id');
		return view('admin.listpatientcronic.edit', compact('data', 'rumahsakit'));
	}
	public function update($id, Request $request)
	{

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
			'yearOfAdmission' => $request->yearOfAdmission,
			'dateOfClinicVisit' => $request->dateOfClinicVisit,
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
			'valvularHeartDiesease' => $request->historyofPciorCabg,
		));
		// Echocardiography
		$Echocardiography = ChronicEchocardiography::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'efAtFirst' => $request->efAtFirst,
			'efAtFirstDate' => $request->efAtFirstDate,
			'latestEf' => $request->latestEf,
			'latestEfDate' => $request->latestEfDate,
			'tapse' => $request->tapse,
			'edv' => $request->edv,
			'esv' => $request->esv,
			'signMr' => $request->signMr,
			'diastolicFunction' => $request->diastolicFunction,
			'lvMaxIndex' => $request->lvMaxIndex,
			'eeAverage' => $request->eeAverage,
		));
		// Blood Laboratory Test
		$BloodLaboratoryTest = ChronicBloodLaboratoryTest::where('patient_id', $id)->update(array(
			'categorytreatment_id' => $categorytreatment_id,
			'hemoglobin' => $request->hemoglobin,
			'hematocrite' => $request->hematocrite,
			'randomBloodGlucose' => $request->randomBloodGlucose,
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
			'loopDiureticDose' => $request->loopDiureticDose,
			'ivabradineDose' => $request->ivabradineDose,
			'statin' => $request->statin,
			'insulin' => $request->insulin,
			'devices' => $request->devices,
			'additional_notes' => $request->additional_notes,
		));

		return redirect()->route('admin.listpatientcronic.index');
	}
	public function massDelete(Request $request)
	{
		if ($request->get('toDelete') != 'mass') {
			$toDelete = json_decode($request->get('toDelete'));
			$patient = Patient::destroy($toDelete);
			$clinical = ChronicClinicalProfile::where('patient_id', $toDelete)->delete();
			CronicRiskFactors::where('patient_id', $toDelete)->delete();
			ChronicEchocardiography::where('patient_id', $toDelete)->delete();
			ChronicBloodLaboratoryTest::where('patient_id', $toDelete)->delete();
			ChronicMedication::where('patient_id', $toDelete)->delete();
		} else {
			$patient =  Patient::whereNotNull('id')->delete();
		}
		// return $clinical;
		return redirect()->route('admin.listpatientcronic.index');
	}
}
