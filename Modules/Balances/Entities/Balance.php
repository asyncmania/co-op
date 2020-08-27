<?php namespace Modules\Balances\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Balance extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Balances\Presenters\ModulePresenter';

    protected $fillable = [
        'company_id',
        'start_date',
        'end_date',
        'particulars',
        'debit_amount',
        'credit_amount',
    ];

    public $attachments = ['image'];

}