<?php namespace Modules\Contributions\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Contribution extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Contributions\Presenters\ModulePresenter';

    protected $fillable = [
        'member_id',
        'contribution_date',
        'particulars',
        'type',
        'debit_amount',
        'credit_amount',
        'balance',
    ];

    public $attachments = ['image'];

    public function getContributionDateAttribute($value)
    {
        return format_date($value);
    }

    public function setContributionDateAttribute($value)
    {
        $this->attributes['contribution_date'] = unformat_date($value);
    }

}