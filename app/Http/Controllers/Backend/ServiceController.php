<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Board;
use App\Model\Service;

class ServiceController extends Controller
{
	public function index()
	{
		$services = Service::where('status',1)->get();
		return view('admin.service_list_view', compact('services'));
	}
    public function add_service_view()
    {
    	$boards = Board::where('status', 1)->get();
    	return view('admin.service_add_view', compact('boards'));
    }
    
    public function insert_a_service(Request $request)
    {
    	$board_id = $request->board_id;
    	$service_name = $request->service_name;

    	try{
	    	Service::create([
	    		'board_id' => $board_id,
	    		'name' => $service_name,
	    	]);
	    	return redirect()->back()->with('success', 'Service Added Successfully');
    	}catch(Exception $e){
    		return redirect()->back()->with('danger', 'Something went wrong');
    	}

    }
}
