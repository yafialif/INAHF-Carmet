@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.chronicmedication.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($chronicmedication->count())
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
<th>ACEi</th>
<th>ACEi Dose</th>
<th>ACEi intolerance</th>
<th>ARB</th>
<th>ARB Dose</th>
<th>ARNI Dose</th>
<th>Beta Blocker</th>
<th>Beta Blocker Dose</th>
<th>Beta Blocker Intolerance</th>
<th>MRA Dose</th>
<th>MRA Intolerance</th>
<th>SGLT2i</th>
<th>SGLT2i Dose</th>
<th>Loop Diuretic</th>
<th>Loop Diuretic Dose</th>
<th>Ivabradine Dose</th>
<th>Insulin</th>
<th>Devices</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($chronicmedication as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->patient->name) ? $row->patient->name : '' }}</td>
<td>{{ isset($row->categorytreatment->) ? $row->categorytreatment-> : '' }}</td>
<td>{{ $row->acei }}</td>
<td>{{ $row->aceiDose }}</td>
<td>{{ $row->aceiIntolerance }}</td>
<td>{{ $row->arb }}</td>
<td>{{ $row->arbDose }}</td>
<td>{{ $row->arniDose }}</td>
<td>{{ $row->betaBlocker }}</td>
<td>{{ $row->betaBlockerDose }}</td>
<td>{{ $row->betaBlockerIntolerance }}</td>
<td>{{ $row->mraDose }}</td>
<td>{{ $row->mraIntolerance }}</td>
<td>{{ $row->sglt2i }}</td>
<td>{{ $row->sglt2iDose }}</td>
<td>{{ $row->loopDiuretic }}</td>
<td>{{ $row->loopDiureticDose }}</td>
<td>{{ $row->ivabradineDose }}</td>
<td>{{ $row->insulin }}</td>
<td>{{ $row->devices }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.chronicmedication.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.chronicmedication.destroy', $row->id))) !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.chronicmedication.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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