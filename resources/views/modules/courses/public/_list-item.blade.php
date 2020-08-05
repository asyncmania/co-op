<div class="single-course">
    <div class="course-head overlay">
        <img src="{!! $course->present()->thumbSrc(371,250) !!}" alt="{{$course->title}}">
        <a href="{{$course->present()->url}}" class="btn"><i class="fa fa-link"></i></a>
    </div>
    <div class="single-content">
        <h4>
            <a href="{{$course->present()->url}}">
                {{--<span>Science</span>--}}
                {!! $course->title !!}
            </a>
        </h4>
        <p>{!! $course->present()->bodyFew(250) !!}</p>
    </div>
    <div class="course-meta">
        <div class="meta-left">
            {{--<span><i class="fa fa-users"></i>36 Seat</span>--}}
            <span><i class="fa fa-clock-o"></i>{!! $course->present()->duration !!}</span>
        </div>
        <span class="price">{{config('myapp.currency','$').$course->present()->price}}</span>
    </div>
</div>