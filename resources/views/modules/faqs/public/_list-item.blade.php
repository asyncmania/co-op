<div class="panel panel-default">
    <div class="faq-heading"  id="faq-title-{{$model->id}}">
        <h4 class="faq-title">
            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#faq-{{$model->id}}">{{$model->question}}</a>
        </h4>
    </div>
    <div id="faq-{{$model->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faq-title-{{$model->id}}">
        <div class="faq-body">
            {!! $model->answer !!}
        </div>
    </div>
</div>