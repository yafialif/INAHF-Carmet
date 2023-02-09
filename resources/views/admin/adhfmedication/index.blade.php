@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.adhfmedication.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($adhfmedication->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Name</th>
<th>Treatment Name</th>
<th>Dopamin Dose</th>
<th>Dopamin Duration</th>
<th>Dobutamin Dose</th>
<th>Dobutamin Duration</th>
<th>Norepinephrine Dose</th>
<th>Norepinephrine Duration</th>
<th>Epinephrin Dose</th>
<th>Epinephrin Duration</th>
<th>ACEi</th>
<th>ACEi Dose at Admission</th>
<th>ACEi Dose at Predischarge</th>
<th>ARB</th>
<th>ARB Dose at Admission</th>
<th>ARB Dose at Predischarge</th>
<th>ARNI Dose at Admission</th>
<th>ARNI Dose at Predischarge</th>
<th>MRA Dose at Admission</th>
<th>MRA Dose at Predischarge</th>
<th>Beta Blocker</th>
<th>Beta Blocker Dose at Admission</th>
<th>Beta Blocker Dose at Predischarge</th>
<th>Loop Diuretic Dose at Admission</th>
<th>Loop Diuretic Dose at Predischarge</th>
<th>SGLT2i</th>
<th>SGLT2i Dose at Admission</th>
<th>SGLT2i Dose at Predischarge</th>
<th>Ivabradine Dose at admission</th>
<th>Ivabradine Dose at predischarge</th>
<th>Tolvaptan Total Dose</th>
<th>Insulin</th>
<th>Insulin Dose</th>
<th>Other OAD</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($adhfmedication as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->patient->name) ? $row->patient->name : '' }}</td>
<td>{{ isset($row->categorytreatment->treatmentName) ? $row->categorytreatment->treatmentName : '' }}</td>
<td>{{ $row->DopaminDose }}</td>
<td>{{ $row->DopaminDuration }}</td>
<td>{{ $row->DobutaminDose }}</td>
<td>{{ $row->DobutaminDuration }}</td>
<td>{{ $row->NorepinephrineDose }}</td>
<td>{{ $row->NorepinephrineDuration }}</td>
<td>{{ $row->EpinephrinDose }}</td>
<td>{{ $row->EpinephrinDuration }}</td>
<td>{{ $row->acei }}</td>
<td>{{ $row->aceiDoseatAdmission }}</td>
<td>{{ $row->aceiDoseatPredischarge }}</td>
<td>{{ $row->arb }}</td>
<td>{{ $row->arbDoseatAdmission }}</td>
<td>{{ $row->arbDoseatPredischarge }}</td>
<td>{{ $row->arniDoseatAdmission }}</td>
<td>{{ $row->arniDoseatPredischarge }}</td>
<td>{{ $row->mraDoseatAdmission }}</td>
<td>{{ $row->mraDoseatPredischarge }}</td>
<td>{{ $row->BetaBlocker }}</td>
<td>{{ $row->BetaBlockerDoseatAdmission }}</td>
<td>{{ $row->BetaBlockerDoseatPredischarge }}</td>
<td>{{ $row->LoopDiureticDoseatAdmission }}</td>
<td>{{ $row->LoopDiureticDoseatPredischarge }}</td>
<td>{{ $row->sglt2i }}</td>
<td>{{ $row->sglt2iDoseatAdmission }}</td>
<td>{{ $row->sglt2iDoseatPredischarge }}</td>
<td>{{ $row->ivabradineDoseatAdmission }}</td>
<td>{{ $row->ivabradineDoseatPredischarge }}</td>
<td>{{ $row->TolvaptanTotalDose }}</td>
<td>{{ $row->insulin }}</td>
<td>{{ $row->insulinDose }}</td>
<td>{{ $row->otherOAD }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.adhfmedication.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.adhfmedication.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => config('quickadmin.route').'.adhfmedication.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    {{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm('{{ trans('quickadmin::templates.templates-view_index-are_you_sure') }}')) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop