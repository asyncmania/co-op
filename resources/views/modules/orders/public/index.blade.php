@extends('core::public.account-master')

@section('breadcrumbs')
    <li>My Registrations</li>
@stop

@section('page')
    <div class="account-page-title">
        <h3>My Course Registrations</h3>
        <p>below is a list of courses/classes you have registered for.</p>
    </div>
    @if($models->count())
        <div class="order-history">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>Reg. #</th>
                    <th>Reg. Date</th>
                    <th>Course / Class</th>
                    <th>Amount Paid</th>
                    <th></th>
                </tr>
                @foreach($models as $item)
                    <tr>
                        <td>{{$item->order_number}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->schedule->present()->title}}</td>
                        <td>{{$item->present()->total}}</td>
                        <td><a href="#" class="btn btn-brand btn-sm"><i class="fa fa-eye"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-danger">
            You have not registered for any course yet.
        </div>
        <div class="button">
            <a href="{{route('courses')}}" class="btn btn-brand-alt border-radius">View available course classes </a>
        </div>
    @endif
@stop