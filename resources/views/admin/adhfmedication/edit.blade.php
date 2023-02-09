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

{!! Form::model($adhfmedication, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array(config('quickadmin.route').'.adhfmedication.update', $adhfmedication->id))) !!}

<div class="form-group">
    {!! Form::label('patient_id', 'Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('patient_id', $patient, old('patient_id',$adhfmedication->patient_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('categorytreatment_id', 'Treatment Name*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categorytreatment_id', $categorytreatment, old('categorytreatment_id',$adhfmedication->categorytreatment_id), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('DopaminDose', 'Dopamin Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('DopaminDose', old('DopaminDose',$adhfmedication->DopaminDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('DopaminDuration', 'Dopamin Duration*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('DopaminDuration', old('DopaminDuration',$adhfmedication->DopaminDuration), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('DobutaminDose', 'Dobutamin Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('DobutaminDose', old('DobutaminDose',$adhfmedication->DobutaminDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('DobutaminDuration', 'Dobutamin Duration*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('DobutaminDuration', old('DobutaminDuration',$adhfmedication->DobutaminDuration), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('NorepinephrineDose', 'Norepinephrine Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('NorepinephrineDose', old('NorepinephrineDose',$adhfmedication->NorepinephrineDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('NorepinephrineDuration', 'Norepinephrine Duration*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('NorepinephrineDuration', old('NorepinephrineDuration',$adhfmedication->NorepinephrineDuration), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('EpinephrinDose', 'Epinephrin Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('EpinephrinDose', old('EpinephrinDose',$adhfmedication->EpinephrinDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('EpinephrinDuration', 'Epinephrin Duration*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('EpinephrinDuration', old('EpinephrinDuration',$adhfmedication->EpinephrinDuration), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('acei', 'ACEi*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('acei', old('acei',$adhfmedication->acei), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('aceiDoseatAdmission', 'ACEi Dose at Admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('aceiDoseatAdmission', old('aceiDoseatAdmission',$adhfmedication->aceiDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('aceiDoseatPredischarge', 'ACEi Dose at Predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('aceiDoseatPredischarge', old('aceiDoseatPredischarge',$adhfmedication->aceiDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arb', 'ARB*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arb', old('arb',$adhfmedication->arb), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arbDoseatAdmission', 'ARB Dose at Admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arbDoseatAdmission', old('arbDoseatAdmission',$adhfmedication->arbDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arbDoseatPredischarge', 'ARB Dose at Predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arbDoseatPredischarge', old('arbDoseatPredischarge',$adhfmedication->arbDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arniDoseatAdmission', 'ARNI Dose at Admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arniDoseatAdmission', old('arniDoseatAdmission',$adhfmedication->arniDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('arniDoseatPredischarge', 'ARNI Dose at Predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('arniDoseatPredischarge', old('arniDoseatPredischarge',$adhfmedication->arniDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('mraDoseatAdmission', 'MRA Dose at Admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('mraDoseatAdmission', old('mraDoseatAdmission',$adhfmedication->mraDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('mraDoseatPredischarge', 'MRA Dose at Predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('mraDoseatPredischarge', old('mraDoseatPredischarge',$adhfmedication->mraDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('BetaBlocker', 'Beta Blocker*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('BetaBlocker', old('BetaBlocker',$adhfmedication->BetaBlocker), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('BetaBlockerDoseatAdmission', 'Beta Blocker Dose at Admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('BetaBlockerDoseatAdmission', old('BetaBlockerDoseatAdmission',$adhfmedication->BetaBlockerDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('BetaBlockerDoseatPredischarge', 'Beta Blocker Dose at Predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('BetaBlockerDoseatPredischarge', old('BetaBlockerDoseatPredischarge',$adhfmedication->BetaBlockerDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('LoopDiureticDoseatAdmission', 'Loop Diuretic Dose at Admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('LoopDiureticDoseatAdmission', old('LoopDiureticDoseatAdmission',$adhfmedication->LoopDiureticDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('LoopDiureticDoseatPredischarge', 'Loop Diuretic Dose at Predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('LoopDiureticDoseatPredischarge', old('LoopDiureticDoseatPredischarge',$adhfmedication->LoopDiureticDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sglt2i', 'SGLT2i*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sglt2i', old('sglt2i',$adhfmedication->sglt2i), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sglt2iDoseatAdmission', 'SGLT2i Dose at Admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sglt2iDoseatAdmission', old('sglt2iDoseatAdmission',$adhfmedication->sglt2iDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('sglt2iDoseatPredischarge', 'SGLT2i Dose at Predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('sglt2iDoseatPredischarge', old('sglt2iDoseatPredischarge',$adhfmedication->sglt2iDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ivabradineDoseatAdmission', 'Ivabradine Dose at admission*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ivabradineDoseatAdmission', old('ivabradineDoseatAdmission',$adhfmedication->ivabradineDoseatAdmission), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('ivabradineDoseatPredischarge', 'Ivabradine Dose at predischarge*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('ivabradineDoseatPredischarge', old('ivabradineDoseatPredischarge',$adhfmedication->ivabradineDoseatPredischarge), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('TolvaptanTotalDose', 'Tolvaptan Total Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('TolvaptanTotalDose', old('TolvaptanTotalDose',$adhfmedication->TolvaptanTotalDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('insulin', 'Insulin*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('insulin', old('insulin',$adhfmedication->insulin), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('insulinDose', 'Insulin Dose*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('insulinDose', old('insulinDose',$adhfmedication->insulinDose), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('otherOAD', 'Other OAD*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('otherOAD', old('otherOAD',$adhfmedication->otherOAD), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
      {!! Form::submit(trans('quickadmin::templates.templates-view_edit-update'), array('class' => 'btn btn-primary')) !!}
      {!! link_to_route(config('quickadmin.route').'.adhfmedication.index', trans('quickadmin::templates.templates-view_edit-cancel'), null, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection