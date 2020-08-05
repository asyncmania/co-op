<?php namespace Modules\Companies\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Company extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Companies\Presenters\ModulePresenter';

    protected $guarded = ['_token','exit'];

    public $attachments = ['image'];

}