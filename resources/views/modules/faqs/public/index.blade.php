@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="faq page section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <p>@include('pages::public._page-content-body')</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('faqs::public._list')
                </div>
            </div>
        </div>
    </section>
@stop