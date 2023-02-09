@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.chronicclinicalprofile.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($chronicclinicalprofile->count())
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
<th>Height</th>
<th>Weight</th>
<th>BMI</th>
<th>SBP</th>
<th>DBP</th>
<th>HR</th>
<th>Dyspnoea on exertion</th>
<th>Orthopnea</th>
<th>PND</th>
<th>Peripheral Oedema</th>
<th>Pulmonary rales</th>
<th>JVP</th>
<th>AHA Staging</th>
<th>NYHA Class</th>
<th>Etiology</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($chronicclinicalprofile as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->patient->name) ? $row->patient->name : '' }}</td>
<td>{{ isset($row->categorytreatment->treatmentName) ? $row->categorytreatment->treatmentName : '' }}</td>
<td>{{ $row->height }}</td>
<td>{{ $row->weight }}</td>
<td>{{ $row->bmi }}</td>
<td>{{ $row->sbp }}</td>
<td>{{ $row->dbp }}</td>
<td>{{ $row->hr }}</td>
<td>{{ $row->dyspnoeaOnExertion }}</td>
<td>{{ $row->orthopnea }}</td>
<td>{{ $row->pnd }}</td>
<td>{{ $row->peripheralOedema }}</td>
<td>{{ $row->pulmonaryRales }}</td>
<td>{{ $row->jvp }}</td>
<td>{{ $row->ahaStaging }}</td>
<td>{{ $row->nyhaClass }}</td>
<td>{{ $row->etiology }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.chronicclinicalprofile.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.chronicclinicalprofile.destroy', $row->id))) !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.chronicclinicalprofile.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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