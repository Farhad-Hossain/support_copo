<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Enquery;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){
    	$today_total_pendings = Enquery::where('created_at', '>', Carbon::today())
    										->where('status', 0)
    										->orderBy('id', 'desc')->get()->count();
		$today_total_successes = Enquery::where('created_at', '>', Carbon::today())
    										->where('status', 2)
    										->orderBy('id', 'desc')->get()->count();
		$today_total_sent_sms = Enquery::where('created_at', '>', Carbon::today())
    										->where('status', 1)
    										->orderBy('id', 'desc')->get()->count();



    	$archieved_total_pendings = Enquery::where('created_at', '<', Carbon::today())
    										->where('status', 0)
    										->orderBy('id', 'desc')->get()->count();
		$archieved_total_successes = Enquery::where('created_at', '<', Carbon::today())
    										->where('status', 2)
    										->orderBy('id', 'desc')->get()->count();
		$archieved_total_sent_sms = Enquery::where('created_at', '<', Carbon::today())
    										->where('status', 1)
    										->orderBy('id', 'desc')->get()->count();
    	return view('admin.index', compact('today_total_pendings', 'today_total_successes', 'today_total_sent_sms', 'archieved_total_pendings', 'archieved_total_successes', 'archieved_total_sent_sms' ));
    }
}
