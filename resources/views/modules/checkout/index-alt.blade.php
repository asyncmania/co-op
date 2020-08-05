@extends('pages::public.master')
@section('js')
    <script>
        var TOKEN = "{{csrf_token()}}";
        var CHECKOUT_URL = "{{ route('checkout.session') }}"
        var STRIPE_KEY  = "{{ env('STRIPE_PUBLISH_KEY') }}";
    </script>
    <script src="{{ asset('assets/public/js/pages/registration.js') }}"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('assets/public/js/pages/stripe.js') }}"></script>
    {{-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> --}}
    <script src="https://www.paypal.com/sdk/js?client-id=AZHtxxYQADy0UGgtIj26AO2IX9gH_T4cTOz6LhKUQD-mCF6p-zGP8H_MsuLUCWC8qR5ohxZgrdnz_lzr&currency=USD"></script>
    <script src="{{ asset('assets/public/js/pages/paypal.js') }}"></script>
@stop
@section('page')
    @include('pages::public._page-banner-section')
    <section class="blog b-archives section">
        <div class="container">
            {{Form::model($user)}}
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
                        <div class="checkout-item-title">
                            <h3>Update Information</h3>
                            <p class="mb-4">Enter your card details below or pay with paypal</p>
                        </div>
                        <div class="form">
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->first_name) !!}</div>
                                <div class="col">{!! form_row($register_form->last_name) !!}</div>
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->phone) !!}</div>
                                <div class="col"> {!! form_row($register_form->email,['attr'=>['disabled']]) !!}</div>
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->address) !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="learnedu-sidebar">
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
                            {{Form::hidden('class_id',$class->id)}}
                            {{Form::hidden('amount',$class->present()->price)}}

                            @include('checkout::_card')

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