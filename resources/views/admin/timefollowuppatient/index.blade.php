@extends('admin.layouts.master')

@section('content')

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">list of patients for the next Follow-Up Period</div>
        </div>
        <div class="portlet-body">
             <div class="table-responsive">

            <table class="table table-striped table-hover table-responsive datatable" id="datatable">
                <thead>
                    <tr>
                        
                        <th>Name</th>
{{-- <th>Treatment Name</th> --}}
<th>Information</th>
<th>Submission Date</th>
<th>Action</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($data as $row)
                        <tr>
                          
                            
                            <td>{{ $row->name }}</td>
{{-- <td>{{ isset($row->categorytreatment->treatmentName) ? $row->categorytreatment->treatmentName : '' }}</td> --}}
<td>{{ $row->month }}</td>
<td>{{ $row->date }}</td>
<td>{!! link_to_route('admin.chronicpatientmonthfollowup.addnew', trans('Add Followup Patient'), 
                        array($row->id), array('class' => 'btn btn-xs btn-info')) !!}</td>


                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
	</div>

@endsection