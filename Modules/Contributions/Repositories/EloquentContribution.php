<?php namespace Modules\Contributions\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentContribution extends RepositoriesAbstract implements ContributionInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getForDataTable($id = null)
    {
        $query = $this->model
            ->join('members','members.id', '=', 'member_id')
            ->select([
                'contributions.*',
                'members.name as member_name'
            ]);

        $query = $query->whereHas('member',function($query) use($id){
            $query->whereHas('company', function($query) use($id){
                $query->where('id',$id);
            });
        });

        return $query;
    }

}