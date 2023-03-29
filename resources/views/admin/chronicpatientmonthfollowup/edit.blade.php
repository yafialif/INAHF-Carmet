@extends('admin.layouts.master')
@section('css')
<style>
     /* divider */
    .divider{
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 100%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
    }
     .col-divider{
        margin: 20px 0px 20px 0px;
    }
    .input-group{
        width: 100%;
        padding-bottom: 20px;
    }
    h4{
        font-weight: 600;
    }
    input:focus,
    button:focus,
    .form-control:focus {
        outline: none;
        box-shadow: none;
    }

    .form-control:disabled,
    .form-control[readonly] {
        background-color: #fff;
    }

    /*----------step-wizard------------*/
    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .align-items-center {
        align-items: center;
    }

    /*---------signup-step-------------*/
    .bg-color {
        background-color: #333;
    }

    .signup-step-container {
        padding: 50px 0px;
        padding-bottom: 60px;
    }




    .wizard .nav-tabs {
        position: relative;
        margin-bottom: 0;
        border-bottom-color: transparent;
    }

    .wizard>div.wizard-inner {
        position: relative;
    }

    .connecting-line {
        height: 2px;
        background: #e0e0e0;
        position: absolute;
        width: 100%;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: 50%;
        z-index: 1;
    }

    .wizard .nav-tabs>li.active>a,
    .wizard .nav-tabs>li.active>a:hover,
    .wizard .nav-tabs>li.active>a:focus {
        color: #555555;
        cursor: default;
        border: 0;
        border-bottom-color: transparent;
    }

    span.round-tab {
        width: 30px;
        height: 30px;
        line-height: 30px;
        display: inline-block;
        border-radius: 50%;
        background: #fff;
        z-index: 2;
        position: absolute;
        left: 0;
        text-align: center;
        font-size: 16px;
        color: #0e214b;
        font-weight: 500;
        border: 1px solid #ddd;
    }

    span.round-tab i {
        color: #555555;
    }

    .font-weight-bold {
        font-weight: 600;
        color: rgb(65, 65, 65);
    }

    .wizard li.active span.round-tab {
        background: #0db02b;
        color: #fff;
        border-color: #0db02b;
    }

    .wizard li.active span.round-tab i {
        color: #5bc0de;
    }

    .wizard .nav-tabs>li.active>a i {
        color: #0db02b;
    }

    .wizard .nav-tabs>li {
        width: 100%;
    }

    .wizard li:after {
        content: " ";
        position: absolute;
        left: 46%;
        opacity: 0;
        margin: 0 auto;
        bottom: 0px;
        border: 5px solid transparent;
        border-bottom-color: red;
        transition: 0.1s ease-in-out;
    }



    .wizard .nav-tabs>li a {
        width: 30px;
        height: 30px;
        margin: 20px auto;
        border-radius: 100%;
        padding: 0;
        background-color: transparent;
        position: relative;
        top: 0;
    }

    .wizard .nav-tabs>li a i {
        position: absolute;
        top: -35px;
        font-style: normal;
        font-weight: 400;
        /* white-space: nowrap; */
        text-align: center;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 12px;
        font-weight: 700;
        color: #000;
    }

    .wizard .nav-tabs>li a:hover {
        background: transparent;
    }

    .wizard .tab-pane {
        position: relative;
        padding-top: 20px;
    }


    .wizard h3 {
        margin-top: 0;
    }

    .prev-step,
    .next-step {
        font-size: 13px;
        padding: 8px 24px;
        border: none;
        border-radius: 4px;
        margin-top: 30px;
        color: #fff;
    }

    .next-step {
        background-color: #0db02b;
    }

    .skip-btn {
        background-color: #cec12d;
    }

    .step-head {
        font-size: 20px;
        text-align: center;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .term-check {
        font-size: 14px;
        font-weight: 400;
    }

    .custom-file {
        position: relative;
        display: inline-block;
        width: 100%;
        height: 40px;
        margin-bottom: 0;
    }

    .custom-file-input {
        position: relative;
        z-index: 2;
        width: 100%;
        height: 40px;
        margin: 0;
        opacity: 0;
    }

    .custom-file-label {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1;
        height: 40px;
        padding: .375rem .75rem;
        font-weight: 400;
        line-height: 2;
        color: #495057;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: .25rem;
    }

    .custom-file-label::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 3;
        display: block;
        height: 38px;
        padding: .375rem .75rem;
        line-height: 2;
        color: #495057;
        content: "Browse";
        background-color: #e9ecef;
        border-left: inherit;
        border-radius: 0 .25rem .25rem 0;
    }

    .footer-link {
        margin-top: 30px;
    }

    .all-info-container {}

    .list-content {
        margin-bottom: 10px;
    }

    .list-content a {
        padding: 10px 15px;
        width: 100%;
        display: inline-block;
        background-color: #f5f5f5;
        position: relative;
        color: #565656;
        font-weight: 400;
        border-radius: 4px;
    }

    .list-content a[aria-expanded="true"] i {
        transform: rotate(180deg);
    }

    .list-content a i {
        text-align: right;
        position: absolute;
        top: 15px;
        right: 10px;
        transition: 0.5s;
    }

    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        background-color: #fdfdfd;
    }

    .list-box {
        padding: 10px;
    }

    .signup-logo-header .logo_area {
        width: 200px;
    }

    .signup-logo-header .nav>li {
        padding: 0;
    }

    .signup-logo-header .header-flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /*-----------custom-checkbox-----------*/
    /*----------Custom-Checkbox---------*/

    input[type="checkbox"] {
        position: relative;
        display: inline-block;
        margin-right: 5px;
    }

    input[type="checkbox"]::before,
    input[type="checkbox"]::after {
        position: absolute;
        content: "";
        display: inline-block;
    }

    input[type="checkbox"]::before {
        height: 16px;
        width: 16px;
        border: 1px solid #999;
        left: 0px;
        top: 0px;
        background-color: #fff;
        border-radius: 2px;
    }

    input[type="checkbox"]::after {
        height: 5px;
        width: 9px;
        left: 4px;
        top: 4px;
    }

    input[type="checkbox"]:checked::after {
        content: "";
        border-left: 1px solid #fff;
        border-bottom: 1px solid #fff;
        transform: rotate(-45deg);
    }

    input[type="checkbox"]:checked::before {
        background-color: #18ba60;
        border-color: #18ba60;
    }






    @media (max-width: 767px) {
        .sign-content h3 {
            font-size: 40px;
        }

        .wizard .nav-tabs>li a i {
            display: none;
        }

        .signup-logo-header .navbar-toggle {
            margin: 0;
            margin-top: 8px;
        }

        .signup-logo-header .logo_area {
            margin-top: 0;
        }

        .signup-logo-header .header-flex {
            display: block;
        }
    }

</style>

@endsection
@section('pagetitle')
I-TREAT HF &#40 Indonesian Trial and Study About Heart Failure &#41 Chronic Project
@endsection
@section('content')
<div id="savelocal" class="alert alert-info" role="alert">
    save the form data locally <a onclick="savelocal()" class="alert-link">Save</a>
</div>
<div id="getlocal" class="alert alert-success" role="alert">
    Retrive data form <a onclick="retrivedata()" class="alert-link">Retrive</a> or <a onclick="removelocal()"
        class="alert-link text-danger">Remove Local Storage</a>
</div>
<div id="internet_lost" class="alert alert-danger display" role="alert">
    Your internet connection is lost, data is automatically stored locally, click save again to update data on local
    storage.
</div>
<div id="notification" class="alert alert-success" role="alert">
</div>

<section class="signup-step-container">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab"
                                    aria-expanded="true"><span class="round-tab">1 </span> <i>Month Followup</i></a>
                            </li>
                        </ul>
                    </div>
                    {!! Form::open(array('route' => array('admin.chronicpatientmonthfollowup.update', $chronicpatientmonthfollowup->id) , 'id' => 'dataForm', 'class' => 'form-horizontal', 'method' => 'PATCH' )) !!}
                    
                        <div class="tab-content" id="main_form">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h4 class="text-center">Month Followup</h4>
                                <div class="col-md-6">
                                        <label>Name of patient</label>
                                    <div class="input-group">
                                        {{-- <input class="form-control" value="{{ $chronicpatientmonthfollowup->patient_id }}"  type="number" readonly name="sbp" placeholder="" > --}}
                                                {!! Form::select('patient_id', $patient, old('id'), array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                        <label>Month Follow Up</label>
                                    <div class="input-group">
                                                {!! Form::select('monthfollowup_id', $monthfollowup, old('monthfollowup_id'), array('class'=>'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Peripheral Oedema</label>
                                    <div class="input-group">
                                        <select class="form-control" name="peripheralOedema">
                                            <option {{ $chronicpatientmonthfollowup->peripheralOedema == 'Yes' ? 'selected' : ''}} value="Yes">Yes</option>
                                            <option {{ $chronicpatientmonthfollowup->peripheralOedema == 'No' ? 'selected' : ''}} value="No">No</option>
                                        </select>
                                      
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>NYHA Class *</label>
                                        <div class="input-group">
                                        <select class="form-control" name="nyhaClass" required>
                                                <option {{ $chronicpatientmonthfollowup->nyhaClass == 'Class I' ? 'selected' : ''}} value="Class I">Class I</option>
                                                <option {{ $chronicpatientmonthfollowup->nyhaClass == 'Class II' ? 'selected' : ''}} value="Class II">Class II</option>
                                                <option {{ $chronicpatientmonthfollowup->nyhaClass == 'Class III' ? 'selected' : ''}} value="Class III">Class III</option>
                                                <option {{ $chronicpatientmonthfollowup->nyhaClass == 'Class IV' ? 'selected' : ''}} value="Class IV">Class IV</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Systolic Blood Pressure *</label>
                                    <div class="input-group">
                                            <input value="{{$chronicpatientmonthfollowup->sbp}}" id="sbp" class="form-control" type="text" name="sbp" placeholder="" required>
                                        <span class="input-group-addon">.mmHg</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Diastolic Blood Pressure *</label>
                                    <div class="input-group">
                                            <input id="dbp" value="{{$chronicpatientmonthfollowup->dbp}}" class="form-control" type="text" name="dbp" placeholder="" required>
                                        <span class="input-group-addon">.mmHg</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Heart Rate *</label>
                                    <div class="input-group">
                                            <input id="hr" value="{{$chronicpatientmonthfollowup->hr}}" class="form-control" type="text" name="hr" placeholder="" required>
                                        <span class="input-group-addon">.bpm</span>
                                        </div>
                                </div>
                                <div class="col-md-12 col-divider">
                                    <div class="divider"></div>
                                </div>
                                <div class="col-md-6">
                                        <label>Is there echo evaluation during the last 6 month? </label>
                                    <div class="input-group">
                                        <select onchange="IfechoEvaluation()" class="form-control" name="echoEvaluation">
                                            <option {{ $chronicpatientmonthfollowup->echoEvaluation == 'Yes' ? 'selected' : ''}} value="Yes">Yes</option>
                                            <option {{ $chronicpatientmonthfollowup->echoEvaluation == 'No' ? 'selected' : ''}} value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                 <div id="echoEf" class="col-md-6">
                                        <label>Echo LVEF</label>
                                    <div class="input-group">
                                            <input value="{{$chronicpatientmonthfollowup->echoEf}}" class="form-control" type="text" name="echoEf" placeholder="" >
                                        <span class="input-group-addon">%</span>
                                        </div>
                                </div>
                                <div id="echoTapse" class="col-md-6">
                                        <label>Echo TAPSE</label>
                                    <div class="input-group">
                                            <input value="{{$chronicpatientmonthfollowup->echoTapse}}" class="form-control" type="text" name="echoTapse" placeholder="" >
                                        <span class="input-group-addon">.mm</span>
                                        </div>
                                </div>
                                <div id="echoEdv" class="col-md-6">
                                        <label>Echo EDV</label>
                                    <div class="input-group">
                                            <input value="{{$chronicpatientmonthfollowup->echoEdv}}" class="form-control" type="text" name="echoEdv" placeholder="" >
                                        <span class="input-group-addon">.ml</span>
                                        </div>
                                </div>
                                <div id="echoEsv" class="col-md-6">
                                        <label>Echo ESV</label>
                                    <div class="input-group">
                                            <input value="{{$chronicpatientmonthfollowup->echoEsv}}" class="form-control" type="text" name="echoEsv" placeholder="" >
                                        <span class="input-group-addon">.ml</span>
                                        </div>
                                </div>
                                <div id="lvMaxIndex" class="col-md-6">
                                        <label>LV Mass Index</label>
                                    <div class="input-group">
                                            <input value="{{$chronicpatientmonthfollowup->lvMaxIndex}}" class="form-control" type="text" name="lvMaxIndex" placeholder="" >
                                        <span class="input-group-addon">.gr/m<sup>2</sup></span>
                                        </div>
                                </div>
                                <div id="ee" class="col-md-6">
                                        <label>E/e' average</label>
                                    <div class="input-group">
                                            <input value="{{$chronicpatientmonthfollowup->ee}}" class="form-control" type="text" name="ee" placeholder="" >
                                        </div>
                                </div>
                                 <div id="signMr" class="col-md-6">
                                        <label>Echo Sign.MR</label>
                                        <div class="input-group">
                                        <select class="form-control" name="echoSignMr">
                                                <option {{ $chronicpatientmonthfollowup->echoSignMr == 'No' ? 'selected' : ''}} value="No">No</option>
                                                <option {{ $chronicpatientmonthfollowup->echoSignMr == 'Mild' ? 'selected' : ''}} value="Mild">Mild</option>
                                                <option {{ $chronicpatientmonthfollowup->echoSignMr == 'Moderate' ? 'selected' : ''}} value="Moderate">Moderate</option>
                                                <option {{ $chronicpatientmonthfollowup->echoSignMr == 'Severe' ? 'selected' : ''}} value="Severe">Severe</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-divider">
                                    <div class="divider"></div>
                                </div>
                                 <div class="col-md-6">
                                        <label>ACEi</label>
                                        <div class="input-group">
                                        <select class="form-control" name="acei">
                                                <option {{ $chronicpatientmonthfollowup->acei == 'No' ? 'selected' : ''}} value="No">No</option>
                                                <option {{ $chronicpatientmonthfollowup->acei == 'Ramipril' ? 'selected' : ''}} value="Ramipril">Ramipril</option>
                                                <option {{ $chronicpatientmonthfollowup->acei == 'Captopril' ? 'selected' : ''}} value="Captopril">Captopril</option>
                                                <option {{ $chronicpatientmonthfollowup->acei == 'Lisinopril' ? 'selected' : ''}} value="Lisinopril">Lisinopril</option>
                                                <option {{ $chronicpatientmonthfollowup->acei == 'Perindopril' ? 'selected' : ''}} value="Perindopril">Perindopril</option>
                                                <option {{ $chronicpatientmonthfollowup->acei == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ACEi Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->aceiDose }}" id="aceiDose" class="form-control" type="text" name="aceiDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ACEi Intolerance</label>
                                        <div class="input-group">
                                        <select class="form-control" name="aceiIntolerance">
                                                <option {{ $chronicpatientmonthfollowup->aceiIntolerance == 'None' ? 'selected' : ''}} value="None">None</option>
                                                <option {{ $chronicpatientmonthfollowup->aceiIntolerance == 'dry cough' ? 'selected' : ''}} value="dry cough">dry cough</option>
                                                <option {{ $chronicpatientmonthfollowup->aceiIntolerance == 'angioedema' ? 'selected' : ''}} value="angioedema">angioedema</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ARNI Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->arniDose }}" id="arniDose" class="form-control" type="text" name="arniDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ARB</label>
                                        <div class="input-group">
                                        <select class="form-control" name="arb">
                                                <option {{ $chronicpatientmonthfollowup->arb == 'None' ? 'selected' : ''}} value="None">None</option>
                                                <option {{ $chronicpatientmonthfollowup->arb == 'Candesartan' ? 'selected' : ''}} value="Candesartan">Candesartan</option>
                                                <option {{ $chronicpatientmonthfollowup->arb == 'Valsartan' ? 'selected' : ''}} value="Valsartan">Valsartan</option>
                                                <option {{ $chronicpatientmonthfollowup->arb == 'Losartan' ? 'selected' : ''}} value="Losartan">Losartan</option>
                                                <option {{ $chronicpatientmonthfollowup->arb == 'Other' ? 'selected' : ''}} value="Other">Other</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ARB Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->arbDose }}" id="arbDose" class="form-control" type="text" name="arbDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>MRA Intolerance</label>
                                        <div class="input-group">
                                        <select class="form-control" name="mraIntolerance">
                                                <option {{ $chronicpatientmonthfollowup->mraIntolerance == 'None' ? 'selected' : ''}} value="None">None</option>
                                                <option {{ $chronicpatientmonthfollowup->mraIntolerance == 'ginecomastia' ? 'selected' : ''}} value="ginecomastia">ginecomastia</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>MRA Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->mraDose }}" id="mraDose" class="form-control" type="text" name="mraDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                 <div class="col-md-6">
                                        <label>SGLT2i</label>
                                    <div class="input-group">
                                        <select class="form-control" name="sglt2i" >
                                                <option {{ $chronicpatientmonthfollowup->sglt2i == 'None' ? 'selected' : ''}} value="None">None</option>
                                                <option {{ $chronicpatientmonthfollowup->sglt2i == 'Empagliflozin' ? 'selected' : ''}} value="Empagliflozin">Empagliflozin</option>
                                                <option {{ $chronicpatientmonthfollowup->sglt2i == 'Dapagliflozin' ? 'selected' : ''}} value="Dapagliflozin">Dapagliflozin</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                        <label>SGLT2i Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->sglt2iDose }}" id="sglt2iDose" class="form-control" type="text" name="sglt2iDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Beta Blocker</label>
                                        <div class="input-group">
                                        <select class="form-control" name="betaBlocker">
                                                <option {{ $chronicpatientmonthfollowup->betaBlocker == 'None' ? 'selected' : ''}} value="None">None</option>
                                                <option {{ $chronicpatientmonthfollowup->betaBlocker == 'Bisoprolol' ? 'selected' : ''}} value="Bisoprolol">Bisoprolol</option>
                                                <option {{ $chronicpatientmonthfollowup->betaBlocker == 'Carvedilol' ? 'selected' : ''}} value="Carvedilol">Carvedilol</option>
                                                <option {{ $chronicpatientmonthfollowup->betaBlocker == 'Nebivolol' ? 'selected' : ''}} value="Nebivolol">Nebivolol</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Beta Blocker Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->betaBlockerDose }}" id="betaBlockerDose" class="form-control" type="text" name="betaBlockerDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Beta Blocker Intolerance</label>
                                        <div class="input-group">
                                        <select class="form-control" name="betaBlockerIntolerance">
                                                <option {{ $chronicpatientmonthfollowup->betaBlockerIntolerance == 'None' ? 'selected' : ''}} value="None">None</option>
                                                <option {{ $chronicpatientmonthfollowup->betaBlockerIntolerance == 'Bradycardia' ? 'selected' : ''}} value="Bradycardia">Bradycardia</option>
                                                <option {{ $chronicpatientmonthfollowup->betaBlockerIntolerance == 'Hypotension' ? 'selected' : ''}} value="Hypotension">Hypotension</option>
                                                <option {{ $chronicpatientmonthfollowup->betaBlockerIntolerance == 'AV Block' ? 'selected' : ''}} value="AV Block">AV Block</option>
                                                <option {{ $chronicpatientmonthfollowup->betaBlockerIntolerance == 'ventricular dysfunction' ? 'selected' : ''}} value="ventricular dysfunction">ventricular dysfunction</option>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Ivabradine Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->ivabradineDose }}" id="ivabradineDose" class="form-control" type="text" name="ivabradineDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Devices</label>
                                    <div class="input-group">
                                        {{-- <input class="form-control" type="number" name="otherOAD" placeholder="">
                                        <span class="input-group-addon">mg/day</span> --}}
                                        <select class="form-control" name="devices" >
                                                <option {{ $chronicpatientmonthfollowup->devices == 'PPM' ? 'selected' : ''}} value="PPM">PPM</option>
                                                <option {{ $chronicpatientmonthfollowup->devices == 'ICD' ? 'selected' : ''}} value="ICD">ICD</option>
                                                <option {{ $chronicpatientmonthfollowup->devices == 'CRTP' ? 'selected' : ''}} value="CRTP">CRTP</option>
                                                <option {{ $chronicpatientmonthfollowup->devices == 'CRTD' ? 'selected' : ''}} value="CRTD">CRTD</option>
                                                <option {{ $chronicpatientmonthfollowup->devices == 'CSP' ? 'selected' : ''}} value="CSP">CSP</option>
                                                <option {{ $chronicpatientmonthfollowup->devices == 'None' ? 'selected' : ''}} value="None">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Loop Diuretic Dose</label>
                                    <div class="input-group">
                                            <input value="{{ $chronicpatientmonthfollowup->loopDiureticDose }}" id="loopDiureticDose" class="form-control" type="text" name="loopDiureticDose" placeholder="" >
                                        <span class="input-group-addon">.mg/day</span>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Insulin</label>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->insulin == 'Yes' ? 'checked' : ''}} type="radio" name="insulin" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->insulin == 'No' ? 'checked' : ''}} type="radio" name="insulin" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Statin</label>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->statin == 'Yes' ? 'checked' : ''}} type="radio" name="statin" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->statin == 'No' ? 'checked' : ''}} type="radio" name="statin"
                                                    value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-divider">
                                    <div class="divider"></div>
                                </div>
                                <div class="col-md-6">
                                        <label>Rehospitalization *</label>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->totalRehospitalization == 'Yes' ? 'checked' : ''}} type="radio" name="totalRehospitalization" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->totalRehospitalization == 'No' ? 'checked' : ''}} type="radio" name="totalRehospitalization" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>All cause death *</label>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->allCauseDeath == 'Yes' ? 'checked' : ''}} type="radio" name="allCauseDeath"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->allCauseDeath == 'No' ? 'checked' : ''}} type="radio" name="allCauseDeath" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Cardiac related death *</label>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->cardiacRelatedDeath == 'Yes' ? 'checked' : ''}} type="radio" name="cardiacRelatedDeath"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input {{ $chronicpatientmonthfollowup->cardiacRelatedDeath == 'No' ? 'checked' : ''}} type="radio" name="cardiacRelatedDeath"
                                                    value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Date of death</label>
                                    <div class="input-group">
                                        <input value="{{ $chronicpatientmonthfollowup->dateofDeath }}" class="form-control" type="date" name="dateofDeath" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <label>Additional Notes</label>
                                    <div class="input-group">
                                        <textarea value="{{ $chronicpatientmonthfollowup->additional_notes }}" class="form-control " id="editor2" name="additional_notes" cols="50" rows="10" id="detail"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        {{-- <li><button onclick="finish()" type="submit" class="default-btn next-step">Finish</button></li> --}}
                                        <li><button type="submit" class="default-btn next-step">Finish</button></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            {{-- <input class="btn" type="button" onclick="review_data()" value="Preview Data"> --}}

                        </div>

                        <!-- Modal -->
                        <div class="modal fade in" id="tesModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- header-->
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Preview Data</h4>
                                    </div>
                                    <!--body-->
                                    <div class="modal-body">
                                    </div>
                                    <!--footer-->
                                    <div class="modal-footer">
                                        <input type="button" onclick="closeModal()" class="btn btn-danger"
                                            data-dismiss="modal" value="Tutup">
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('javascript')

<script>
    function finish(){
    document.getElementById("dataForm").submit();

    }
     function IfechoEvaluation(){
        var echoEvaluation = $('[name="echoEvaluation"]').val();
        if(echoEvaluation=="Yes"){
            $("#echoEf").show();
            $("#echoTapse").show();
            $("#echoEdv").show();
            $("#echoEsv").show();
            $("#lvMaxIndex").show();
            $("#ee").show();
            $("#signMr").show();
        }
        else{
             $("#echoEf").hide();
             $("#echoTapse").hide();
             $("#echoEdv").hide();
             $("#echoEsv").hide();
             $("#lvMaxIndex").hide();
             $("#ee").hide();
             $("#signMr").hide();
        }
    }
    var data = localStorage.getItem("chroni_month");
    var internet_status;

    document.addEventListener('DOMContentLoaded', function () {
        if (data) {
            $("#getlocal").show();
        } else {
            $("#getlocal").hide();
        }
        $("#notification").hide();

    }, false);


    function notification(msg) {
        document.getElementById('notification').innerHTML = msg;
        $("#notification").show();
        setTimeout(function () {
            $("#notification").hide();
        }, 4000);
    }

    

    function review_data() {
        var dataForm = new FormData(document.getElementById("dataForm"));
        var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
        var form = document.getElementById('dataForm');
        // var data3 = Object.fromEntries(new FormData(dataForm).entries());
        var form_input = Object.values(Object.fromEntries(dataForm));
        var label = document.getElementsByTagName("form")[1].getElementsByTagName("label");
        var data_html = document.getElementsByClassName("modal-body")[0].innerHTML;
        var i;
        // console.log(form_input);
        for (i = 0; i < form_input.length; i++) {
            // console.log(form_input[parseInt(i)]);

            // if (label[parseInt(i)].childElementCount == 0) {
                if (form_input[parseInt(i)]) {
                    data_html = data_html + '<lable class="font-weight-bold">' + label[parseInt(i)].innerText +
                        '</lable><p>' + form_input[parseInt(i)] + '</p>';
                } else {
                    data_html = data_html + '<lable class="font-weight-bold">' + label[parseInt(i)].innerText +
                        '</lable><p> - </p>';
                }
            // } else {

            // }
        }
        document.getElementsByClassName("modal-body")[0].innerHTML = data_html;

        // console.log(data_html);
        $('#tesModal').modal('show');
    }
    function countAge(){
        // var age = document.getElementById('age').value;
        var datebirth = document.getElementById('datebirth').value;
        var dateadmission = document.getElementById('dateadmission').value;
        var today = new Date(dateadmission);
        var birthday = new Date(datebirth);
        var year = 0;
        if (today.getMonth() < birthday.getMonth()) {
            year = 1;
        } else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
            year = 1;
        }
        var age = today.getFullYear() - birthday.getFullYear() - year;
        if(age < 0){
            age = 0;
        }
        document.getElementById('age').value = age;
    }
    function countGfr(){
        var dataForm = new FormData(document.getElementById("dataForm"));
        var sex = Object.fromEntries(dataForm).gender;
        var age = document.getElementById('age').value;
        var scr = document.getElementById('scr').value;
        var A,B,gfr;
        
        if(sex == 'Male'){
            if (scr<= 0.9){
            A = 0.9;
            B = -0.302
            }
            else if(scr> 0.9){
            A = 0.9;
            B = 1.2;
            }
            console.log(sex);
            gfr = 142*Math.pow((scr/A),B)*Math.pow(0.9938,age);

            document.getElementById('gfr').value=Math.ceil(gfr);
        }
        else if(sex == 'Female'){
            console.log(sex);
            
            if (scr<= 0.7){
            A = 0.7;
            B = -0.241;
            }
            else if(scr> 0.7){
            A = 0.7;
            B = -1.2;
            }
            gfr = 142*Math.pow((scr/A),B)*Math.pow(0.9938,age)*1.012;
            document.getElementById('gfr').value=Math.ceil(gfr);

        }
        console.log(Math.ceil(gfr));
}

function countBmi(){
var dataForm = new FormData(document.getElementById("dataForm"));
var sex = Object.fromEntries(dataForm).gender;

var height = parseInt(document.getElementById('height').value) ;
var weight = parseInt(document.getElementById('weight').value) ;
var imt = parseInt((weight / (height * height) * 10000));
var bmi;
console.log("h"+height);
console.log("w"+weight);
console.log(imt);

if(sex == "Male"){
  switch(true){
    case imt < 18:
      	bmi = 'Skinny';
      	break;
    case imt <25:
        bmi = 'Normal';
      	break;
    case imt<27:
        bmi = 'fat';
      	break;
    case imt>27:
        bmi = 'Obesity';
      	break;
  }
}
else if(sex == "Female"){
  
  switch(true){
    case imt < 17:
      	bmi = 'Skinny';
      	break;
    case imt <23:
        bmi = 'Normal';
      	break;
    case imt<27:
        bmi = 'fat';
      	break;
    case imt>27:
        bmi = 'Obesity';
      	break;
  }
  
}
document.getElementById('bmi').value = bmi+' : '+imt+' Kg/m2';
}
function removelocal() {
        localStorage.removeItem("chroni_month");
        localStorage.removeItem("chroni_month_select");
        $("#getlocal").hide();
        notification('Local storage deleted');

    }

    function retrivedata() {
        var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
        var select = document.getElementsByTagName("form")[1].getElementsByTagName("select");
        let text = localStorage.getItem("chroni_month");
        let obj = text.split(",");
        let text2 = localStorage.getItem("chroni_month_select");
        let text3 = localStorage.getItem("chroni_month_textarea");
        let obj2 = text2.split(",");
        // var i = 0;
        for (i = 1; i < input.length; i++) {
              console.log(parseInt(i));
            var variable = input[parseInt(i)].type;
            if (variable == "radio") {
                if (obj[parseInt(i)] == "true") {
                    input[parseInt(i)].checked = obj[parseInt(i)];
                    console.log(input[parseInt(4)].name + " numb " + 4 + " = " + obj[parseInt(4)]);
                }
            } else {
                input[parseInt(i)].value = obj[parseInt(i)];
            }
        }
        for (i = 0; i < select.length; i++) {
            select[parseInt(i)].value=obj2[parseInt(i)];

        }
        if(text3){
        editor.setData( text3 );
        }
        notification('Data retrived');

    }

    function savelocal() {
        var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
        var select = document.getElementsByTagName("form")[1].getElementsByTagName("select");
        var data = Array();
        var data2 = Array();
        var data3 = editor.getData();
        // var i = 0;
        for (i = 0; i < input.length; i++) {
            //   console.log(input[parseInt(i)].name);
            var variable = input[parseInt(i)].type;
            if (variable == "radio") {
                data.push(input[parseInt(i)].checked);
                console.log(input[parseInt(i)].name + " = " + input[parseInt(i)].checked);
            } else {
                data.push(input[parseInt(i)].value);
            }
        }
        for (i = 0; i < select.length; i++) {
            // select.value = 'Personal Payment';
            data2.push(select[parseInt(i)].value);

        }
        localStorage.setItem("chroni_month", data);
        localStorage.setItem("chroni_month_select", data2);
        localStorage.setItem("chroni_month_textarea", data3);
        $("#getlocal").show();
        notification('data stored locally');

    }

    function closeModal() {
        $('#tesModal').modal('hide');
    }

    function updateConnectionStatus(msg, connected) {
        if (connected) {
            $("#internet_lost").hide();
            console.log(internet_status);
            if (internet_status == 1) {
                internet_status = 0;
                document.getElementById("getlocal").innerHTML =
                    "\n  you are back online, Retrive data form <a onclick=\"retrivedata()\" class=\"alert-link\">Retrive</a> or <a onclick=\"removelocal()\" class=\"alert-link text-danger\">Remove Local Storage</a>"
            }
        } else {
            $("#internet_lost").show();
            savelocal();
            internet_status = 1;
        }
    }



    window.addEventListener('load', function (e) {
        if (navigator.onLine) {
            updateConnectionStatus('Online', true);
        } else {
            updateConnectionStatus('Offline', false);
        }
    }, false);

    window.addEventListener('online', function (e) {
        updateConnectionStatus('Online', true);
    }, false);

    window.addEventListener('offline', function (e) {
        updateConnectionStatus('Offline', false);
    }, false);

</script>
<script>
    // ------------step-wizard-------------
    $(document).ready(function () {
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }
    // get data to array

</script>
<script>
    $(document).ready(function () {
        IfechoEvaluation();
    });

</script>
@stop
