<?php namespace Modules\Companies\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentCompany extends RepositoriesAbstract implements CompanyInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}