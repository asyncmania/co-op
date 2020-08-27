<?php namespace Modules\Balances\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Balances\Http\Requests\FormRequest;
use Modules\Balances\Repositories\BalanceInterface as Repository;
use Modules\Balances\Entities\Balance;
use Modules\Balances\Imports\BalancesImport;
use Yajra\DataTables\DataTables;

class BalancesController extends BaseAdminController {

    protected $import = BalancesImport::class;

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $module = $this->repository->getTable();
        $title = trans($module . '::global.group_name');
        return view($module.'::admin.index')
            ->with(compact('title', 'module'));
    }

    public function create()
    {
        $module = $this->repository->getTable();
        $form = $this->form(config($module.'.form'), [
            'method' => 'POST',
            'url' => route('admin.'.$module.'.store')
        ]);
        return view('core::admin.create')
            ->with(compact('module','form'));
    }

    public function edit(Balance $model)
        {
            $module = $model->getTable();
            $form = $this->form(config($module.'.form'), [
                'method' => 'PUT',
                'url' => route('admin.'.$module.'.update',$model),
                'model'=>$model
            ]);
            return view('core::admin.edit')
                ->with(compact('model','module','form'));
        }

    public function store(FormRequest $request)
    {
        $data = $request->all();

        $data['company_id'] = !empty($this->company) ? $this->company->id : 0;

        $model = $this->repository->create($data);

        return $this->redirect($request, $model, trans('core::global.new_record'));
    }

    public function update(Balance $model,FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model->id;

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function dataTable()
    {
        $id = request()->get('id');

        if(!empty($this->company)) $id = $this->company->id;

        $model = !empty($id) ? $this->repository->getForDatatable($id) : $this->repository->getForDatatable();

        $model_table = $this->repository->getTable();

        return Datatables::of($model)
            ->addColumn('action', $model_table . '::admin._table-action')
            ->editColumn('status', function($row) {
                $html = '';
                $html .= status_label($row->status);

                return $html;
            })
            ->editColumn('balance_type', function($row) {
                return config('balances.types.'.$row->balance_type);
            })
            ->escapeColumns(['action'])
            ->removeColumn('id')
            ->make();
    }

}
