<div class="row">
    <div class="col-lg-10 offset-lg-1 col-12">
        <div class="faq-content">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                @foreach ($models as $model)
                        @include('faqs::public._list-item')
                @endforeach
            </div>
        </div>
    </div>
</div>

