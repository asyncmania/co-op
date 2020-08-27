<?php namespace Modules\Balances\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\History\Traits\Historable;

class Balance extends Base {

    use PresentableTrait, Historable;

    protected $presenter = 'Modules\Balances\Presenters\ModulePresenter';

    protected $fillable = [
        'company_id',
        'start_date',
        'end_date',
        'particulars',
        'debit_amount',
        'credit_amount',
        'balance_type',
    ];

    public $attachments = ['image'];

}