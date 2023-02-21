@extends('admin.layouts.master')

@section('content')

    {{-- {{ trans('quickadmin::admin.dashboard-title') }} --}}


@endsection

@section('javascript')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal("Hello world!");
    </script>
@endsection