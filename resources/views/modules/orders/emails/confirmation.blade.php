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
                            Welcome to Bia Maranatha Shop

                            <p>Dear Esteemed Customer,
                                Your order has been received and you will soon be contacted by one of our customer service agents for order confirmation prior to processing and delivery. Thank you once again for shopping on Bia Maranatha Shop</p>


                        </td>
                    </tr>
                    <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                        <td class="content-block"
                            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                            valign="top">
                            <b>Your order # {{$order->order_number}}</b>
                            <br>
                            Placed on  {{$order->created_at}}
                            <p>Payment Method : Paypal</p>
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

                    <tr>
                        <td style="width:60%; padding-left:15px">
                                    <h4>Shipping Address</h4>
                                    <label> {{$order->shippingAddress->present()->fullname()}}</label>
                                    <p>
                                        {{$order->shippingAddress->address}}, {{$order->shippingAddress->landmark}}<br>
                                        {{$order->shippingAddress->city}}, {{$order->shippingAddress->state}} <br>
                                        {{$order->shippingAddress->phone}}, {{$order->shippingAddress->email}}
                                    </p>

                        </td>

                        <td>

                            <h4>Billing Address</h4>
                                    <label> {{$order->billingAddress->present()->fullname()}}</label>
                                    <p>
                                        {{$order->billingAddress->address}}, {{$order->billingAddress->landmark}}<br>
                                        {{$order->billingAddress->city}}, {{$order->billingAddress->state}} <br>
                                        {{$order->billingAddress->phone}}, {{$order->billingAddress->email}}
                                    </p>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>


    </table>
@endsection