@extends('core::emails.master')
@section('content')
    <table class="main" width="100%" cellpadding="0" cellspacing="0"
           style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background: #fff; margin: 0; padding: 0; border: 1px solid #e9e9e9;">
        <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
            <td class="content-wrap"
                style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;"
                valign="top">
                <table width="100%" cellpadding="0" cellspacing="0"
                       style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                    <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                        <td class="content-block" valign="top">
                            New Order Placed By {{$order->user->first_name. '  '.$order->user->last_name }}

                        </td>
                    </tr>
                    <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                        <td class="content-block"
                            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                            valign="top">
                            <b>Your order # {{$order->order_number}}</b>
                            <br>
                            Placed on  {{$order->created_at}}
                            <p>Payment Method : {{$order->payment->payment_method}}</p>
                            <p>Payment Status : {{$order->payment->transaction_status}}</p>
                            <p>Payment ID : {{$order->payment->transaction_id}}</p>
                        </td>
                    </tr>


                    <tr>
                        <td>

                            <h5>Order Items</h5>
                            <table class="table table-striped table-bordered">
                                <tr>

                                    <th>Item</th>
                                    <th>Sku</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Subtotal</th>
                                </tr>
                                @foreach($order->items as $row)
                                    <tr>
                                        <td>
                                            {{$row->name}}
                                        </td>
                                        <td>
                                            {{$row->sku}}
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
                            <div class="row">
                                <div class="col-md-6"> </div>
                                <div class="col-md-6">
                                    <div class="well">
                                        <div class="row static-info align-reverse">
                                            <div class="col-md-8 name"> Total: </div>
                                            <div class="col-md-3 value"> {{$order->total}} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>


    </table>
@endsection