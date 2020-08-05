@if($courses = Courses::all())
    <div class="row">
        <div class="col-12">
            <div class="course-slider">
                @foreach ($courses as $course)
                    @include('courses::public._list-item')
                @endforeach
            </div>
        </div>
    </div>
@endif

