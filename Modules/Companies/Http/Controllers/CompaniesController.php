<?php namespace Modules\Companies\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Companies\Http\Requests\FormRequest;
use Modules\Companies\Repositories\CompanyInterface as Repository;
use Modules\Companies\Entities\Company;
use Modules\Users\Repositories\RoleInterface;
use Modules\Users\Repositories\UserInterface;

class CompaniesController extends BaseAdminController
{

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $module = $this->repository->getTable();
        $title = trans($module . '::global.group_name');
        return view('core::admin.index')
            ->with(compact('title', 'module'));
    }

    public function create()
    {
        $module = $this->repository->getTable();
        $form = $this->form(config($module . '.form'), [
            'method' => 'POST',
            'url' => route('admin.' . $module . '.store')
        ]);
        return view('core::admin.create')
            ->with(compact('module', 'form'));
    }

    public function edit(Company $model)
    {
        $module = $model->getTable();
        $form = $this->form(config($module . '.form'), [
            'method' => 'PUT',
            'url' => route('admin.' . $module . '.update', $model),
            'model' => $model
        ]);
        return view('core::admin.edit')
            ->with(compact('model', 'module', 'form'));
    }

    public function store(FormRequest $request, UserInterface $user_repo, RoleInterface $role_repo)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();

            $model = $this->repository->create($data);

            $user_data = [
                'first_name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['email'],
                'last_name' => $data['registration_number'],
                'password' => $data['registration_number']
            ];

            $role = $role_repo->findByName('Company');

            $user = $user_repo->createWithRoles($user_data, [$role->id], true);

            $model->users()->attach($user->id);

            DB::commit();

            return $this->redirect($request, $model, trans('core::global.new_record'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withError('User Already exist with the email address');
        }
    }

    public function show($model = null)
    {
        $module = 'companies';
        $view = is_admin_role() ? 'show' : 'show_profile';
        $model = empty($model) ? $this->company : $model;
        return view('companies::admin.' . $view)
            ->with(compact('model', 'module'));
    }

    public function update(Company $model, FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model->id;

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function editProfile()
    {
        $model = current_user_company();
        $module = $model->getTable();
        $form = $this->form(config($module . '.form'), [
            'method' => 'PUT',
            'url' => route('admin.' . $module . '.update_profile', $model),
            'model' => $model
        ]);
        return view('core::admin.edit')
            ->with(compact('model', 'module', 'form'));
    }

    public function updateProfile(FormRequest $request)
    {
        $data = $request->all();

        $model = current_user_company();

        $data['id'] = $model->id;

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

}
