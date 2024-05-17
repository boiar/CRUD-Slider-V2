<?php

namespace App\Http\Controllers\Admin_Dashboard;

use App\Helpers\ImgHelper;
use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAdminRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends AdminBaseController
{

    public function index()
    {
        $users= User::getUsersByType('admin', []);
        return view('admin_dashboard.admins.index')->with(['admins'=> $users]);
    }


    public function saveAdmin(SaveAdminRequest $request, $adminId = null) {

        $data['user_name']          = $request->user_name;
        $data['user_email']         = $request->user_email;
		$data['user_type']          = 'admin';
		$data['user_id'] 			= $adminId;


        if(!empty($request->password)){
            $data['password'] = bcrypt($request->password);
        }

		$session_msg = !is_null($adminId) ? 'site.updated_successfully' : 'site.created_successfully';
		session()->flash('success', __($session_msg));
		User::saveAdminData($data);
        return redirect(route('admin.index'));
    }

    public function getAdmin($adminId = null) {

		$data = [];
		//edit
        if (!is_null($adminId)){
            $admin = User::getUserById($adminId);
            if (is_null($admin)) {
                session()->flash('warning', __('site_admin.admin_id_not_valid'));
                return redirect(route('admin.index'));
            }
			$data['admin'] = $admin;
        }

        return view('admin_dashboard.admins.save')->with($data);
    }



    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return back();
    }


}
