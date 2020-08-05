@extends('core::admin.master')

@section('page-css')
    <link href="{{asset('assets/admin/css/pages/login.css')}}" rel="stylesheet" type="text/css"/>

    <style>

.kt-login.kt-login--v3 .kt-login__wrapper .kt-login__container .kt-form .form-control {
 
    background: rgba(235, 237, 242, 0.8);
    font-size: 1.2rem;
    font-family: inherit;
}

 .kt-login__btn-primary {
    background: #318605;
    border: none;
}

.kt-login.kt-login--v3 .kt-login__wrapper .kt-login__container .kt-login__head .kt-login__title {
    color: #fff;
}
    </style>
    
@stop

@section('body-class')
    login
    
@stop

@section('main-footer')
         {{-- 
        <div class="copyright">
            {{date('Y')}} © {{config('myapp.website_title')}}
        </div>
        
        --}}
@stop

@section('page-js')
    <script src="{{asset('assets/admin/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('assets/admin/js/pages/login-general.js')}}" type="text/javascript"></script>
@stop

@section('main-body')
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
                 style="background-image: linear-gradient(to left, rgba(100, 212, 16, .4), rgba(100, 212, 16, .4)), url({{asset('assets/admin/media/bg/agric.jpg')}}); background-size:cover">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        @if(!is_null(config('myapp.image')))
                            <div class="kt-login__logo">
                                <a href="#">
                                    <img src="{{asset('uploads/settings/'.config('myapp.image'))}}" alt="logo"/>
                                </a>
                            </div>
                        @endif
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Sign In To Admin</h3>
                            </div>
                            {!! form_start($login_form,['class'=>'kt-form','id'=>'form-validate']) !!}
                                <div class="input-group">
                                    {!! form_widget($login_form->email) !!}
                                </div>
                                <div class="input-group">
                                    {!! form_widget($login_form->password) !!}
                                </div>

                                <div class="kt-login__actions">
                                    <button type="submit" class="btn btn-dark btn-elevate kt-login__btn-primary">Sign In
                                    </button>
                                </div>
                            {!! form_end($login_form,false) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


