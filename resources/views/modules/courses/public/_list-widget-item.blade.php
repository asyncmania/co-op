<div class="single-post">
    <div class="post-img">
        <img src="{!! $course->present()->thumbSrc(100,100) !!}" alt="">
    </div>
    <div class="post-info">
        <h4><a href="{!! $course->present()->url !!}">{!! $course->title!!}</a></h4>
        <p>{!! $course->present()->bodyFew('70') !!}</p>
    </div>
</div>