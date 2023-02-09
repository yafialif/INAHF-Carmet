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

{!! Form::model($cronicriskfactors, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.cronicriskfactors.update', $cronicriskfactors->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$cronicriskfactors->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Treatment Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$cronicriskfactors->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hypertension', 'Hypertension*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hypertension', old('hypertension',$cronicriskfactors->hypertension), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('diabetesorPrediabetes', 'Diabetes or prediabetes*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('diabetesorPrediabetes', old('diabetesorPrediabetes',$cronicriskfactors->diabetesorPrediabetes), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('dislipidemia', 'Dislipidemia*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('dislipidemia', old('dislipidemia',$cronicriskfactors->dislipidemia), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('alcohol', 'Alcohol*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('alcohol', old('alcohol',$cronicriskfactors->alcohol), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('smoker', 'Smoker*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('smoker', old('smoker',$cronicriskfactors->smoker), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ckd', 'CKD*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ckd', old('ckd',$cronicriskfactors->ckd), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('atrialFibrillation', 'Atrial Fibrillation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('atrialFibrillation', old('atrialFibrillation',$cronicriskfactors->atrialFibrillation), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('bundleBranchBlock', 'Bundle Branch Block*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('bundleBranchBlock', old('bundleBranchBlock',$cronicriskfactors->bundleBranchBlock), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('historyofCad', 'History of CAD*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('historyofCad', old('historyofCad',$cronicriskfactors->historyofCad), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('historyofHf', 'History of HF*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('historyofHf', old('historyofHf',$cronicriskfactors->historyofHf), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('historyofPciorCabg', 'History of PCI or CABG*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('historyofPciorCabg', old('historyofPciorCabg',$cronicriskfactors->historyofPciorCabg), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.cronicriskfactors.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection