@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h1>{{ trans('quickadmin::templates.templates-view_edit-edit') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($adhfbloodlaboratorytest, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.adhfbloodlaboratorytest.update', $adhfbloodlaboratorytest->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$adhfbloodlaboratorytest->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Treatment Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$adhfbloodlaboratorytest->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hemoglobin', 'Hemoglobin*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hemoglobin', old('hemoglobin',$adhfbloodlaboratorytest->hemoglobin), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hematocrite', 'Hematocrite*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hematocrite', old('hematocrite',$adhfbloodlaboratorytest->hematocrite), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('erythrocyte', 'Erythrocyte*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('erythrocyte', old('erythrocyte',$adhfbloodlaboratorytest->erythrocyte), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('random_blood_glucose', 'Random Blood Glucose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('random_blood_glucose', old('random_blood_glucose',$adhfbloodlaboratorytest->random_blood_glucose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('fasting_blood_glucose', 'Fasting Blood Glucose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('fasting_blood_glucose', old('fasting_blood_glucose',$adhfbloodlaboratorytest->fasting_blood_glucose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('twoHoursPostPrandialBloodGlucose', '2 Hours Post Prandial Blood Glucose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('twoHoursPostPrandialBloodGlucose', old('twoHoursPostPrandialBloodGlucose',$adhfbloodlaboratorytest->twoHoursPostPrandialBloodGlucose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('natrium', 'Natrium*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('natrium', old('natrium',$adhfbloodlaboratorytest->natrium), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('kalium', 'Kalium*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('kalium', old('kalium',$adhfbloodlaboratorytest->kalium), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ureum', 'Ureum*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ureum', old('ureum',$adhfbloodlaboratorytest->ureum), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('bun', 'BUN*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('bun', old('bun',$adhfbloodlaboratorytest->bun), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('serum_creatinine', 'Serum Creatinine*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('serum_creatinine', old('serum_creatinine',$adhfbloodlaboratorytest->serum_creatinine), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('gfr', 'GFR*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('gfr', old('gfr',$adhfbloodlaboratorytest->gfr), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('uric_acid', 'Uric Acid*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('uric_acid', old('uric_acid',$adhfbloodlaboratorytest->uric_acid), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('NT_ProBNP_at_admission', 'NT-ProBNP at admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('NT_ProBNP_at_admission', old('NT_ProBNP_at_admission',$adhfbloodlaboratorytest->NT_ProBNP_at_admission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('NT_ProBNP_at_discharge', 'NT-ProBNP at discharge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('NT_ProBNP_at_discharge', old('NT_ProBNP_at_discharge',$adhfbloodlaboratorytest->NT_ProBNP_at_discharge), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.adhfbloodlaboratorytest.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection