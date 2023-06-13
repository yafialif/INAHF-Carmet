@extends('admin.layouts.master')

@section('content')
    @if ($data->swal == true)

     <div id="savelocal" class="alert alert-info" role="alert">
        {!! $data->message !!} <a style="color: red;" href="{{ Route('admin.timefollowuppatient.index') }}">View Detail</a>
    </div>  
    @endif

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">Patient Data Entry Guidelines</div>
        </div>
        <div class="portlet-body">
            
            <div class="row">
                <div class="col-xs-12">
                  <ol style="margin-left: 4.2px;">
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">This registry consist of two projects; ADHF Project and Chronic Heart Failure Project.&nbsp;</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">The ADHF case report form (CRF) contains 11 pages, and the Chronic CRF contains 7 pages.</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">On every page, several variables are required to be filled (marked by a red asterisk sign) and some are optional (if there is data about those variables then they are considered to be filled in, but if there is no data then it may not be filled in).</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">Data entry should be as complete as possible, make sure click save button after completing every page.</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">Some variables will be filled automatically by inputting other basic data. For example :<ul style="list-style-type: disc; font-family: initial; font-style: initial;">
            <li style="font-size: 17px; font-family: Calibri, sans-serif;">&ldquo;Age&rdquo;: will appear after &ldquo;date of birth&rdquo; and &ldquo;date of admission/date of clinic visit&rdquo; data entry</li>
            <li style="font-size: 17px; font-family: Calibri, sans-serif;">&ldquo;GFR&rdquo;: will appear after &ldquo;gender&rdquo;, &ldquo;age&rdquo; and &ldquo;creatinine&rdquo; data entry</li>
            <li style="font-size: 17px; font-family: Calibri, sans-serif;">&ldquo;BUN&rdquo;: will appear after &ldquo;urea&rdquo; data entry</li>
            <li style="font-size: 17px; font-family: Calibri, sans-serif;">&ldquo;Total Length of Stay&rdquo;: will appear after &ldquo;days patient spent in ICCU and wards&rdquo; data entry</li>
        </ul>
    </li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">Any missing data that need to be completed should be explained on the note</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">&ldquo;SAVE&rdquo; button will save the data to the local storage server. &ldquo;SAVE&rdquo; button will only keep the last data we entry. &ldquo;FINISH&rdquo; button will save the data to the national storage server.&nbsp;</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">To restore the data that was previously stored in local storage/server, we can use the &ldquo;RETRIEVE&rdquo; button. To delete the data, we can use the &ldquo;DELETE&rdquo; button.</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">All data that has been stored in the national storage server can be edited through the <strong>Patient List&nbsp;</strong>page.</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">Data can be extracted in Microsoft Excel format through the <strong>Patient Data Export</strong> page.</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">The ADHF CRF needs to be updated after 3 months and the Chronic CRF needs to be updated every 6 months.</li>
    <li style="font-size: 17px; font-family: Calibri, sans-serif;">Additional informations regarding the technical use of this web-based registry are provided in the guidebook or &nbsp;you can contact our team via email : registry-research@inahfcarmet.org.</li>
</ol>
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