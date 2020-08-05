@extends('pages::public.master')
@section('js')
    <script>
        $('.add-to-cart-form').on('submit',function(e){
            e.preventDefault();
            var button = $(this).find('.add-to-cart-button');
            var buttonInitialLabel = button.html();
            button.attr("disabled", true).html("<i class='fa fa-spinner fa-spin'></i>");
            $(this).ajaxSubmit({
                success: function () {
                    button.attr("disabled", false).html(buttonInitialLabel);
                    document.location.href = '{{route('checkout')}}';
                },
                error: function (reponse, statusText, xhr, $form) {
                    button.attr("disabled", false).html(buttonInitialLabel);
                    swal({
                        title: "An error occurred",
                        text: reponse.responseText,
                        icon: "error",
                        dangerMode: true,
                    });
                }
            });
        });
    </script>
@stop
@section('page')
    @include('pages::public._page-banner-section')
    <section class="blog b-archives single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="courses-single">
                        <div class="course-image">
                            <img src="{!! $model->present()->thumbSrc(850,500) !!}"
                                 alt="{{$model->title}}">
                        </div>
                        <div class="course-title">
                            <h2>{!! $model->title !!}</h2>
                        </div>
                        <div class="course-meta">
                            <div class="single-info author">
                                <img src="{!! $model->present()->thumbSrc(100,100,[],'instructor_image') !!}" alt="#">
                                <h4>Instructor:<a href="#"><span>{!! $model->instructor !!}</span></a></h4>
                            </div>
                            <div class="single-info s-enroll">
                                <i class="fa fa-calendar"></i>
                                <h4>Duration:<span>{{$model->present()->duration}} </span></h4>
                            </div>
                            <div class="single-info s-enroll">
                                <i class="fa fa-users"></i>
                                <h4>Total Enrolled:<span>{{$model->present()->totalEnrolled}} Student Enrolled</span>
                                </h4>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="course-details faq">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default active">
                                    <div class="faq-heading" id="FaqTitle1">
                                        <h4 class="faq-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                               href="#faq1">
                                                Course Description
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="faq1"
                                         class="panel-collapse collapse {{!count($model->classes) ? 'show' : ''}}"
                                         role="tabpanel"
                                         aria-labelledby="FaqTitle1">
                                        <div class="faq-body">
                                            {!! $model->body !!}
                                        </div>
                                    </div>
                                    <!--/ End Single Faq -->
                                </div>
                                <div class="panel panel-default">
                                    <div class="faq-heading" id="FaqTitle2">
                                        <h4 class="faq-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                               href="#faq2">
                                                Available Classes
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="faq2"
                                         class="panel-collapse collapse {{count($model->classes) ? 'show' : ''}}"
                                         role="tabpanel"
                                         aria-labelledby="FaqTitle2">
                                        <div class="faq-body">
                                            @if(count($model->classes))
                                                <div class="class-items">
                                                    @foreach($model->classes as $class)
                                                        @include('courses::public._classes-list-item')
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!--/ End Single Faq -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="learnedu-sidebar">
                        @include('courses::public._list-widget')
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop