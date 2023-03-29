@extends('admin.layouts.master')

@section('content')

{{-- <p>{!! link_to_route(config('quickadmin.route').'.chronicpatientmonthfollowup.create', trans('quickadmin::templates.templates-view_index-add_new') , null, array('class' => 'btn btn-success')) !!}</p> --}}
@if ($chronicpatientmonthfollowup->count())
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
                        <th>day passed</th>
                        <th>Name</th>
{{-- <th>Treatment Name</th> --}}
<th>Mount Name</th>
<th>Peripheral Oedema</th>
<th>nyhaClass</th>
<th>SBP</th>
<th>DBP</th>
<th>HR</th>
<th>Echo LVEF</th>
<th>Echo TAPSE</th>
<th>Echo EDV</th>
<th>Echo ESV</th>
<th>Echo LV Mass Index</th>
<th>E/e' average</th>
<th>Echo Sign.MR</th>
<th>ACEi</th>
<th>ACEi Dose</th>
<th>ACEi Intolerance</th>
<th>ARNI Dose</th>
<th>ARB</th>
<th>ARB Dose</th>
<th>MRA Intolerance</th>
<th>MRA Dose</th>
<th>SGLT2i</th>
<th>SGLT2i Dose</th>
<th>Beta Blocker</th>
<th>Beta Blocker Dose</th>
<th>Beta Blocker Intolerance</th>
<th>Ivabradine Dose</th>
<th>Devices</th>
<th>Loop Diuretic Dose</th>
<th>Insulin</th>
<th>Statin</th>
<th>Total Rehospitalization</th>
<th>All cause death</th>
<th>Cardiac related death</th>
<th>Date of death</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($chronicpatientmonthfollowup as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <?php
                            $datenow =  date("Y-m-d H:i:s");
                            $selisih = abs(strtotime($datenow) - strtotime($row->created_at));
                            $jumlahHari = floor($selisih / (60 * 60 * 24));
                            // $interval = $date1->diff($date2);
                            // $jumlahBulan = ($interval->y * 12) + $interval->m;

                            ?>
                            @if ($jumlahHari >= 130)
                            <td style="color: red;">{{ $jumlahHari }}</td>
                                @else
                            <td>{{ $jumlahHari }}</td>

                            @endif
                            
                            <td>{{ $row->name }}</td>
{{-- <td>{{ isset($row->categorytreatment->treatmentName) ? $row->categorytreatment->treatmentName : '' }}</td> --}}
<td>{{ $row->mount }}</td>
<td>{{ $row->peripheralOedema }}</td>
<td>{{ $row->nyhaClass }}</td>
<td>{{ $row->sbp }}</td>
<td>{{ $row->dbp }}</td>
<td>{{ $row->hr }}</td>
<td>{{ $row->echoEf }}</td>
<td>{{ $row->echoTapse }}</td>
<td>{{ $row->echoEdv }}</td>
<td>{{ $row->echoEsv }}</td>
<td>{{ $row->lvMaxIndex }}</td>
<td>{{ $row->ee }}</td>
<td>{{ $row->echoSignMr }}</td>
<td>{{ $row->acei }}</td>
<td>{{ $row->aceiDose }}</td>
<td>{{ $row->aceiIntolerance }}</td>
<td>{{ $row->arniDose }}</td>
<td>{{ $row->arb }}</td>
<td>{{ $row->arbDose }}</td>
<td>{{ $row->mraIntolerance }}</td>
<td>{{ $row->mraDose }}</td>
<td>{{ $row->sglt2i }}</td>
<td>{{ $row->sglt2iDose }}</td>
<td>{{ $row->betaBlocker }}</td>
<td>{{ $row->betaBlockerDose }}</td>
<td>{{ $row->betaBlockerIntolerance }}</td>
<td>{{ $row->ivabradineDose }}</td>
<td>{{ $row->devices }}</td>
<td>{{ $row->loopDiureticDose }}</td>
<td>{{ $row->insulin }}</td>
<td>{{ $row->statin }}</td>
<td>{{ $row->totalRehospitalization }}</td>
<td>{{ $row->allCauseDeath }}</td>
<td>{{ $row->cardiacRelatedDeath }}</td>
<td>{{ $row->dateofDeath }}</td>

                            <td>
                                {!! link_to_route(config('quickadmin.route').'.chronicpatientmonthfollowup.edit', trans('quickadmin::templates.templates-view_index-edit'), array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => "return confirm('".trans("quickadmin::templates.templates-view_index-are_you_sure")."');",  'route' => array(config('quickadmin.route').'.chronicpatientmonthfollowup.destroy', $row->id))) !!}
                                {!! Form::submit(trans('quickadmin::templates.templates-view_index-delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
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
            {!! Form::open(['route' => config('quickadmin.route').'.chronicpatientmonthfollowup.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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