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

{!! Form::model($chronicmedication, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.chronicmedication.update', $chronicmedication->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$chronicmedication->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Treatment Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$chronicmedication->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('acei', 'ACEi*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('acei', old('acei',$chronicmedication->acei), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('aceiDose', 'ACEi Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('aceiDose', old('aceiDose',$chronicmedication->aceiDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('aceiIntolerance', 'ACEi intolerance*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('aceiIntolerance', old('aceiIntolerance',$chronicmedication->aceiIntolerance), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arb', 'ARB*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arb', old('arb',$chronicmedication->arb), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arbDose', 'ARB Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arbDose', old('arbDose',$chronicmedication->arbDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arniDose', 'ARNI Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arniDose', old('arniDose',$chronicmedication->arniDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('betaBlocker', 'Beta Blocker*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('betaBlocker', old('betaBlocker',$chronicmedication->betaBlocker), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('betaBlockerDose', 'Beta Blocker Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('betaBlockerDose', old('betaBlockerDose',$chronicmedication->betaBlockerDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('betaBlockerIntolerance', 'Beta Blocker Intolerance*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('betaBlockerIntolerance', old('betaBlockerIntolerance',$chronicmedication->betaBlockerIntolerance), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('mraDose', 'MRA Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('mraDose', old('mraDose',$chronicmedication->mraDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('mraIntolerance', 'MRA Intolerance*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('mraIntolerance', old('mraIntolerance',$chronicmedication->mraIntolerance), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sglt2i', 'SGLT2i*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sglt2i', old('sglt2i',$chronicmedication->sglt2i), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sglt2iDose', 'SGLT2i Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sglt2iDose', old('sglt2iDose',$chronicmedication->sglt2iDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('loopDiuretic', 'Loop Diuretic*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('loopDiuretic', old('loopDiuretic',$chronicmedication->loopDiuretic), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('loopDiureticDose', 'Loop Diuretic Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('loopDiureticDose', old('loopDiureticDose',$chronicmedication->loopDiureticDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ivabradineDose', 'Ivabradine Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ivabradineDose', old('ivabradineDose',$chronicmedication->ivabradineDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('insulin', 'Insulin*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('insulin', old('insulin',$chronicmedication->insulin), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('devices', 'Devices*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('devices', old('devices',$chronicmedication->devices), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.chronicmedication.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection