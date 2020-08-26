<?php namespace Modules\Dashboard\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Nwidart\Modules\Routing\Controller;

class DashboardController extends Controller {

    public function __construct()
    {
        $this->middleware('auth.admin');
    }

	public function index()
	{
	    $view = is_admin_role() ? 'index' : 'index_company';
		return view('dashboard::'.$view);
	}

}