@extends('admin.layouts.master')
@section('css')
<style>
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
        width: 9%;
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
@section('content')
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
                                    aria-expanded="true"><span class="round-tab">1 </span> <i>Patient Identity</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab"
                                    aria-expanded="true"><span class="round-tab">2</span> <i>Clinical Profile</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span
                                        class="round-tab">3</span> <i>Risk Factors</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span
                                        class="round-tab">4</span> <i>Etiology</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step5" data-toggle="tab" aria-controls="step4" role="tab"><span
                                        class="round-tab">5</span> <i>Ro thorax</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step6" data-toggle="tab" aria-controls="step5" role="tab"><span
                                        class="round-tab">6</span> <i>Echocardiography</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step7" data-toggle="tab" aria-controls="step6" role="tab"><span
                                        class="round-tab">7</span> <i>Blood Laboratory Test</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step8" data-toggle="tab" aria-controls="step7" role="tab"><span
                                        class="round-tab">8</span> <i>Blood Gas Analysis</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step9" data-toggle="tab" aria-controls="step8" role="tab"><span
                                        class="round-tab">9</span> <i>Medication</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step10" data-toggle="tab" aria-controls="step9" role="tab"><span
                                        class="round-tab">10</span> <i>Hospitalization</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step11" data-toggle="tab" aria-controls="step10" role="tab"><span
                                        class="round-tab">11</span> <i>Outcomes</i></a>
                            </li>
                        </ul>
                    </div>
                        <div class="tab-content" id="main_form">
                            {{-- Patient Identity --}}
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h4 class="text-center">Patient Identity</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK *</label>
                                            <p>{{ $data->nik }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name *</label>
                                            <p>{{ $data->name }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of birth *</label>
                                            <p>{{ $data->dateOfBirth }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Age *</label>
                                            <p>{{ $data->age }} Year old</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sex *</label>
                                            <p>{{ $data->gender }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone *</label>
                                            <p>{{ $data->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of Admission *</label>
                                            <p>{{ $data->dateOfAdmission }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date of discharge *</label>
                                           <p>{{ $data->dateOfDischarge }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Insurance *</label>
                                            <p>{{ $data->insurance }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Education *</label>
                                            <p>{{ $data->education }}</p>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn next-step">Continue to next
                                                step</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Clinical Profile --}}
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <h4 class="text-center">Clinical Profile</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Height *</label>
                                        <p>{{ $data->height }} .Cm</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Weight *</label>
                                        <p>{{ $data->weight }} .Kg</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>BMI </label>
                                        <p>{{ $data->bmi }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Systolic Blood Pressure </label>
                                        <p>{{ $data->sbp }} .mmHg</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diastolic Blood Pressure </label>
                                        <p>{{ $data->dbp }} .mmHg</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Heart Rate </label>
                                        <p>{{ $data->hr }} .bpm</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dyspnoea at rest</label>
                                        <p>{{ $data->dyspnoea_at_rest }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orthopnea</label>
                                        <p>{{ $data->orthopnea }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PND</label>
                                        <p>{{ $data->pnd }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Peripheral Oedema</label>
                                        <p>{{ $data->peripheral_oedema }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pulmonary rales</label>
                                        <p>{{ $data->pulmonary_rales }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>JVP </label>
                                        <p>{{ $data->jvp }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Type of acute HF </label>
                                        <p>{{ $data->type_of_acute_HF }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NYHA Class </label>
                                        <p>{{ $data->nyha_class }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cardiogenic shock</label>
                                        <p>{{ $data->cardiogenic_shock }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Respiratory failure</label>
                                        <p>{{ $data->respiratory_failure }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Risk Factor --}}
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <h4 class="text-center">Risk Factor</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hypertension</label>
                                        <p>{{ $data->hypertension }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diabetes or prediabetes</label>
                                        <p>{{ $data->diabetes_or_prediabetes }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dislipidemia</label>
                                        <p>{{ $data->dislipidemia }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alcohol</label>
                                       <p>{{ $data->alcohol }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Smoker</label>
                                       <p>{{ $data->smoker }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CKD</label>
                                        <p>{{ $data->ckd }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valvular heart disease</label>
                                       <p>{{ $data->valvular_heart_disease }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Atrial fibrillation</label>
                                        <p>{{ $data->atrial_fibrillation }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>History of HF</label>
                                        <p>{{ $data->history_of_hf }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>History of PCI or CABG</label>
                                       <p>{{ $data->history_of_pci_or_cabg }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>History of heart valve surgery</label>
                                        <p>{{ $data->historyof_heart_valve_surgery }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>OMI or CAD</label>
                                        <p>{{ $data->omi_or_cad }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="step4">
                                <h4 class="text-center">Etiologi</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ACS</label>
                                        <p>{{ $data->acs }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hypertension Emergency</label>
                                        <p>{{ $data->hypertension_emergency }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Arrhytmia</label>
                                        <p>{{ $data->arrhytmia }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Acute Mechanical Cause</label>
                                        <p>{{ $data->acute_nechanical_cause }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pulmonary Embolism</label>
                                       <p>{{ $data->pulmonary_embolism }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Infections</label>
                                        <p>{{ $data->infections }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tamponade</label>
                                        <p>{{ $data->tamponade }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Ro thorax --}}
                            <div class="tab-pane" role="tabpanel" id="step5">
                                <h4 class="text-center">Ro thorax</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ro thorax Value</label>
                                        <p>{{ $data->ro_thorax }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Echocardiography --}}
                            <div class="tab-pane" role="tabpanel" id="step6">
                                <h4 class="text-center">Echocardiography</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EF</label>
                                        <p>{{ $data->ef }} %</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TAPSE</label>
                                        <p>{{ $data->tapse }} .mm</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EDV</label>
                                        <p>{{ $data->edv }} .mL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ESV</label>
                                        <p>{{ $data->esv }} .mL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>EDD</label>
                                        <p>{{ $data->edd }} .mm</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ESD</label>
                                        <p>{{ $data->esd }} .mm</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sign.MR</label>
                                        <p>{{ $data->sign_mr }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>E/A</label>
                                        <p>{{ $data->diastolic_function }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Blood Laboratory Test --}}
                            <div class="tab-pane" role="tabpanel" id="step7">
                                <h4 class="text-center">Blood Laboratory Test</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hemoglobin</label>
                                        <p>{{ $data->hemoglobin }} .gr/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hematocrite</label>
                                        <p>{{ $data->hematocrite }} %</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Erythrocyte</label>
                                        <p>{{ $data->erythrocyte }} 10^6/uL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Random Blood Glucose</label>
                                        <p>{{ $data->random_blood_glucose }} gr/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fasting Blood Glucose</label>
                                        <p>{{ $data->fasting_blood_glucose }} gr/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>2 Hours Post Prandial Blood Glucose</label>
                                        <p>{{ $data->twoHoursPostPrandialBloodGlucose }} gr/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Natrium</label>
                                        <p>{{ $data->natrium }} .mEq/L</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kalium</label>
                                        <p>{{ $data->kalium }} .mEq/L</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ureum</label>
                                        <p>{{ $data->ureum }} gr/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>BUN</label>
                                        <p>{{ $data->bun }} gr/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Serum Creatinine (Scr)</label>
                                        <p>{{ $data->serum_creatinine }} mg/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>GFR</label>
                                        <p>{{ $data->gfr }} mL/min/1.73 m2</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Uric Acid</label>
                                        <p>{{ $data->uric_acid }} mg/dL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NT-ProBNP at admission</label>
                                        <p>{{ $data->NT_ProBNP_at_admission }} pg/mL</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NT-ProBNP at discharge</label>
                                        <p>{{ $data->NT_ProBNP_at_discharge }} pg/mL</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Blood Gas Analysis --}}
                            <div class="tab-pane" role="tabpanel" id="step8">
                                <h4 class="text-center">Blood Gas Analysis</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>pH</label>
                                        <p>{{ $data->pH }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PCO2</label>
                                        <p>{{ $data->pco2 }} mmHg</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>HCO3</label>
                                        <p>{{ $data->hco3 }} mEq/L</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PO2</label>
                                        <p>{{ $data->po2 }} mmHg</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Lactate</label>
                                        <p>{{ $data->lactate }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>BE</label>
                                        <p>{{ $data->be }}</p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Medication --}}
                            <div class="tab-pane" role="tabpanel" id="step9">
                                <h4 class="text-center">Medication</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dopamin Dose</label>
                                        <p>{{ $data->DopaminDose }} mcg/kg/jam</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dopamin Duration</label>
                                        <p>{{ $data->DopaminDuration }} day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dobutamin Dose</label>
                                        <p>{{ $data->DobutaminDose }} mcg/kg/jam</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Dobutamin Duration</label>
                                        <p>{{ $data->DobutaminDuration }} day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Norepinephrine Dose</label>
                                        <p>{{ $data->NorepinephrineDose }} mcg/kg/jam</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Norepinephrine Duration</label>
                                        <p>{{ $data->NorepinephrineDuration }} day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Epinephrin Dose</label>
                                        <p>{{ $data->EpinephrinDose }} mcg/kg/jam</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Epinephrin Duration</label>
                                        <p>{{ $data->EpinephrinDuration }} day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ACEi</label>
                                       <p>{{ $data->acei }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ACEi Dose at Admission</label>
                                        <p>{{ $data->aceiDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ACEi Dose at Predischarge</label>
                                       <p>{{ $data->aceiDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ARB</label>
                                        <p>{{ $data->arb }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ARB Dose at Admission</label>
                                        <p>{{ $data->arbDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ARB Dose at Predischarge</label>
                                        <p>{{ $data->arbDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ARNI Dose at Admission</label>
                                        <p>{{ $data->arniDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ARNI Dose at Predischarge</label>
                                        <p>{{ $data->arniDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>MRA Dose at Admission</label>
                                        <p>{{ $data->mraDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>MRA Dose at Predischarge</label>
                                        <p>{{ $data->mraDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Beta Blocker</label>
                                        <p>{{ $data->BetaBlocker }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Beta Blocker Dose at Admission</label>
                                        <p>{{ $data->BetaBlockerDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Beta Blocker Dose at Predischarge</label>
                                        <p>{{ $data->BetaBlockerDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loop Diuretic Dose at Admission</label>
                                        <p>{{ $data->LoopDiureticDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loop Diuretic Dose at Predischarge</label>
                                        <p>{{ $data->LoopDiureticDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SGLT2i</label>
                                        <p>{{ $data->sglt2i }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SGLT2i Dose at Admission</label>
                                        <p>{{ $data->sglt2iDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SGLT2i Dose at Predischarge</label>
                                        <p>{{ $data->sglt2iDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ivabradine Dose at admission</label>
                                        <p>{{ $data->ivabradineDoseatAdmission }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ivabradine Dose at predischarge</label>
                                        <p>{{ $data->ivabradineDoseatPredischarge }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tolvaptan Total Dose </label>
                                        <p>{{ $data->TolvaptanTotalDose }} mg/day</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Insulin</label>
                                        <p>{{ $data->insulin }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Insulin Dose</label>
                                        <p>{{ $data->insulinDose }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Other OAD</label>
                                        <p>{{ $data->otherOAD }}</p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Hospitalization --}}
                            <div class="tab-pane" role="tabpanel" id="step10">
                                <h4 class="text-center">Hospitalization</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ICCU</label>
                                        <p>{{ $data->iccu }} days</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ward</label>
                                        <p>{{ $data->ward }} days</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Length of Stay</label>
                                        <p>{{ $data->totalLoS }} days</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hospitalization cost</label>
                                        <p>Rp. {{ $data->hospitalizationCost }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" class="default-btn next-step skip-btn">Skip</button></li> --}}
                                        <li><button type="button" class="default-btn next-step">Continue</button></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- Outcomes --}}
                            <div class="tab-pane" role="tabpanel" id="step11">
                                <h4 class="text-center">Outcomes</h4>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Inhospital Death</label>
                                        <p>{{ $data->inhospitalDeath }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vulnerable phase death</label>
                                        <p>{{ $data->vulnerablePhaseDeath }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Vulnerable phase rehospitalization</label>
                                       <p>{{ $data->vulnerablePhaseRehospitalization }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date of death</label>
                                        <p>{{ $data->dateofDeath }}</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        {{-- <li><button type="button" onclick="finish()" type="submit" class="default-btn next-step">Finish</button></li> --}}
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
    var data = localStorage.getItem("form_adhf");
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

    function removelocal() {
        localStorage.removeItem("form_adhf");
        $("#getlocal").hide();
        notification('Local storage deleted');

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

    function retrivedata() {
        var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
        let text = localStorage.getItem("form_adhf");
        let obj = text.split(",");
        var i = 0;
        for (i = 0; i < input.length; i++) {
              console.log(input[parseInt(i)].name);
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
        notification('Data retrived');

    }

    function savelocal() {
        var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
        var data = Array();
        var i = 0;
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
        localStorage.setItem("form_adhf", data);
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

    });

</script>
@stop
