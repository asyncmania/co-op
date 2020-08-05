<div class="row">
    @foreach ($models as $course)
        <div class="col-lg-4 col-md-6 col-12">
            @include('courses::public._list-item')
        </div>
    @endforeach
</div>

