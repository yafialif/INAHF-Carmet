@extends('admin.layouts.master')

@section('content')

<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">{{ trans('quickadmin::templates.templates-customView_index-list') }}</div>
    </div>
    <div class="portlet-body">

      <h1> Maintenance Feature</h1>
    </div>
</div>
{{-- @else
{{ trans('quickadmin::templates.templates-view_index-no_entries_found') }}
@endif --}}
@endsection