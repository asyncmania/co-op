<?php namespace Modules\Members\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\Companies\Entities\Company;

class Member extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Members\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    public $attachments = ['image'];


    public function company(){
        return $this->belongsTO(Company::class);
    }

}