@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="courses archives section">
        <div class="container">
        @include('pages::public._page-content-body')
        <!-- Courses -->
            <section class="courses single section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="single-main">
                                <div class="row">
                                    <div class="col-lg-8 col-12">
                                        <!-- Single Course -->
                                        <div class="single-course">
                                            <div class="course-head">
                                                <img src="{!! $model->present()->thumbSrc(710,417) !!}"
                                                     alt="{{$model->title}}">
                                            </div>
                                        </div>
                                        <!--/ End Single Course -->
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Course Meta -->
                                        <div class="course-meta">
                                            <!-- Course Info -->
                                            <div class="course-info">
                                                <div class="single-info author">
                                                    <img src="images/testimonial2.jpg" alt="#">
                                                    <h4>Teacher:<a href="#"><span>Keny White</span></a></h4>
                                                </div>
                                                <div class="single-info s-enroll">
                                                    <i class="fa fa-users"></i>
                                                    <h4>Total Enrolled:<span>302 Student Enrolled</span></h4>
                                                </div>
                                            </div>
                                            <!--/ End Course Info -->
                                            <!-- Course Price -->
                                            <div class="course-price">
                                                <p>$33.50</p>
                                                <a href="#" class="btn"><i class="fa fa-users"></i>Enroll Now</a>
                                            </div>
                                            <!--/ End Course Price -->
                                        </div>
                                        <!--/ End Course Meta -->
                                    </div>
                                    <div class="col-12">
                                        <div class="content">
                                            <h2><a href="#">{!! $model->title !!}</a></h2>
                                            <p>{!! $model->body !!}</p>
                                        </div>
                                    </div>
                                    @if(count($model->classes))
                                        <div class="col-12">
                                            <div class="course-required">
                                                <h4>Classes</h4>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>View</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($model->classes as $item)
                                                        <tr>
                                                            <td>{!! $item->present()->date() !!}</td>
                                                            <td>{!! $item->present()->date('D, M j, Y',$column = 'end_date') !!}</td>
                                                            <td>View</td>
                                                            <td>
                                                                <div class="text-center">
                                                                    @if (empty(current_user()))
                                                                        <a href="" class="btn btn-default"
                                                                           data-toggle="modal"
                                                                           data-target="#modalLRForm">Register</a>
                                                                    @else
                                                                        <a href="#" class="btn btn-default"
                                                                           data-toggle="modal"
                                                                           data-target="#modalCourse"
                                                                           data-remote="false"
                                                                           data-class_id="{{ $item->id }}"
                                                                           data-title="{!! ($model->title).' - '.$item->present()->formatedDate()!!}"
                                                                           data-price="{{ !empty($item->price) ? $item->present()->price : $model->present()->price }}">Register
                                                                            course</a>
                                                                    @endif

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ End Courses -->
        </div>
    </section>
@stop