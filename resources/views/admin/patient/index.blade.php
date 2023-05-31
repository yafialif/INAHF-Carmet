@extends('admin.layouts.master')

@section('content')


@if ($patient->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                      
                        <th>Dokter</th>
                        <th>Category treatment</th>
<th>NIK</th>
<th>Date Of Birth</th>
<th>Age</th>
<th>Gender</th>
<th>Phone</th>
{{-- <th>Date of Admission</th> --}}
<th>Insurance</th>
<th>Education</th>
{{-- <th>Date of Discharge</th> --}}

                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($patient as $row)
                        <tr>
                          
                            <td>{{ isset($row->user->name) ? $row->user->name : '' }}</td>
                            <td>{{ isset($row->treatment->treatmentName) ? $row->treatment->treatmentName : '' }}</td>
<td>{{ $row->nik }}</td>
<td>{{ $row->dateOfBirth }}</td>
<td>{{ $row->age }}</td>
<td>{{ $row->gender }}</td>
<td>{{ $row->phone }}</td>
{{-- <td>{{ $row->dateOfAdmission }}</td> --}}
<td>{{ $row->insurance }}</td>
<td>{{ $row->education }}</td>
<?php
// $date = date($row->dateOfAdmission);
// if(){

// };

?>
{{-- <td style="color: red;">{{ $row->dateOfDischarge }}</td> --}}
                            {{-- <td>
                                {!! link_to_route(config('quickadmin.route').'.patient.edit', trans('View Detail'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!} --}}
                                {{-- {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.patient.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!} --}}
                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    
                </div>
            </div>
           
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