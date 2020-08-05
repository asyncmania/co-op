@extends('pages::public.master')
@section('css')
    <style>
        #card-element{
            border: 1px solid #ced4da;
            border-radius: .25rem;
            padding: 8px;
        }
        #card-errors{
            color:darkred;
            margin-top:5px;
        }
    </style>
@stop
@section('js')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var CHECKOUT_URL = "{{route('checkout.post')}}";
        var STRIPE_KEY = "{{ config('myapp.stripe_publish_key',env('STRIPE_KEY')) }}";
        const submitCheckoutForm = function (tokenObject) {
            $('input[name=payment_payload]').attr('value', JSON.stringify(tokenObject));
            var button = $('.payment-btn');
            var buttonInitialLabel = button.html();
            button.attr("disabled", true).html("<i class='fa fa-spinner fa-spin'></i> PROCESSING...");
            $('#payment-form').ajaxSubmit({
                success: function (responseText, statusText, xhr, $form) {
                    button.attr("disabled", false).html(buttonInitialLabel);
                    swal({
                        title: "Registration complete!",
                        text: "Thank you, your course registration and payment was successful",
                        icon: "success"
                    }).then((value) => {
                        document.location.href = '{{route('orders.index')}}';
                    });
                },
                error: function (response, statusText, xhr, $form) {
                    button.attr("disabled", false).html(buttonInitialLabel);
                    swal({
                        title: "An error occurred",
                        text: response.responseText,
                        icon: "error",
                        dangerMode: true,
                    });
                }
            });
        }
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://www.paypal.com/sdk/js?client-id={{config('myapp.paypal_client_id',env('PAYPAL_CLIENT_ID'))}}"></script>
    <script src="{{ asset('assets/public/js/pages/stripe.js') }}"></script>
    <script src="{{ asset('assets/public/js/pages/paypal.js') }}"></script>
@stop
@section('page')
    @include('pages::public._page-banner-section')
    <section class="blog b-archives section">
        <div class="container">
            {{Form::model($user,['route'=>'checkout.post','id'=>'payment-form'])}}
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="checkout-item has-border" style="padding-bottom:25px;">
                        <div class="checkout-item-title">
                            <h3>Course Information</h3>
                        </div>
                        <div class="class-items">
                            <h2 class="mb-3">{{$class->course->title}}</h2>
                            @include('courses::public._classes-list-item',['checkout'=>true])
                        </div>
                    </div>
                    <div class="checkout-item mt-4">
                        @include('checkout::_user-profile')
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="learnedu-sidebar">
                        <div class="checkout-item">
                            <div class="checkout-item-title">
                                <h3>Apply Discount</h3>
                                <p class="mb-4">Enter a discount code to get discount for this payment</p>
                            </div>
                            <div class="checkout-item-content">
                                @include('checkout::_discount')
                            </div>
                        </div>
                        <div class="checkout-item">
                            <table class="table table-bordered">
                                <tr class="total-table">
                                    <td class="title">Sub Total</td>
                                    <td class="amount">${!! $class->present()->price !!}</td>
                                </tr>
                                <tr class="total-table">
                                    <td class="title">Total</td>
                                    <td class="amount">${!! $class->present()->price !!}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="checkout-item">
                            <div class="checkout-item-title">
                                <h3>Make Payment</h3>
                                <p class="mb-4">Use the form below to update your information</p>
                            </div>
                            {{Form::hidden('schedule_id',$class->id)}}
                            {{Form::hidden('amount',$class->present()->price)}}
                            {{Form::hidden('description',$class->present()->title)}}
                            {{Form::hidden('payment_payload')}}

                            <label for="card-element">Credit or debit card</label>
                            <div id="card-element"></div>
                            <div id="card-errors" role="alert"></div>

                            <div class="button payment-button" style="margin-top:20px;">
                                <button type="submit" class="btn payment-btn">Pay
                                    ${!! $class->present()->price !!}</button>
                            </div>

                            <hr>

                            <p class="mb-3">Click the button below to pay with paypal</p>
                            <div id="paypal-button-container"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </section>
@stop