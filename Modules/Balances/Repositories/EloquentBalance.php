<?php namespace Modules\Balances\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentBalance extends RepositoriesAbstract implements BalanceInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getForDataTable($id = null)
    {
        $module = $this->model->getTable();
        $query = $this->model
            ->join('companies', 'companies.id', '=', 'company_id')
            ->select([
                "{$module}.*",
                'companies.name as company_name'
            ]);
        if (!empty($id)) {
            $query = $query->where('company_id', $id);
        }

        return $query;
    }

}