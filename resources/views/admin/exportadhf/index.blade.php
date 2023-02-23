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
                        <td>user_id</td>
                        <td>categorytreatment id</td>
                        <td>nik</td>
                        <td>name</td>
                        <td>dateOfBirth</td>
                        <td>age</td>
                        <td>gender</td>
                        <td>phone</td>
                        <td>dateOfAdmission</td>
                        <td>insurance</td>
                        <td>education</td>
                        <td>dateOfDischarge</td>
                        {{-- Clinical Profile --}}

                        <td>height</td>
                        <td>weight</td>
                        <td>bmi</td>
                        <td>sbp</td>
                        <td>dbp</td>
                        <td>hr</td>
                        <td>dyspnoea at rest</td>
                        <td>orthopnea</td>
                        <td>pnd</td>
                        <td>peripheral oedema</td>
                        <td>pulmonary rales</td>
                        <td>jvp</td>
                        <td>type of acute HF</td>
                        <td>NYHA Class</td>
                        <td>cardiogenic shock</td>
                        <td>respiratory failure</td>
                        {{-- risk Factor --}}

                        <td>hypertension</td>
                        <td>diabetes or prediabetes</td>
                        <td>dislipidemia</td>
                        <td>alcohol</td>
                        <td>smoker</td>
                        <td>ckd</td>
                        <td>valvular heart disease</td>
                        <td>atrial fibrillation</td>
                        <td>history of hf</td>
                        <td>history of pci or cabg</td>
                        <td>historyof heart valve surgery</td>
                        <td>omi or cad</td>
                        {{-- Etiology --}}
                        <td>acs</td>
                        <td>hypertension emergency</td>
                        <td>arrhytmia</td>
                        <td>acute nechanical cause</td>
                        <td>pulmonary embolism</td>
                        <td>infections</td>
                        <td>tamponade</td>
                        {{-- Ro Thorax --}}
                        <td>ro thorax</td>

                        {{-- Echocardiography --}}
                        <td>ef</td>
                        <td>tapse</td>
                        <td>edv</td>
                        <td>esv</td>
                        <td>edd</td>
                        <td>esd</td>
                        <td>sign mr</td>
                        <td>E/A</td>
                        {{-- Blood Laboratory Test --}}
                        <td>hemoglobin</td>
                        <td>hematocrite</td>
                        <td>erythrocyte</td>
                        <td>random blood glucose</td>
                        <td>fasting blood glucose</td>
                        <td>twoHoursPostPrandialBloodGlucose</td>
                        <td>natrium</td>
                        <td>kalium</td>
                        <td>ureum</td>
                        <td>bun</td>
                        <td>serum creatinine</td>
                        <td>gfr</td>
                        <td>uric acid</td>
                        <td>NT ProBNP at admission</td>
                        <td>NT ProBNP at discharge</td>
                        {{-- Blood Gas Analysis --}}
                        <td>pH</td>
                        <td>pco2</td>
                        <td>hco3</td>
                        <td>po2</td>
                        <td>lactate</td>
                        <td>be</td>
                        {{-- Medication --}}
                        <td>DopaminDose</td>
                        <td>DopaminDuration</td>
                        <td>DobutaminDose</td>
                        <td>DobutaminDuration</td>
                        <td>NorepinephrineDose</td>
                        <td>NorepinephrineDuration</td>
                        <td>EpinephrinDose</td>
                        <td>EpinephrinDuration</td>
                        <td>acei</td>
                        <td>aceiDoseatAdmission</td>
                        <td>aceiDoseatPredischarge</td>
                        <td>arb</td>
                        <td>arbDoseatAdmission</td>
                        <td>arbDoseatPredischarge</td>
                        <td>arniDoseatAdmission</td>
                        <td>arniDoseatPredischarge</td>
                        <td>mraDoseatAdmission</td>
                        <td>mraDoseatPredischarge</td>
                        <td>BetaBlocker</td>
                        <td>BetaBlockerDoseatAdmission</td>
                        <td>BetaBlockerDoseatPredischarge</td>
                        <td>LoopDiureticDoseatAdmission</td>
                        <td>LoopDiureticDoseatPredischarge</td>
                        <td>sglt2i</td>
                        <td>sglt2iDoseatAdmission</td>
                        <td>sglt2iDoseatPredischarge</td>
                        <td>ivabradineDoseatAdmission</td>
                        <td>ivabradineDoseatPredischarge</td>
                        <td>TolvaptanTotalDose</td>
                        <td>insulin</td>
                        <td>insulinDose</td>
                        <td>otherOAD</td>
                        {{-- Hospitalization --}}
                        <td>iccu</td>
                        <td>ward</td>
                        <td>totalLoS</td>
                        <td>hospitalizationCost</td>
                        {{-- Outcomes --}}
                        <td>inhospitalDeath</td>
                        <td>vulnerablePhaseDeath</td>
                        <td>vulnerablePhaseRehospitalization</td>
                        <td>dateofDeath</td>
                        <td>additional notes</td>
                        <td>rs id</td>
                        {{-- <td>deleted at</td> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patient as $row)
                    <tr>
                        {{-- Patient Identity --}}
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->user_id }}</td>
                        <td>{{ $row->categorytreatment_id }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->dateOfBirth }}</td>
                        <td>{{ $row->age }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->dateOfAdmission }}</td>
                        <td>{{ $row->insurance }}</td>
                        <td>{{ $row->education }}</td>
                        <td>{{ $row->dateOfDischarge }}</td>
                        {{-- Clinical Profile --}}
                        <td>{{ $row->height }}</td>
                        <td>{{ $row->weight }}</td>
                        <td>{{ $row->bmi }}</td>
                        <td>{{ $row->sbp }}</td>
                        <td>{{ $row->dbp }}</td>
                        <td>{{ $row->hr }}</td>
                        <td>{{ $row->dyspnoea_at_rest }}</td>
                        <td>{{ $row->orthopnea }}</td>
                        <td>{{ $row->pnd }}</td>
                        <td>{{ $row->peripheral_oedema }}</td>
                        <td>{{ $row->pulmonary_rales }}</td>
                        <td>{{ $row->jvp }}</td>
                        <td>{{ $row->type_of_acute_HF }}</td>
                        <td>{{ $row->nyha_class }}</td>
                        <td>{{ $row->cardiogenic_shock }}</td>
                        <td>{{ $row->respiratory_failure }}</td>
                        {{-- risk Factor --}}
                        <td>{{ $row->hypertension }}</td>
                        <td>{{ $row->diabetes_or_prediabetes }}</td>
                        <td>{{ $row->dislipidemia }}</td>
                        <td>{{ $row->alcohol }}</td>
                        <td>{{ $row->smoker }}</td>
                        <td>{{ $row->ckd }}</td>
                        <td>{{ $row->valvular_heart_disease }}</td>
                        <td>{{ $row->atrial_fibrillation }}</td>
                        <td>{{ $row->history_of_hf }}</td>
                        <td>{{ $row->history_of_pci_or_cabg }}</td>
                        <td>{{ $row->historyof_heart_valve_surgery }}</td>
                        <td>{{ $row->omi_or_cad }}</td>
                        {{-- Etiology --}}
                        <td>{{ $row->acs }}</td>
                        <td>{{ $row->hypertension_emergency }}</td>
                        <td>{{ $row->arrhytmia }}</td>
                        <td>{{ $row->acute_nechanical_cause }}</td>
                        <td>{{ $row->pulmonary_embolism }}</td>
                        <td>{{ $row->infections }}</td>
                        <td>{{ $row->tamponade }}</td>
                        {{-- Ro Thorax --}}
                        <td>{{ $row->ro_thorax }}</td>
                        {{-- Echocardiography --}}
                        <td>{{ $row->ef }}</td>
                        <td>{{ $row->tapse }}</td>
                        <td>{{ $row->edv }}</td>
                        <td>{{ $row->esv }}</td>
                        <td>{{ $row->edd }}</td>
                        <td>{{ $row->esd }}</td>
                        <td>{{ $row->sign_mr }}</td>
                        <td>{{ $row->diastolic_function }}</td>
                        {{-- Blood Laboratory Test --}}
                        <td>{{ $row->hemoglobin }}</td>
                        <td>{{ $row->hematocrite }}</td>
                        <td>{{ $row->erythrocyte }}</td>
                        <td>{{ $row->random_blood_glucose }}</td>
                        <td>{{ $row->fasting_blood_glucose }}</td>
                        <td>{{ $row->twoHoursPostPrandialBloodGlucose }}</td>
                        <td>{{ $row->natrium }}</td>
                        <td>{{ $row->kalium }}</td>
                        <td>{{ $row->ureum }}</td>
                        <td>{{ $row->bun }}</td>
                        <td>{{ $row->serum_creatinine }}</td>
                        <td>{{ $row->gfr }}</td>
                        <td>{{ $row->uric_acid }}</td>
                        <td>{{ $row->NT_ProBNP_at_admission }}</td>
                        <td>{{ $row->NT_ProBNP_at_discharge }}</td>
                        {{-- Blood Gas Analysis --}}
                        <td>{{ $row->pH }}</td>
                        <td>{{ $row->pco2 }}</td>
                        <td>{{ $row->hco3 }}</td>
                        <td>{{ $row->po2 }}</td>
                        <td>{{ $row->lactate }}</td>
                        <td>{{ $row->be }}</td>
                        {{-- Medication --}}
                        <td>{{ $row->DopaminDose }}</td>
                        <td>{{ $row->DopaminDuration }}</td>
                        <td>{{ $row->DobutaminDose }}</td>
                        <td>{{ $row->DobutaminDuration }}</td>
                        <td>{{ $row->NorepinephrineDose }}</td>
                        <td>{{ $row->NorepinephrineDuration }}</td>
                        <td>{{ $row->EpinephrinDose }}</td>
                        <td>{{ $row->EpinephrinDuration }}</td>
                        <td>{{ $row->acei }}</td>
                        <td>{{ $row->aceiDoseatAdmission }}</td>
                        <td>{{ $row->aceiDoseatPredischarge }}</td>
                        <td>{{ $row->arb }}</td>
                        <td>{{ $row->arbDoseatAdmission }}</td>
                        <td>{{ $row->arbDoseatPredischarge }}</td>
                        <td>{{ $row->arniDoseatAdmission }}</td>
                        <td>{{ $row->arniDoseatPredischarge }}</td>
                        <td>{{ $row->mraDoseatAdmission }}</td>
                        <td>{{ $row->mraDoseatPredischarge }}</td>
                        <td>{{ $row->BetaBlocker }}</td>
                        <td>{{ $row->BetaBlockerDoseatAdmission }}</td>
                        <td>{{ $row->BetaBlockerDoseatPredischarge }}</td>
                        <td>{{ $row->LoopDiureticDoseatAdmission }}</td>
                        <td>{{ $row->LoopDiureticDoseatPredischarge }}</td>
                        <td>{{ $row->sglt2i }}</td>
                        <td>{{ $row->sglt2iDoseatAdmission }}</td>
                        <td>{{ $row->sglt2iDoseatPredischarge }}</td>
                        <td>{{ $row->ivabradineDoseatAdmission }}</td>
                        <td>{{ $row->ivabradineDoseatPredischarge }}</td>
                        <td>{{ $row->TolvaptanTotalDose }}</td>
                        <td>{{ $row->insulin }}</td>
                        <td>{{ $row->insulinDose }}</td>
                        <td>{{ $row->otherOAD }}</td>
                        {{-- Hospitalization --}}
                        <td>{{ $row->iccu }}</td>
                        <td>{{ $row->ward }}</td>
                        <td>{{ $row->totalLoS }}</td>
                        <td>{{ $row->hospitalizationCost }}</td>
                        {{-- Outcomes --}}
                        <td>{{ $row->inhospitalDeath }}</td>
                        <td>{{ $row->vulnerablePhaseDeath }}</td>
                        <td>{{ $row->vulnerablePhaseRehospitalization }}</td>
                        <td>{{ $row->dateofDeath }}</td>
                        <td>{!! $row->additional_notes !!}</td>
                        <td>{{ $row->rs_id }}</td>
                        {{-- <td>{{ $row->deleted_at }}</td> --}}
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