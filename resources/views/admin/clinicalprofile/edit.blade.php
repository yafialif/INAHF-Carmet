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

{!! Form::model($clinicalprofile, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.clinicalprofile.update', $clinicalprofile->id))) !!}

<div class="form-group">
    {!! Form::label('user_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('user_id', $user, old('user_id',$clinicalprofile->user_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Category Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$clinicalprofile->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('height', 'Height*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('height', old('height',$clinicalprofile->height), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('weight', 'Weight*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('weight', old('weight',$clinicalprofile->weight), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('bmi', 'BMI*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('bmi', old('bmi',$clinicalprofile->bmi), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sbp', 'SBP*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sbp', old('sbp',$clinicalprofile->sbp), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('dbp', 'DBP*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('dbp', old('dbp',$clinicalprofile->dbp), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hr', 'HR*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hr', old('hr',$clinicalprofile->hr), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('dyspnoea_at_rest', 'Dyspnoea at rest*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('dyspnoea_at_rest', old('dyspnoea_at_rest',$clinicalprofile->dyspnoea_at_rest), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('orthopnea', 'Orthopnea*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('orthopnea', old('orthopnea',$clinicalprofile->orthopnea), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('pnd', 'PND*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('pnd', old('pnd',$clinicalprofile->pnd), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('peripheral_oedema', 'PeripheralOedema*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('peripheral_oedema', old('peripheral_oedema',$clinicalprofile->peripheral_oedema), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('pulmonary_rales', 'Pulmonary rales*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('pulmonary_rales', old('pulmonary_rales',$clinicalprofile->pulmonary_rales), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('jvp', 'JVP*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('jvp', old('jvp',$clinicalprofile->jvp), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('type_of_acute_HF', 'Type of acute HF*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('type_of_acute_HF', old('type_of_acute_HF',$clinicalprofile->type_of_acute_HF), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('nyha_class', 'NYHA Class*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('nyha_class', old('nyha_class',$clinicalprofile->nyha_class), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('cardiogenic_shock', 'Cardiogenic shock*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('cardiogenic_shock', old('cardiogenic_shock',$clinicalprofile->cardiogenic_shock), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('respiratory_failure', 'Respiratory failure*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('respiratory_failure', old('respiratory_failure',$clinicalprofile->respiratory_failure), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.clinicalprofile.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection