@if($courses  = Courses::all())
    <div class="single-widget posts">
        <h3>Other <span>Courses</span></h3>
        @foreach($courses as $course)
            @if(!empty($model))
                @if($course->slug != $model->slug)
                    @include('courses::public._list-widget-item')
                @endif
            @else
                @include('courses::public._list-widget-item')
            @endif
        @endforeach
    </div>
@endif