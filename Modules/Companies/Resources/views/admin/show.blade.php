@extends('core::admin.master')

@section('title', trans($module . '::global.show',['title'=>$model->present()->title]))

@section('page-group-title')
    @Lang($module . '::global.group_name')
@stop
@section('page-css')
    <link href="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>
@stop

@section('page-js')
    <script src="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.js')}}"
            type="text/javascript"></script>

    <script>
        $(function() {
            $('#balances').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '{{route('admin.balances.datatable',['id'=>$model->id])}}',
                columns: {!! json_encode(config('balances.columns')) !!},
            });

            $('#members').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '{{route('admin.members.datatable',['id'=>$model->id])}}',
                columns: {!! json_encode(config('members.columns')) !!},
            });

            $('#ledgers').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '{{route('admin.ledgers.datatable',['id'=>$model->id])}}',
                columns: {!! json_encode(config('ledgers.columns')) !!},
            });

            $('#contributions').DataTable({
                processing: true,
                serverSide: true,
                scrollX: true,
                ajax: '{{route('admin.contributions.datatable',['id'=>$model->id])}}',
                columns: {!! json_encode(config('contributions.columns')) !!},
            });

            $('body').find('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables()).DataTable().columns.adjust();
            });
        })
    </script>

@stop
@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="{{route("admin.$module.index")}}"
       class="kt-subheader__breadcrumbs-link">@Lang($module . '::global.name')</a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
        @Lang($module . '::global.show',['title' => 'something' ])
    </a>
@stop
@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            View Profile
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                @include('core::admin._button-back', ['module' => $module])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body form">
                    <ul class="nav nav-tabs nav-tabs-line-2x nav-tabs-line nav-tabs-line-primary">
                        <li class="nav-item">
                            <a href="#tab_1" data-toggle="tab" class="nav-link active">
                                Profile </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab_2" data-toggle="tab" class="nav-link">
                                Balances
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab_3" data-toggle="tab" class="nav-link">
                                Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab_4" data-toggle="tab" class="nav-link">
                                Member Ledgers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tab_5" data-toggle="tab" class="nav-link">
                                Member Contributions
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            @include('companies::admin._profile')
                        </div>
                        <div class="tab-pane" id="tab_2">
                            {!!generate_datatable(config('balances.th'),'balances')!!}
                        </div>
                        <div class="tab-pane" id="tab_3">
                            {!!generate_datatable(config('members.th'),'members')!!}
                        </div>
                        <div class="tab-pane" id="tab_4">
                            {!!generate_datatable(config('ledgers.th'),'ledgers')!!}
                        </div>
                        <div class="tab-pane" id="tab_5">
                            {!!generate_datatable(config('contributions.th'),'contributions')!!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop