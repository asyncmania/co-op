<div class='alert-danger alert error'>Please correct the errors and try
    again.
</div>

<div class='form-row'>
    <div class='col-md-12 form-group required'>
        <label class='control-label'>Name on Card</label>
        <input class='form-control' size='4' type='text'>
    </div>
</div>

<div class='form-row'>
    <div class='col-md-12 form-group required'>
        <label class='control-label'>Card Number</label>
        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
    </div>
</div>

<div class='form-row'>
    <div class='col-md-4 form-group cvc required'>
        <label class='control-label'>CVC</label>
        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
    </div>
    <div class='col-md-4 form-group expiration required'>
        <label class='control-label'> Month</label>
        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
    </div>
    <div class='col-md-4 form-group expiration required'>
        <label class='control-label'> Year</label>
        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
               type='text'>
    </div>
</div>

<div class="button payment-button">
    <button type="submit" class="btn payment-btn">Pay ${!! $class->present()->price !!}</button>
</div>
