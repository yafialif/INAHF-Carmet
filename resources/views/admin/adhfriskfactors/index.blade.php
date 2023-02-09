@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route(config('quickadmin.route').'.adhfriskfactors.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p>

@if ($adhfriskfactors->count())
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
<th>Hypertension</th>
<th>Diabetes or prediabetes</th>
<th>Dislipidemia</th>
<th>Alcohol</th>
<th>Smoker</th>
<th>CKD</th>
<th>Valvular heart disease</th>
<th>Atrial fibrillation</th>
<th>History of HF</th>
<th>History of PCI or CABG</th>
<th>History of heart valve surgery</th>
<th>OMI or CAD</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($adhfriskfactors as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ isset($row->patient->name) ? $row->patient->name : '' }}</td>
<td>{{ isset($row->categorytreatment->treatmentName) ? $row->categorytreatment->treatmentName : '' }}</td>
<td>{{ $row->hypertension }}</td>
<td>{{ $row->diabetes_or_prediabetes }}</td>
<td>{{ $row->dislipidemia }}</td>
<td>{{ $row->alcohol }}</td>
<td>{{ $row->smoker }}</td>
<td>{{ $row->ckd }}</td>
<td>{{ $row->valvular_heart_disease }}</td>
<td>{{ $row->atrial_fibrillation }}</td>
<td>{{ $row->history_of_hf }}</td>
<td>{{ $row->history_of_pci_or_cabg }}</td>
<td>{{ $row->historyof_heart_valve_surgery }}</td>
<td>{{ $row->omi_or_cad }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.adhfriskfactors.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.adhfriskfactors.destroy', $row->id))) !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.adhfriskfactors.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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