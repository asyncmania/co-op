@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="courses archives section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('pages::public._page-content-body')
                    @include('courses::public._list')
                </div>
            </div>
        </div>
    </section>
@stop