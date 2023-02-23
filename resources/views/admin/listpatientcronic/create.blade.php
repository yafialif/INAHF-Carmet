@extends('admin.layouts.master')
@section('css')
<style>
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
        width: 12%;
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
I-TREAT HF (Indonesian Trial and Registry About Heart Failure)
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
                                <a href="#step4" data-toggle="tab" aria-controls="step5" role="tab"><span
                                        class="round-tab">4</span> <i>Ro thorax</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step5" data-toggle="tab" aria-controls="step6" role="tab"><span
                                        class="round-tab">5</span> <i>Echocardiography</i></a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#step6" data-toggle="tab" aria-controls="step7" role="tab"><span
                                        class="round-tab">6</span> <i>Blood Laboratory Test</i></a>
                            </li>
                           
                            <li role="presentation" class="">
                                <a href="#step7" data-toggle="tab" aria-controls="step8" role="tab"><span
                                        class="round-tab">7</span> <i>Medication</i></a>
                            </li>
                          
                            <li role="presentation" class="">
                                <a href="#step8" data-toggle="tab" aria-controls="step9" role="tab"><span
                                        class="round-tab">8</span> <i>Outcomes</i></a>
                            </li>
                        </ul>
                    </div>
                    {!! Form::open(array('route' => 'admin.listpatientcronic.store', 'id' => 'dataForm', 'class' => 'form-horizontal', 'method' => 'post')) !!}
                    
                        <div class="tab-content" id="main_form">
                            {{-- Patient Identity --}}
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h4 class="text-center">Patient Identity</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>RS</label>

                                    <div class="input-group">
                                            {!! Form::select('rs_id', $rumahsakit, old('id'), array('class'=>'form-control')) !!}
                                        {{-- <input class="form-control" type="number" name="iccu" placeholder=""> --}}
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>NIK *</label>

                                        <div class="input-group">
                                            <input class="form-control" type="number" name="nik" placeholder="" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Name *</label>

                                        <div class="input-group">
                                            <input class="form-control" type="text" name="name" placeholder="" required>
                                       
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Date of birth *</label>

                                        <div class="input-group">
                                            <input id="datebirth" onchange="countAge()" class="form-control" type="date" name="dateOfBirth" placeholder="" required>
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Date of Admission *</label>

                                        <div class="input-group">
                                            <input id="dateadmission" onchange="countAge()" class="form-control" type="date" name="dateOfAdmission"
                                                placeholder="" required>
                                        
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Age *</label>

                                        <div class="input-group">
                                            <input id="age" class="form-control" type="text" name="age" placeholder="" readonly required>
                                        <span class="input-group-addon">Year old</span>
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Sex *</label>

                                        <div class="input-group">
                                            <div class="radio">
                                                <label><input id="sex" onchange="countBmi()" type="radio" name="gender" value="Male" required>Male</label>
                                            </div>
                                            <div class="radio">
                                                <label><input id="sex" onchange="countBmi()" type="radio" name="gender" value="Female" required>Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Phone *</label>

                                        <div class="input-group">
                                            <input class="form-control" type="number" name="phone"
                                                placeholder="6280000000" required>
                                        
                                            </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                            <label>Date of discharge *</label>

                                        <div class="input-group">
                                            <input class="form-control" type="date" name="dateOfDischarge"
                                                placeholder="">
                                        
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <label>Insurance *</label>
                                        <div class="input-group">
                                            <select class="form-control" name="insurance"  required>
                                                <option value="Government Insurance (BPJS)">Government Insurance (BPJS)</option>
                                                <option value="Private Insurance (Swasta)">Private Insurance (Swasta)</option>
                                                <option value="Personal Payment">Personal Payment</option>
                                            </select>
                                            {{-- <input class="form-control" type="text" name="insurance" placeholder="" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <label>Education *</label>
                                            {{-- <input class="form-control" type="text" name="education" placeholder="" > --}}
                                            <select class="form-control" name="education"required>
                                                <option value="Not going to school/not graduated from elementary school">Not going to school/not graduated from elementary school</option>
                                                <option value="Graduated from elementary school">Graduated from elementary school</option>
                                                <option value="Graduated from Junior High School">Graduated from Junior High School</option>
                                                <option value="Graduated from Senior High School">Graduated from Senior High School</option>
                                                <option value="Bachelor/Magister/Doctor">Bachelor/Magister/Doctor</option>
                                            </select>
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
                                        <label>Height *</label>
                                    <div class="input-group">
                                        <input type="number" id="height" onkeyup="countBmi()" type="number" name="height" class="form-control">
                                        <span class="input-group-addon">.Cm</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Weight *</label>
                                        <div class="input-group">
                                        <input type="number" id="weight" onkeyup="countBmi()" type="number" name="weight" class="form-control" >
                                        <span class="input-group-addon">.Kg</span>
                                        </div>
                                        {{-- <input onkeyup="countBmi()" id="weight" class="form-control" type="number" name="weight" placeholder=""> --}}
                                </div>
                                <div class="col-md-6">
                                        <label>BMI</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="bmi" name="bmi" placeholder="" readonly>
                                        {{-- <span class="input-group-addon">.Kg/m2</span> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Systolic Blood Pressure  </label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="sbp" placeholder="" >
                                        <span class="input-group-addon">.mmHg</span>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Diastolic Blood Pressure</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="dbp" placeholder="" >
                                        <span class="input-group-addon">.mmHg</span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Heart Rate</label>
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="hr" placeholder="" >
                                        <span class="input-group-addon">.bpm</span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Dyspnoea on exertion</label>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="dyspnoeaOnExertion" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="dyspnoeaOnExertion" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Orthopnea</label>
                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="orthopnea" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="orthopnea" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>PND</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="pnd" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="pnd" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Peripheral Oedema</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="peripheralOedema" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="peripheralOedema" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Pulmonary rales</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="pulmonaryRales" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="pulmonaryRales" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Jugular Venous Pressure</label>

                                    <div class="input-group">
                                        
                                        <select class="form-control" name="jvp">
                                                <option value="Normal">Normal</option>
                                                <option value="Increase">Increase</option>
                                            </select>
                                        {{-- <input class="form-control" type="text" name="jvp" placeholder="" > --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>AHA Staging</label>

                                    <div class="input-group">
                                        <select class="form-control" name="ahaStaging">
                                                <option value="Stage A">Stage A</option>
                                                <option value="Stage B">Stage B</option>
                                                <option value="Stage C">Stage C</option>
                                                <option value="Stage D">Stage D</option>
                                            </select>
                                        {{-- <input class="form-control" type="text" name="type_of_acute_HF" placeholder=""> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>NYHA Class </label>

                                    <div class="input-group">
                                        <select class="form-control" name="nyhaClass">
                                                <option value="Class I">Class I</option>
                                                <option value="Class II">Class II</option>
                                                <option value="Class III">Class III</option>
                                                <option value="Class IV">Class IV</option>
                                            </select>
                                        {{-- <input class="form-control" type="text" name="nyha_class" placeholder=""> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Etiology</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="etiology" value="ICM">ICM</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="etiology" value="NICM">NICM</label>
                                        </div>
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
                                        <label>Hypertension</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="hypertension"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="hypertension" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Diabetes or prediabetes</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="diabetesorPrediabetes" value="No">No</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="diabetesorPrediabetes"
                                                    value="Prediabetes">Prediabetes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="diabetesorPrediabetes"
                                                    value="Diabetes">Diabetes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Dislipidemia</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="dislipidemia"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="dislipidemia" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Alcohol</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="alcohol"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="alcohol"
                                                    value="Abstainers">Abstainers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Smoker</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="smoker"
                                                    value="Never smoked">Never smoked</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="smoker"
                                                    value="Former Smoking">Former Smoking</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="smoker"
                                                    value="Current smoking">Current smoking</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>CKD</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="ckd"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="ckd"
                                                    value="No">No</label>
                                        </div>
                                        
                                        {{-- <input class="form-control" type="text" name="ckd" placeholder=""> --}}
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                        <label>Atrial fibrillation</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="atrialFibrillation"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="atrialFibrillation" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Bundle Branch Block</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="bundleBranchBlock"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="bundleBranchBlock" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>History of CAD</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="historyofCad"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="historyofCad" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>History of HF</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="historyofHf"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="historyofHf" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>History of PCI or CABG</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="historyofPciorCabg"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="historyofPciorCabg" value="No">No</label>
                                        </div>
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
                            <div class="tab-pane" role="tabpanel" id="step4">
                                <h4 class="text-center">Ro thorax</h4>
                                <div class="col-md-6">
                                        <label>Ro thorax Value</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="roThorax" value="Normal Cardiac Size">Normal
                                                Cardiac Size</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="roThorax"value="Cardiomegaly">Cardiomegaly</label>
                                        </div>
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
                            <div class="tab-pane" role="tabpanel" id="step5">
                                <h4 class="text-center">Echocardiography</h4>
                                <div class="col-md-6">
                                        <label>EF</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="ef" placeholder="">
                                        <span class="input-group-addon">%</span>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>TAPSE</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="tapse" placeholder="">
                                        <span class="input-group-addon">.mm</span>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>EDV</label>
                                    
                                    <div class="input-group">
                                        <input class="form-control" type="number" name="edv" placeholder="">
                                        <span class="input-group-addon">.mL</span>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ESV</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="esv" placeholder="">
                                        <span class="input-group-addon">.mm</span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>EDD</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="edd" placeholder="">
                                        <span class="input-group-addon">.mL</span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ESD</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="esd" placeholder="">
                                        <span class="input-group-addon">.mm</span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Sign.MR</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="signMr" value="No">No</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="signMr"
                                                    value="Midle MR">Midle MR</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="signMr"
                                                    value="Moderate MR">Moderate MR</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="signMr"
                                                    value="Severe MR">Severe MR</label>
                                        </div>
                                        {{-- <input class="form-control" type="text" name="sign_mr" placeholder=""> --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>E/A</label>

                                    <div class="input-group">
                                        {{-- <select class="form-control" name="diastolicFunction">
                                                <option value="Normal">Normal</option>
                                                <option value="Pseudonormal">Pseudonormal</option>
                                                <option value="Relaxation Disorder">Relaxation Disorder</option>
                                                <option value="Restrictive">Restrictive</option>
                                            </select> --}}
                                        <input class="form-control" type="text" name="diastolicFunction" placeholder="">
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
                            <div class="tab-pane" role="tabpanel" id="step6">
                                <h4 class="text-center">Blood Laboratory Test</h4>
                                <div class="col-md-6">
                                        <label>Hemoglobin</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="hemoglobin" placeholder="">
                                        <span class="input-group-addon">.gr/dL</span>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Hematocrite</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="hematocrite" placeholder="">
                                        <span class="input-group-addon">%</span>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Erythrocyte</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="erythrocyte" placeholder="">
                                        <span class="input-group-addon">.10^6/uL</span>
                                    
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>HbA1C</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="hbA1C" placeholder="">
                                        <span class="input-group-addon">gr/dL</span>
                                    
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                        <label>Fasting Blood Glucose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="fastingBloodGlucose"
                                            placeholder="">
                                        <span class="input-group-addon">gr/dL</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>2 Hours Post Prandial Blood Glucose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number"
                                            name="twoHoursPostPrandialBloodGlucose" placeholder="">
                                        <span class="input-group-addon">gr/dL</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Natrium</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="natrium" placeholder="">
                                        <span class="input-group-addon">.mEq/L</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Kalium</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="kalium" placeholder="">
                                        <span class="input-group-addon">.mEq/L</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Ureum</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="ureum" placeholder="">
                                        <span class="input-group-addon">gr/dL</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>BUN</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="bun" placeholder="">
                                        <span class="input-group-addon">gr/dL</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Serum Creatinine (Scr)</label>

                                    <div class="input-group">
                                        <input onkeyup="countGfr()" id="scr" class="form-control" type="number" name="serumCreatinine"
                                            placeholder="">
                                        <span class="input-group-addon">mg/dL</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>GFR</label>

                                    <div class="input-group">
                                        <input id="gfr" class="form-control" type="number" name="gfr" placeholder="" readonly>
                                        <span class="input-group-addon">mL/min/1.73 m2</span>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                        <label>NT-ProBNP</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="nt_ProBnp"
                                            placeholder="">
                                        <span class="input-group-addon">pg/mL</span>
                                        
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
                            <div class="tab-pane" role="tabpanel" id="step7">
                                <h4 class="text-center">Medication</h4>
                                
                                <div class="col-md-6">
                                        <label>ACEi</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="acei" value="None">None</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="acei" value="Ramipril">Ramipril</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="acei" value="Captopril">Captopril</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="acei" value="Lisinopril">Lisinopril</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="acei"
                                                    value="Perindopril">Perindopril</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ACEi Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="aceiDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ACEi intolerance</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="aceiIntolerance" value="None">None</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="aceiIntolerance" value="dry cough">dry cough</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="aceiIntolerance"
                                                    value="angioedema">angioedema</label>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ARB</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="arb" value="None">None</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="arb" value="Valsartan">Valsartan</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="arb"
                                                    value="Candesartan">Candesartan</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="arb" value="Losartan">Losartan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ARB Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="arbDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>ARNI Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="arniDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                        <label>Beta Blocker</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="betaBlocker" value="None">None</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="betaBlocker"
                                                    value="Bisoprolol">Bisoprolol</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="betaBlocker"
                                                    value="Carvedilol">Carvedilol</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="betaBlocker"
                                                    value="Nebivolol">Nebivolol</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Beta Blocker Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="betaBlockerDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Beta Blocker Intolerance</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="betaBlockerIntolerance"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>MRA Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="mraDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>MRA Intolerance</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="mraIntolerance" value="None">None</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="mraIntolerance"
                                                    value="ginecomastia">ginecomastia</label>
                                        </div>
                                        
                                    </div>
                                </div>
                               <div class="col-md-6">
                                        <label>SGLT2i</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="sglt2i" value="None">None</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="sglt2i"
                                                    value="Empagliflozin">Empagliflozin</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="sglt2i"
                                                    value="Dapagliflozin">Dapagliflozin</label>
                                        </div>
                                        
                                        {{-- <input class="form-control" type="number" name="sglt2i" placeholder=""> --}}
                                    </div>
                                    
                                </div>
                               <div class="col-md-6">
                                        <label>SGLT2i Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="sglt2iDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Loop Diuretic</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="loopDiuretic"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Loop Diuretic Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="loopDiureticDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Ivabradine Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="ivabradineDose"
                                            placeholder="">
                                        <span class="input-group-addon">mg/day</span>

                                    </div>
                                </div>
                                
                               
                                
                                <div class="col-md-6">
                                        <label>Insulin</label>

                                    <div class="input-group">
                                        {{-- <input class="form-control" type="number" name="insulin" placeholder=""> --}}
                                        {{-- <span class="input-group-addon">IU</span> --}}
                                        <div class="radio">
                                            <label><input type="radio" name="insulin" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="insulin"
                                                    value="No">No</label>
                                        </div>
                                        
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                        <label>Insulin Dose</label>

                                    <div class="input-group">
                                        <input class="form-control" type="number" name="insulinDose" placeholder="">
                                        <span class="input-group-addon">IU</span>
                                    
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                        <label>Devices</label>

                                    <div class="input-group">
                                        {{-- <input class="form-control" type="number" name="otherOAD" placeholder="">
                                        <span class="input-group-addon">mg/day</span> --}}
                                        <div class="radio">
                                            <label><input type="radio" name="devices" value="PPM">PPM</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="devices"
                                                    value="ICD">ICD</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="devices"
                                                    value="CRTP">CRTP</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="devices"
                                                    value="CRTD">CRTD</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="devices"
                                                    value="CSP">CSP</label>
                                        </div>

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
                            <div class="tab-pane" role="tabpanel" id="step8">
                                <h4 class="text-center">Outcomes</h4>
                                <div class="col-md-6">
                                        <label>Total Rehospitalization *</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="totalRehospitalization" value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="totalRehospitalization" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>All cause death *</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="allCauseDeath"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="allCauseDeath" value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Cardiac related death *</label>

                                    <div class="input-group">
                                        <div class="radio">
                                            <label><input type="radio" name="cardiacRelatedDeath"
                                                    value="Yes">Yes</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="cardiacRelatedDeath"
                                                    value="No">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <label>Date of death</label>

                                    <div class="input-group">
                                        <input class="form-control" type="date" name="dateofDeath" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <label>Additional Notes</label>
                                    <div class="input-group">
                                        <textarea class="form-control " id="editor" name="additional_notes" cols="50" rows="10" id="detail"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn prev-step">Back</button></li>
                                        <li><button type="button" onclick="finish()" type="submit" class="default-btn next-step">Finish</button></li>
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
    let editor;
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( newEditor => {
                                    editor = newEditor;
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
<script>
    function finish(){
    document.getElementById("dataForm").submit();

    }
    var data = localStorage.getItem("form_chronic");
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
        localStorage.removeItem("form_chronic");
        localStorage.removeItem("form_chronic_select");
        $("#getlocal").hide();
        notification('Local storage deleted');

    }

    function retrivedata() {
        var input = document.getElementsByTagName("form")[1].getElementsByTagName("input");
        var select = document.getElementsByTagName("form")[1].getElementsByTagName("select");
        let text = localStorage.getItem("form_chronic");
        let obj = text.split(",");
        let text2 = localStorage.getItem("form_chronic_select");
        let text3 = localStorage.getItem("form_chronic_textarea");
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
        localStorage.setItem("form_chronic", data);
        localStorage.setItem("form_chronic_select", data2);
        localStorage.setItem("form_chronic_textarea", data3);
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
