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
                        <td class="content-block"
                            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 20px; font-weight:bold; vertical-align: top; margin: 0; padding: 0 0 20px;"
                            valign="top">
                            Welcome to Bia Maranatha Shop
                        </td>
                    </tr>
                    <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                        <td class="content-block"
                            style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;"
                            valign="top">
                            <b>Order Status</b>
                            <br>
                            {{$order->status->name}}

                        </td>
                    </tr>
                    <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">

                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td>

                <h5>Order Items</h5>
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Sku</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach($order->items as $row)
                        <tr>
                            <td>
                                <img src="{{$row->present()->featuredImageSrc(80,80)}}" alt=""/></td>
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
@endsection