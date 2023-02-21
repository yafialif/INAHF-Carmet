@extends('admin.layouts.master')

@section('content')
    @if ($data->swal == true)

     <div id="savelocal" class="alert alert-info" role="alert">
        {!! $data->message !!}
    </div>  
    @endif

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">Patient Data Entry Guidelines</div>
        </div>
        <div class="portlet-body">
            
            <div class="row">
                <div class="col-xs-12">
                    
                </div>
            </div>
           
        </div>
	</div>

    {{-- {{ trans('quickadmin::admin.dashboard-title') }} --}}


@endsection

@section('javascript')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if ($data->swal == true)

    <script>
        swal("{!! $data->message !!}");
    </script>
        
    @endif
    
@endsection