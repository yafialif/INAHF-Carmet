@extends('admin.layouts.master')

@section('content')

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('quickadmin::templates.templates-customView_index-list') }}</div>
        </div>
        <div class="portlet-body">
             <div class="table-responsive">
        <table class="table table-striped table-hover table-responsive datatable" id="datatable">
            <thead>
                <tr>
                  
                    <th>Dokter</th>
                    <th>Project</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Date of Admission</th>
                    <th>Insurance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    {{-- <td>{{ isset($row->user->name) ? $row->user->name : '' }}</td> --}}
                    <td>{!! $row->user['name'] !!}</td>
                    <td>I-TREAT HF (Adhf)</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->gender }}</td>
                    <td>{{ $row->dateOfAdmission }}</td>
                    <td>{{ $row->insurance }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
            {{-- {{ trans('quickadmin::templates.templates-customView_index-welcome_custom_view') }} --}}
        </div>
	</div>

@endsection