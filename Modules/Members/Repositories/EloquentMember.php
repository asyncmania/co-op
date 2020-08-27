<?php namespace Modules\Members\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;
use Modules\Members\Entities\Member;

class EloquentMember extends RepositoriesAbstract implements MemberInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function latest($number = 10, array $with = array())
    {
        $query = $this->make($with)->whereHas('company',function($query){
            $query->where('id',current_user_company()->id);
        });
        return $query->order()->take($number)->get();
    }

    public function getForDataTable($id = null)
    {
        //$selectArray  = config(str_replace('_','',$this->model->getTable()) . '.th');
        $selectArray = config($this->model->getTable() . '.th');
        $selectArray[] = 'id';
        $query = $this->model->select($selectArray);
        $query = $query->where('company_id',$id);

        return $query;
    }

}