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

{!! Form::model($chronicbloodlaboratorytest, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.chronicbloodlaboratorytest.update', $chronicbloodlaboratorytest->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$chronicbloodlaboratorytest->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Treatment Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$chronicbloodlaboratorytest->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hemoglobin', 'Hemoglobin*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hemoglobin', old('hemoglobin',$chronicbloodlaboratorytest->hemoglobin), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hematocrite', 'Hematocrite*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hematocrite', old('hematocrite',$chronicbloodlaboratorytest->hematocrite), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('erythrocyte', 'Erythrocyte*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('erythrocyte', old('erythrocyte',$chronicbloodlaboratorytest->erythrocyte), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hbA1C', 'HbA1C*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hbA1C', old('hbA1C',$chronicbloodlaboratorytest->hbA1C), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('fastingBloodGlucose', 'Fasting Blood Glucose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('fastingBloodGlucose', old('fastingBloodGlucose',$chronicbloodlaboratorytest->fastingBloodGlucose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('twoHoursPostPrandialBloodGlucose', 'Two Hours Post Prandial Blood Glucose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('twoHoursPostPrandialBloodGlucose', old('twoHoursPostPrandialBloodGlucose',$chronicbloodlaboratorytest->twoHoursPostPrandialBloodGlucose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('natrium', 'Natrium*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('natrium', old('natrium',$chronicbloodlaboratorytest->natrium), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('kalium', 'Kalium*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('kalium', old('kalium',$chronicbloodlaboratorytest->kalium), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ureum', 'Ureum*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ureum', old('ureum',$chronicbloodlaboratorytest->ureum), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('bun', 'BUN*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('bun', old('bun',$chronicbloodlaboratorytest->bun), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('serumCreatinine', 'Serum Creatinine*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('serumCreatinine', old('serumCreatinine',$chronicbloodlaboratorytest->serumCreatinine), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('gfr', 'GFR*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('gfr', old('gfr',$chronicbloodlaboratorytest->gfr), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('nt_ProBnp', 'NT-ProBNP*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('nt_ProBnp', old('nt_ProBnp',$chronicbloodlaboratorytest->nt_ProBnp), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.chronicbloodlaboratorytest.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection