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

{!! Form::model($adhfetiology, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.adhfetiology.update', $adhfetiology->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$adhfetiology->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Name Category*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$adhfetiology->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('acs', 'ACS*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('acs', old('acs',$adhfetiology->acs), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hypertension_emergency', 'Hypertension Emergency*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hypertension_emergency', old('hypertension_emergency',$adhfetiology->hypertension_emergency), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arrhytmia', 'Arrhytmia*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arrhytmia', old('arrhytmia',$adhfetiology->arrhytmia), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('acute_nechanical_cause', 'Acute Mechanical Cause*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('acute_nechanical_cause', old('acute_nechanical_cause',$adhfetiology->acute_nechanical_cause), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('pulmonary_embolism', 'Pulmonary Embolism*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('pulmonary_embolism', old('pulmonary_embolism',$adhfetiology->pulmonary_embolism), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('infections', 'Infections*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('infections', old('infections',$adhfetiology->infections), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('tamponade', 'Tamponade*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('tamponade', old('tamponade',$adhfetiology->tamponade), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.adhfetiology.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection