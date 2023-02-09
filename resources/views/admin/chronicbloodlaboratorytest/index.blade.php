@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.chronicbloodlaboratorytest.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($chronicbloodlaboratorytest->count())
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
<th>Hemoglobin</th>
<th>Hematocrite</th>
<th>Erythrocyte</th>
<th>HbA1C</th>
<th>Fasting Blood Glucose</th>
<th>Two Hours Post Prandial Blood Glucose</th>
<th>Natrium</th>
<th>Kalium</th>
<th>Ureum</th>
<th>BUN</th>
<th>Serum Creatinine</th>
<th>GFR</th>
<th>NT-ProBNP</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($chronicbloodlaboratorytest as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->patient->name) ? $row->patient->name : '' }}</td>
<td>{{ isset($row->categorytreatment->treatmentName) ? $row->categorytreatment->treatmentName : '' }}</td>
<td>{{ $row->hemoglobin }}</td>
<td>{{ $row->hematocrite }}</td>
<td>{{ $row->erythrocyte }}</td>
<td>{{ $row->hbA1C }}</td>
<td>{{ $row->fastingBloodGlucose }}</td>
<td>{{ $row->twoHoursPostPrandialBloodGlucose }}</td>
<td>{{ $row->natrium }}</td>
<td>{{ $row->kalium }}</td>
<td>{{ $row->ureum }}</td>
<td>{{ $row->bun }}</td>
<td>{{ $row->serumCreatinine }}</td>
<td>{{ $row->gfr }}</td>
<td>{{ $row->nt_ProBnp }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.chronicbloodlaboratorytest.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.chronicbloodlaboratorytest.destroy', $row->id))) !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.chronicbloodlaboratorytest.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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