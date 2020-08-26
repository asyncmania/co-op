@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="{{route("admin.$module.index")}}"
       class="kt-subheader__breadcrumbs-link">@Lang($module . '::global.name')</a>
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
        @if(empty($model))
            @Lang($module . '::global.new')
        @else
            @Lang($module . '::global.edit')
        @endif
    </a>
@stop
{!! form_start($form,['id'=>'form-validate']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    {{--<ul class="nav nav-tabs nav-tabs-line-2x nav-tabs-line nav-tabs-line-primary">
        <li class="nav-item">
            <a href="#tab_1" data-toggle="tab" class="nav-link active">
                Basic Information </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
        </div>
    </div>--}}
    {!! form_rest($form) !!}
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}