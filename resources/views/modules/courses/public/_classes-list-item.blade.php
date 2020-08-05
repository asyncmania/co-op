<div class="class-item row">
    <div class="class-item-col col-md-2">
        <div class="class-item-title">Instructor</div>
        <div class="class-item-content instructor text-center">
            @include('courses::public._class-instructor',['model'=>!empty($class->instructor) ? $class : $class->course])
        </div>
    </div>
    <div class="class-item-col col-md-3">
        <div class="class-item-title">Description</div>
        <div class="class-item-content">
            {!! $class->body !!}
        </div>
    </div>
    <div class="class-item-col col-md-3">
        <div class="class-item-title">Date</div>
        <div class="class-item-content">
            {!! $class->present()->formatedDate() !!}
        </div>
    </div>
    <div class="class-item-col col-md">
        <div class="class-item-title">Price</div>
        <div class="class-item-content price">
            ${!! $class->present()->price !!}
        </div>
    </div>
    @if(empty($checkout))
        <div class="class-item-col col-md">
            <div class="class-item-title"></div>
            <div class="class-item-content button">
                {{Form::open(['route'=>'cart.add','class'=>'add-to-cart-form'])}}
                    {{Form::hidden('class_id',$class->id)}}
                    <button type="submit" class="btn add-to-cart-button">Register</button>
                {{Form::close()}}
            </div>
        </div>
    @endif
</div>