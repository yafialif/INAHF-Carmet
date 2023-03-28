@extends('admin.layouts.master')

@section('content')

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">{{ trans('quickadmin::templates.templates-customView_index-list') }}</div>
    </div>
    <div class="portlet-body">

        {{-- {{ trans('quickadmin::templates.templates-customView_index-welcome_custom_view') }} --}}
        @if (count($patient))
        <div class="table-responsive">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        {{-- Patient Identity --}}
                        <td>id</td>
                        {{-- <td>user_id</td>
                        <td>categorytreatment id</td> --}}
                        <td>nik</td>
                        <td>name</td>
                        <td>date Of Birth</td>
                        <td>age</td>
                        <td>Year of admission</td>
                        <td>Date of clinic visit</td>
                        <td>insurance</td>
                        <td>education</td>
                        <td>gender</td>
                        <td>phone</td>
                        {{-- Clinical Profile --}}

                        <td>height</td>
                        <td>weight</td>
                        <td>bmi</td>
                        <td>hr</td>
                        <td>sbp</td>
                        <td>dbp</td>
                        <td>Dyspnoea on exertion</td>
                        <td>orthopnea</td>
                        <td>pnd</td>
                        <td>NYHA Class</td>
                        <td>pulmonary rales</td>
                        <td>Etiology</td>
                        <td>peripheral oedema</td>
                        <td>jvp</td>
                        {{-- risk Factor --}}
                        <td>smoker</td>
                        <td>diabetes or prediabetes</td>
                        <td>hypertension</td>
                        <td>dislipidemia</td>
                        <td>alcohol</td>
                        <td>ckd</td>
                        <td>atrial fibrillation</td>
                        <td>Bundle Branch Block</td>
                        <td>History of CAD</td>
                        <td>history of hf</td>
                        <td>history of pci or cabg</td>
                        <td>valvular heart disease</td>

                        {{-- Echocardiography --}}
                        <td>EF at first</td>
                        <td>Date of first LVEF Examination</td>
                        <td>Latest EF</td>
                        <td>Date of latest LVEF Examination</td>
                        <td>edv</td>
                        <td>esv</td>
                        <td>tapse</td>
                        <td>sign mr</td>
                        <td>LV mass index</td>
                        <td>E/e’ average</td>
                        {{-- Blood Laboratory Test --}}
                        <td>hemoglobin</td>
                        <td>hematocrite</td>
                        <td>random blood glucose</td>
                        <td>HbA1C</td>
                        <td>natrium</td>
                        <td>kalium</td>
                        <td>ureum</td>
                        <td>bun</td>
                        <td>serum creatinine</td>
                        <td>gfr</td>
                        <td>NT-ProBNP</td>
                        {{-- Medication --}}
                        <td>acei</td>
                        <td>ACEi Dose</td>
                        <td>ACEi intolerance</td>
                        <td>ARNI Dose</td>
                        <td>arb</td>
                        <td>ARB Dose</td>
                        <td>MRA Intolerance</td>
                        <td>MRA Dose</td>
                        <td>SGLT2i</td>
                        <td>SGLT2i Dose</td>
                        <td>Beta Blocker</td>
                        <td>Beta Blocker Dose</td>
                        <td>Beta Blocker Intolerance</td>
                        <td>Ivabradine Dose</td>
                        <td>Devices</td>
                        <td>Loop Diuretic Dose</td>
                        <td>Insulin</td>
                        <td>Statin</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patient as $row)
                    <tr>
                        {{-- Patient Identity --}}
                        <td>{{ $row->id }}</td>
                        {{-- <td>{{ $row->user_id }}</td>
                        <td>{{ $row->categorytreatment_id }}</td> --}}
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->dateOfBirth }}</td>
                        <td>{{ $row->age }}</td>
                        <td>{{ $row->yearOfAdmission }}</td>
                        <td>{{ $row->dateOfClinicVisit }}</td>
                        <td>{{ $row->insurance }}</td>
                        <td>{{ $row->education }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->phone }}</td>
                        {{-- Clinical Profile --}}
                        <td>{{ $row->height }}</td>
                        <td>{{ $row->weight }}</td>
                        <td>{{ $row->bmi }}</td>
                        <td>{{ $row->hr }}</td>
                        <td>{{ $row->sbp }}</td>
                        <td>{{ $row->dbp }}</td>
                        <td>{{ $row->dyspnoeaOnExertion }}</td>
                        <td>{{ $row->orthopnea }}</td>
                        <td>{{ $row->pnd }}</td>
                        <td>{{ $row->nyhaClass }}</td>
                        <td>{{ $row->pulmonaryRales }}</td>
                        <td>{{ $row->etiology }}</td>
                        <td>{{ $row->peripheralOedema }}</td>
                        <td>{{ $row->jvp }}</td>
                        {{-- risk Factor --}}
                        <td>{{ $row->smoker }}</td>
                        <td>{{ $row->diabetesorPrediabetes }}</td>
                        <td>{{ $row->hypertension }}</td>
                        <td>{{ $row->dislipidemia }}</td>
                        <td>{{ $row->alcohol }}</td>
                        <td>{{ $row->ckd }}</td>
                        <td>{{ $row->atrialFibrillation }}</td>
                        <td>{{ $row->bundleBranchBlock }}</td>
                        <td>{{ $row->historyofCad }}</td>
                        <td>{{ $row->historyofHf }}</td>
                        <td>{{ $row->historyofPciorCabg }}</td>
                        <td>{{ $row->valvularHeartDiesease }}</td>
                        {{-- Echocardiography --}}
                        <td>{{ $row->efAtFirst }}</td>
                        <td>{{ $row->efAtFirstDate }}</td>
                        <td>{{ $row->latestEf }}</td>
                        <td>{{ $row->latestEfDate }}</td>
                        <td>{{ $row->edv }}</td>
                        <td>{{ $row->esv }}</td>
                        <td>{{ $row->tapse }}</td>
                        <td>{{ $row->signMr }}</td>
                        <td>{{ $row->lvMaxIndex }}</td>
                        <td>{{ $row->eeAverage }}</td>
                        {{-- Blood Laboratory Test --}}
                        <td>{{ $row->hemoglobin }}</td>
                        <td>{{ $row->hematocrite }}</td>
                        <td>{{ $row->randomBloodGlucose }}</td>
                        <td>{{ $row->hbA1C }}</td>
                        <td>{{ $row->natrium }}</td>
                        <td>{{ $row->kalium }}</td>
                        <td>{{ $row->ureum }}</td>
                        <td>{{ $row->bun }}</td>
                        <td>{{ $row->serumCreatinine }}</td>
                        <td>{{ $row->gfr }}</td>
                        <td>{{ $row->nt_ProBnp }}</td>
                        {{-- Medication --}}
                        <td>{{ $row->acei }}</td>
                        <td>{{ $row->aceiDose }}</td>
                        <td>{{ $row->aceiIntolerance }}</td>
                        <td>{{ $row->arniDose }}</td>
                        <td>{{ $row->arb }}</td>
                        <td>{{ $row->arbDose }}</td>
                        <td>{{ $row->mraIntolerance }}</td>
                        <td>{{ $row->mraDose }}</td>
                        <td>{{ $row->sglt2i }}</td>
                        <td>{{ $row->sglt2iDose }}</td>
                        <td>{{ $row->betaBlocker }}</td>
                        <td>{{ $row->betaBlockerDose }}</td>
                        <td>{{ $row->betaBlockerIntolerance }}</td>
                        <td>{{ $row->ivabradineDose }}</td>
                        <td>{{ $row->devices }}</td>
                        <td>{{ $row->loopDiureticDose }}</td>
                        <td>{{ $row->insulin }}</td>
                        <td>{{ $row->statin }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@else
{{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif
@endsection