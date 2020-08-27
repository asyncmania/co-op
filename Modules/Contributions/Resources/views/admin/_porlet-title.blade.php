<div class="kt-portlet__head kt-portlet__head--lg">
    @include('core::admin._porlet-caption', ['module' => $module])
    <div class="kt-portlet__head-toolbar">
        <div class="kt-portlet__head-wrapper">
            @if(empty(config($module.'.hide_add_btn')))
                <div class="kt-portlet__head-actions">
                    @include($module.'::admin._button-create', ['module' => $module])

                </div>
            @endif
            {{-- @include('core::admin._button-fullscreen') --}}
        </div>
    </div>
</div>