<?php namespace Modules\Ledgers\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Ledgers\Http\Requests\FormRequest;
use Modules\Ledgers\Imports\LedgersImport;
use Modules\Ledgers\Repositories\LedgerInterface as Repository;
use Modules\Ledgers\Entities\Ledger;

class LedgersController extends BaseAdminController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $module = $this->repository->getTable();
        $title = trans($module . '::global.group_name');
        return view('ledgers::admin.index')
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

    public function edit(Ledger $model)
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

        $model = $this->repository->create($data);

        return $this->redirect($request, $model, trans('core::global.new_record'));
    }

    public function update(Ledger $model,FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model->id;

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function bulkUpload()
    {
        try {
            $import = new LedgersImport(request()->all());
            $import->import(request()->file('file'));
            $created = $import->getRowCreatedCount();
            $updated = $import->getRowUpdatedCount();

            $message = '';
            if($created) $message .= $created.' Row(s) successfully created <br>';
            if($updated) $message .= $updated.' Row(s) successfully updated';

            return redirect()->back()->withSuccess($message);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                throw $e;
        }
    }

}
