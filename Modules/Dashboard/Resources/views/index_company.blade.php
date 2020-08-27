@extends('core::admin.master')

@section('page-css')
@stop

@section('page-js')
@stop

@section('page-group-title')
    Dashboard
@stop

@section('main')
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-xl">
                <div class="col-md-6">
                    <div class="kt-widget1">
                        @include('dashboard::_widget',[
                            'module' => 'members'
                        ])
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="kt-widget1">
                        @include('dashboard::_widget',[
                            'module' => 'users',
                            'color' => 'success',
                            'count' => app(\Modules\Users\Repositories\UserInterface::class)->countAll()
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Recently Added Members
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{route('admin.members.index')}}" class="btn btn-brand btn-sm">
                                    <i class="fa fa-list"></i>
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    @if($members = Members::latest(10))
                        @if(count($members))
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{!! single_btn(route('admin.members.show',$member->id)) !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-outline-danger fade show ">No Recently added members</div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Recent Activities
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="kt-portlet__head-actions">
                                <a href="{{route('admin.history.index')}}" class="btn btn-brand btn-sm">
                                    <i class="fa fa-list"></i>
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    @include('history::admin._latest')
                </div>
            </div>
        </div>
    </div>
@stop
