<?php namespace Modules\Ledgers\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\Members\Entities\Member;

class Ledger extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Ledgers\Presenters\ModulePresenter';

    protected $fillable = [
        'member_id',
        'start_date',
        'end_date',
        'thrift_savings',
        'share_capital',
        'loan_balance',
        'loan_interest'
    ];

    public $attachments = ['image'];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function getStartDateAttribute($value)
    {
        return format_date($value);
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = unformat_date($value);
    }

    public function getEndDateAttribute($value)
    {
        return format_date($value);
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = unformat_date($value);
    }

}