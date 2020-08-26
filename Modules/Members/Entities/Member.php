<?php namespace Modules\Members\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\Companies\Entities\Company;

class Member extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Members\Presenters\ModulePresenter';

    protected $fillable = [
         'company_id',
         'name',
         'email',
         'phone',
         'dob',
         'gender',
         'occupation',
         'address',
         'status',
    ];

    public $attachments = ['image'];


    public function company(){
        return $this->belongsTO(Company::class);
    }

}