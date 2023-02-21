@extends('admin.layouts.master')
@section('css')
<style>
   .btn{
    margin: 5px;
   }
</style>

@endsection
@section('pagetitle')
I-TREAT HF (Indonesian Trial and Registry About Heart Failure)
@endsection
@section('content')

<p><a href="/admin/listpatientadhf/create"><button class="btn btn-success">Add New</button></a> 
    {{-- link_to_route(config('quickadmin.route').'.patient.create', --}}
    {{-- trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p> --}}

@if (count($patient))
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">{{ trans('quickadmin::templates.templates-view_index-list') }}</div>
    </div>
    <div class="portlet-body">
        <div class="table-responsive">

        <table class="table table-striped table-hover table-responsive datatable" id="datatable">
            <thead>
                <tr>
                    <th>
                        {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                    </th>
                    <th>Dokter</th>
                    <th>Category treatment</th>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Date Of Birth</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Date of Admission</th>
                    <th>Insurance</th>
                    <th>Education</th>
                    <th>Date of Discharge</th>
                    <th>Progress</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($patient as $row)
                <tr>
                    <td>
                        {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                    </td>
                    <td>{{ isset($row->user->name) ? $row->user->name : '' }}</td>
                    <td>{{ isset($row->categorytreatment) ? $row->categorytreatment : '' }}</td>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->dateOfBirth }}</td>
                    <td>{{ $row->age }}</td>
                    <td>{{ $row->gender }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->dateOfAdmission }}</td>
                    <td>{{ $row->insurance }}</td>
                    <td>{{ $row->education }}</td>
                    <td style="color: red;">{{ $row->dateOfDischarge }}</td>
                    @if($row->percent < 98)
                    <td style="color: red;" >{{ $row->percent }} %</td>
                    @else
                    <td>{{ $row->percent }} %</td>
                    @endif


                    <td>
                        {!! link_to_route('admin.listpatientadhf.show', trans('View'),
                        array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                        {!! link_to_route('admin.listpatientadhf.edit', trans('Edit'), 
                        array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                        {{-- {!! link_to_route('admin.listpatientadhf.edit', trans('Update'),
                        array($row->id), array('class' => 'btn btn-xs btn-info')) !!} --}}
                        {{-- {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.patient.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!} --}}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <button class="btn btn-danger" id="delete">
                    {{ trans('quickadmin::templates.templates-view_index-delete_checked') }}
                </button>
            </div>
        </div>
        {!! Form::open(['route' => config('quickadmin.route').'.patient.massDelete', 'method' => 'post', 'id' =>
        'massDelete']) !!}
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
//     $(document).ready(function() {
//     $('#datatable2').DataTable( {
//         dom: 'Bfrtip',
//         buttons: [
//             'copy', 'csv', 'excel', 'pdf', 'print'
//         ]
//     } );
// } );
</script>
<script>
    $(document).ready(function () {
        $('#delete').click(function () {
            if (window.confirm('{{ trans('
                    quickadmin::templates.templates - view_index - are_you_sure ') }}')) {
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
