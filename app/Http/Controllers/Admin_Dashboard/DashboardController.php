<?php


namespace App\Http\Controllers\Admin_Dashboard;


use App\Http\Controllers\AdminBaseController;
use App\Models\Ad;
use App\Models\Comment;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends AdminBaseController
{
    public function index(Request $request) {


		$attrs['show_in_homepage']       = 1;
		$data['all_trips_count']         = !empty(Trip::getTripsCount()) ? Trip::getTripsCount() : 0;
		$data['all_admins_count']        = !empty(User::getUsersByType('admin')) ? count(User::getUsersByType('admin')) : 0;
		$data['all_comments_count']      = !empty(Comment::getCommentsCount()) ? Comment::getCommentsCount() : 0;
		$data['trips_in_homepage_count'] = !empty(Trip::getTripsShortDetails($attrs)) ? count(Trip::getTripsShortDetails($attrs)) : 0;;


		return view('admin_dashboard.index', $data);
    }

}
