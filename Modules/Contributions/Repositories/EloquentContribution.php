<?php namespace Modules\Contributions\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentContribution extends RepositoriesAbstract implements ContributionInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getForDataTable()
    {

        $query = $this->model
            ->join('members','members.id', '=', 'member_id')
            ->select([
                'contributions.*',
                'members.name as member_name'
            ]);

        return $query;
    }

}