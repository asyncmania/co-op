<?php namespace Modules\Ledgers\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentLedger extends RepositoriesAbstract implements LedgerInterface
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
                'ledgers.*',
                'members.name as member_name'
            ]);

        return $query;
    }

}