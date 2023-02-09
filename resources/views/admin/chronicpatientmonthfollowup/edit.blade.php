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

{!! Form::model($chronicpatientmonthfollowup, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.chronicpatientmonthfollowup.update', $chronicpatientmonthfollowup->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$chronicpatientmonthfollowup->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Treatment Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$chronicpatientmonthfollowup->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('monthfollowup_id', 'Mount Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('monthfollowup_id', $monthfollowup, old('monthfollowup_id',$chronicpatientmonthfollowup->monthfollowup_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('peripheralOedema', 'Peripheral Oedema*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('peripheralOedema', old('peripheralOedema',$chronicpatientmonthfollowup->peripheralOedema), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('nyhaClass', 'nyhaClass*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('nyhaClass', old('nyhaClass',$chronicpatientmonthfollowup->nyhaClass), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sbp', 'SBP*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sbp', old('sbp',$chronicpatientmonthfollowup->sbp), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('dbp', 'DBP*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('dbp', old('dbp',$chronicpatientmonthfollowup->dbp), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('hr', 'HR*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('hr', old('hr',$chronicpatientmonthfollowup->hr), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('echoEf', 'Echo EF*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('echoEf', old('echoEf',$chronicpatientmonthfollowup->echoEf), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('echoTapse', 'Echo TAPSE*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('echoTapse', old('echoTapse',$chronicpatientmonthfollowup->echoTapse), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('echoEdv', 'Echo EDV*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('echoEdv', old('echoEdv',$chronicpatientmonthfollowup->echoEdv), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('echoEdd', 'Echo Edd*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('echoEdd', old('echoEdd',$chronicpatientmonthfollowup->echoEdd), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('echoEsd', 'Echo ESD*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('echoEsd', old('echoEsd',$chronicpatientmonthfollowup->echoEsd), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('echoSignMr', 'Echo Sign MR*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('echoSignMr', old('echoSignMr',$chronicpatientmonthfollowup->echoSignMr), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('echoDiastolicFunction', 'Echo Diastolic function*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('echoDiastolicFunction', old('echoDiastolicFunction',$chronicpatientmonthfollowup->echoDiastolicFunction), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('acei', 'ACEi*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('acei', old('acei',$chronicpatientmonthfollowup->acei), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('aceiDose', 'ACEi Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('aceiDose', old('aceiDose',$chronicpatientmonthfollowup->aceiDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('aceiIntolerance', 'ACEi Intolerance*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('aceiIntolerance', old('aceiIntolerance',$chronicpatientmonthfollowup->aceiIntolerance), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arb', 'ARB*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arb', old('arb',$chronicpatientmonthfollowup->arb), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arbDose', 'ARB Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arbDose', old('arbDose',$chronicpatientmonthfollowup->arbDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arniDose', 'ARNI Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arniDose', old('arniDose',$chronicpatientmonthfollowup->arniDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('betaBlocker', 'Beta Blocker*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('betaBlocker', old('betaBlocker',$chronicpatientmonthfollowup->betaBlocker), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('betaBlockerDose', 'Beta Blocker Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('betaBlockerDose', old('betaBlockerDose',$chronicpatientmonthfollowup->betaBlockerDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('betaBlockerIntolerance', 'Beta Blocker Intolerance*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('betaBlockerIntolerance', old('betaBlockerIntolerance',$chronicpatientmonthfollowup->betaBlockerIntolerance), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('mraDose', 'MRA Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('mraDose', old('mraDose',$chronicpatientmonthfollowup->mraDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('mraIntolerance', 'mraIntolerance*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('mraIntolerance', old('mraIntolerance',$chronicpatientmonthfollowup->mraIntolerance), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sglt2i', 'SGLT2i*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sglt2i', old('sglt2i',$chronicpatientmonthfollowup->sglt2i), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sglt2iDose', 'SGLT2i Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sglt2iDose', old('sglt2iDose',$chronicpatientmonthfollowup->sglt2iDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('loopDiureticDose', 'Loop Diuretic Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('loopDiureticDose', old('loopDiureticDose',$chronicpatientmonthfollowup->loopDiureticDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ivabradineDose', 'Ivabradine Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ivabradineDose', old('ivabradineDose',$chronicpatientmonthfollowup->ivabradineDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('insulin', 'Insulin*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('insulin', old('insulin',$chronicpatientmonthfollowup->insulin), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.chronicpatientmonthfollowup.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection