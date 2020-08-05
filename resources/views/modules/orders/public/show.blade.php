@extends('core::public.account-master')

@section('title','Order Details '.config('myapp.meta_title'))


@section('css')
    @include('orders::_status-colors')
    <style>
        .list-group-item {
            position: relative;
            display: block;
            padding: 10px 15px;
            margin-bottom: -1px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            border-left:none;
            border-right:none;
        }
        .list-group {
            padding-left: 0;
            margin-bottom: 0px;
        }
    </style>
@stop

@section('js')

@stop

@section('breadcrumbs')
    <li><a href="{{route('orders.index')}}">My Orders</a></li>
    <li>Order #{{$model->order_number}}</li>
@stop

@section('page')

    <div class="col-md-9 col-sm-8">
        <div id="account-id">
            <h4 class="account-title"><span class="fa fa-chevron-right"></span>Order:
                {{$model->order_number}} {!! $model->present()->status !!}
            </h4>
        </div>
        <div class="space20"></div>
        <strong>Order placed on</strong>: {{$model->created_at}}
        <div class="space20"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Billing Address</div>
                    <div class="panel-body">
                        <strong>{{$model->billingAddress->present()->fullname}}</strong><br>
                        {!! $model->billingAddress->present()->address !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Shipping Address</div>
                    <div class="panel-body">
                        <strong>{{$model->shippingAddress->present()->fullname}}</strong><br>
                        {!! $model->shippingAddress->present()->address !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Payment Summary</div>
                    <div class="panel-body" style="padding:0">
                        <ul class="list-group">
                            <li class="list-group-item">
                               {{ucwords($model->payment->payment_method)}}
                            </li>
                            <li class="list-group-item">
                                Ref: #{{$model->payment->transaction_id}}
                            </li>
                            <li class="list-group-item">
                                Status: {{$model->payment->transaction_status}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h5>Order Items</h5>
        <table class="cart-table">
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Subtotal</th>
            </tr>
            @foreach($model->items as $row)
                <tr>
                    <td>
                        <img src="{{$row->present()->featuredImageSrc(80,80)}}" alt=""/></td>
                    <td>
                        <h4>{{$row->name}}</h4>
                    </td>
                    <td>
                        {{$row->quantity}}
                    </td>
                    <td>
                        <div class="item-price">{{format_currency($row->price)}}</div>
                    </td>
                    <td>
                        <div class="item-price"> {{format_currency($row->total_price)}} </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="clearfix space20"></div>
        <div class="row shipping-info-wrap">
            <div class="col-md-4 col-sm-4 col-xs-12 col-lg-offset-8">
                <div class="totals">
                    <table id="shopping-cart-totals-table">
                        <tfoot>
                        <tr>
                            <td style="" class="a-left" colspan="1">
                                <strong>Grand Total </strong>
                            </td>
                            <td class="a-right" style="padding-left:15px;">
                                <strong><span class="price"> {{$model->total}}</span></strong>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

@stop