<?php namespace Modules\Companies\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Modules\Members\Entities\Member;

class Company extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Companies\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    public $attachments = ['image'];


    public function members(){
        return $this->hasMany(Member::class);
    }

    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }


}