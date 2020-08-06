@extends('core::admin.master')

@section('title', trans($module . '::global.show',['title'=>$model->present()->title]))

@section('page-group-title')
    @Lang($module . '::global.group_name')
@stop
@section('page-css')
<link href="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('page-js')
<script src="{{asset('assets/admin/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
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
                            {{$model->name}}
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
                <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td class="kt-font-bold">Name</td>
                                        <td>{{ $model->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold">Registration Number</td>
                                        <td>{{ $model->registration_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold">Type</td>
                                        <td>{{ $model->type }}</td>
                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold">affiliation</td>
                                        <td>{{ $model->affliation }}</td>
                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold">Banker</td>
                                        <td>{{ $model->banker }}</td>
                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold">Address</td>
                                        <td>{{ $model->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold">contact Detiails</td>
                                        <td>{{ $model->contact_details }}</td>
                                    </tr>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>

@stop