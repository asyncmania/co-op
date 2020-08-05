<div class="checkout-item-title">
    <h3>Update Information</h3>
    <p class="mb-4">Enter your card details below or pay with paypal</p>
</div>
<div class="form">
    <div class="form-row">
        <div class="col">{!! form_row($register_form->first_name) !!}</div>
        <div class="col">{!! form_row($register_form->last_name) !!}</div>
    </div>
    <div class="form-row">
        <div class="col">{!! form_row($register_form->phone) !!}</div>
        <div class="col"> {!! form_row($register_form->email,['attr'=>['disabled']]) !!}</div>
    </div>
    <div class="form-row">
        <div class="col">{!! form_row($register_form->address) !!}</div>
    </div>
</div>