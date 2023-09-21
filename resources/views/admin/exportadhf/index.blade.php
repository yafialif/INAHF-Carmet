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
                        <td>categorytreatment</td>
                        <td>name</td>
                        <td>nik</td>
                        <td>phone</td>
                        <td>dateOfBirth</td>
                        <td>age</td>
                        <td>dateOfAdmission</td>
                        <td>dateOfDischarge</td>
                        <td>insurance</td>
                        <td>education</td>
                        <td>gender</td>

                        {{-- Clinical Profile --}}

                        {{-- <td>height</td>
                        <td>weight</td>
                        <td>bmi</td>
                        <td>Heart Rate</td>
                        <td>sbp</td>
                        <td>dbp</td>
                        <td>dyspnoea at rest</td>
                        <td>orthopnea</td>
                        <td>pnd</td>
                        <td>peripheral oedema</td>
                        <td>pulmonary rales</td>
                        <td>jvp</td>
                        <td>NYHA Class</td>
                        <td>type of acute HF</td>
                        <td>respiratory failure</td>
                        <td>cardiogenic shock</td> --}}

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
                        {{-- <td>Precipitating Factors</td> --}}
                        

                        {{-- Echocardiography --}}
                        {{-- <td>ef</td>
                        <td>tapse</td>
                        <td>edv</td>
                        <td>esv</td>
                        <td>sign mr</td>
                        <td>LV max index</td>
                        <td>E/e' average</td> --}}
                        {{-- Blood Laboratory Test --}}
                        {{-- <td>hemoglobin</td>
                        <td>hematocrite</td>
                        <td>random blood glucose</td>
                        <td>HbA1C</td>
                        <td>natrium</td>
                        <td>kalium</td>
                        <td>ureum</td>
                        <td>bun</td>
                        <td>serum creatinine</td>
                        <td>gfr</td>
                        <td>Serum Iron</td>
                        <td>NT-ProBNP</td> --}}
                        {{-- Blood Gas Analysis --}}
                        {{-- <td>pH</td>
                        <td>pco2</td>
                        <td>hco3</td>
                        <td>po2</td>
                        <td>lactate</td>
                        <td>be</td> --}}
                        {{-- Medication --}}
                       
                        {{-- <td>acei</td>
                        <td>aceiDoseatPredischarge</td>
                        <td>arb</td>
                        <td>arbDoseatPredischarge</td>
                        <td>arniDoseatPredischarge</td>
                        <td>mraDoseatPredischarge</td>
                        <td>BetaBlocker</td>
                        <td>BetaBlockerDoseatPredischarge</td>
                        <td>LoopDiureticDoseatPredischarge</td>
                        <td>sglt2i</td>
                        <td>ivabradineDoseatPredischarge</td>
                        <td>Tolvaptan</td>
                        <td>Statin</td>
                        <td>Inotropic</td>
                        <td>Vasoconstrictor</td> --}}
                        {{-- Hospitalization --}}
                        {{-- <td>iccu</td>
                        <td>ward</td>
                        <td>totalLoS</td>
                        <td>hospitalizationCost</td>
                        <td>inhospitalDeath</td>
                        <td>vulnerablePhaseDeath</td>
                        <td>vulnerablePhaseRehospitalization</td>
                        <td>dateofDeath</td>
                        <td>additional notes</td> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patient as $row)
                    <tr>
                        {{-- Patient Identity --}}
                        <td>{{ $row->id }}</td>
                        <td>ADHF Project</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>{{ $row->dateOfBirth }}</td>
                        <td>{{ $row->age }}</td>
                        <td>{{ $row->dateOfAdmission }}</td>
                        <td>{{ $row->dateOfDischarge }}</td>
                        <td>{{ $row->insurance }}</td>
                        <td>{{ $row->education }}</td>
                        <td>{{ $row->gender }}</td>
                        {{-- Clinical Profile --}}
                        {{-- <td>{{ $row->height }}</td>
                        <td>{{ $row->weight }}</td>
                        <td>{{ $row->bmi }}</td>
                        <td>{{ $row->hr }}</td>
                        <td>{{ $row->sbp }}</td>
                        <td>{{ $row->dbp }}</td>
                        <td>{{ $row->dyspnoea_at_rest }}</td>
                        <td>{{ $row->orthopnea }}</td>
                        <td>{{ $row->pnd }}</td>
                        <td>{{ $row->peripheral_oedema }}</td>
                        <td>{{ $row->pulmonary_rales }}</td>
                        <td>{{ $row->jvp }}</td>
                        <td>{{ $row->nyha_class }}</td>
                        <td>{{ $row->type_of_acute_HF }}</td>
                        <td>{{ $row->respiratory_failure }}</td>
                        <td>{{ $row->cardiogenic_shock }}</td> --}}
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
                        {{-- Precipitating Factors --}}
                        {{-- <td>{{ $row->precipitating_factors }}</td> --}}
                        {{-- Echocardiography --}}
                        {{-- <td>{{ $row->ef }}</td>
                        <td>{{ $row->tapse }}</td>
                        <td>{{ $row->edv }}</td>
                        <td>{{ $row->esv }}</td>
                        <td>{{ $row->sign_mr }}</td>
                        <td>{{ $row->lv }}</td>
                        <td>{{ $row->ee }}</td> --}}
                        {{-- Blood Laboratory Test --}}
                        {{-- <td>{{ $row->hemoglobin }}</td>
                        <td>{{ $row->hematocrite }}</td>
                        <td>{{ $row->random_blood_glucose }}</td>
                        <td>{{ $row->hba1c }}</td>
                        <td>{{ $row->natrium }}</td>
                        <td>{{ $row->kalium }}</td>
                        <td>{{ $row->ureum }}</td>
                        <td>{{ $row->bun }}</td>
                        <td>{{ $row->serum_creatinine }}</td>
                        <td>{{ $row->gfr }}</td>
                        <td>{{ $row->serum_iron }}</td>
                        <td>{{ $row->NT_ProBNP }}</td> --}}
                        {{-- Blood Gas Analysis --}}
                        {{-- <td>{{ $row->pH }}</td>
                        <td>{{ $row->pco2 }}</td>
                        <td>{{ $row->hco3 }}</td>
                        <td>{{ $row->po2 }}</td>
                        <td>{{ $row->lactate }}</td>
                        <td>{{ $row->be }}</td> --}}
                        {{-- Medication --}}
                        {{-- <td>{{ $row->acei }}</td>
                        <td>{{ $row->aceiDoseatPredischarge }}</td>
                        <td>{{ $row->arb }}</td>
                        <td>{{ $row->arbDoseatPredischarge }}</td>
                        <td>{{ $row->arniDoseatPredischarge }}</td>
                        <td>{{ $row->mraDoseatPredischarge }}</td>
                        <td>{{ $row->BetaBlocker }}</td>
                        <td>{{ $row->BetaBlockerDoseatPredischarge }}</td>
                        <td>{{ $row->LoopDiureticDoseatPredischarge }}</td>
                        <td>{{ $row->sglt2i }}</td>
                        <td>{{ $row->ivabradineDoseatPredischarge }}</td>
                        <td>{{ $row->Tolvaptan }}</td>
                        <td>{{ $row->statin }}</td>
                        <td>{{ $row->inotropic }}</td>
                        <td>{{ $row->vasoconstrictor }}</td> --}}
                        {{-- Hospitalization --}}
                        {{-- <td>{{ $row->iccu }}</td>
                        <td>{{ $row->ward }}</td>
                        <td>{{ $row->totalLoS }}</td>
                        <td>{{ $row->hospitalizationCost }}</td> --}}
                        {{-- Outcomes --}}
                        {{-- <td>{{ $row->inhospitalDeath }}</td>
                        <td>{{ $row->vulnerablePhaseDeath }}</td>
                        <td>{{ $row->vulnerablePhaseRehospitalization }}</td>
                        <td>{{ $row->dateofDeath }}</td>
                        <td>{!! $row->additional_notes !!}</td> --}}
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