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

{!! Form::model($adhfriskfactors, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.adhfriskfactors.update', $adhfriskfactors->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$adhfriskfactors->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Treatment Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$adhfriskfactors->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hypertension', 'Hypertension*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hypertension', old('hypertension',$adhfriskfactors->hypertension), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('diabetes_or_prediabetes', 'Diabetes or prediabetes*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('diabetes_or_prediabetes', old('diabetes_or_prediabetes',$adhfriskfactors->diabetes_or_prediabetes), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('dislipidemia', 'Dislipidemia*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('dislipidemia', old('dislipidemia',$adhfriskfactors->dislipidemia), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('alcohol', 'Alcohol*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('alcohol', old('alcohol',$adhfriskfactors->alcohol), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('smoker', 'Smoker*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('smoker', old('smoker',$adhfriskfactors->smoker), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ckd', 'CKD*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ckd', old('ckd',$adhfriskfactors->ckd), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('valvular_heart_disease', 'Valvular heart disease*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('valvular_heart_disease', old('valvular_heart_disease',$adhfriskfactors->valvular_heart_disease), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('atrial_fibrillation', 'Atrial fibrillation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('atrial_fibrillation', old('atrial_fibrillation',$adhfriskfactors->atrial_fibrillation), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('history_of_hf', 'History of HF*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('history_of_hf', old('history_of_hf',$adhfriskfactors->history_of_hf), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('history_of_pci_or_cabg', 'History of PCI or CABG*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('history_of_pci_or_cabg', old('history_of_pci_or_cabg',$adhfriskfactors->history_of_pci_or_cabg), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('historyof_heart_valve_surgery', 'History of heart valve surgery*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('historyof_heart_valve_surgery', old('historyof_heart_valve_surgery',$adhfriskfactors->historyof_heart_valve_surgery), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('omi_or_cad', 'OMI or CAD*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('omi_or_cad', old('omi_or_cad',$adhfriskfactors->omi_or_cad), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.adhfriskfactors.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection