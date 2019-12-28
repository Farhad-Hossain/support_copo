<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Board;
use App\Model\Service;
use App\Model\Enquery;

class DashboardController extends Controller
{
	public function index()
	{
		return view('index');
	}
	public function board_welcome()
	{	
		$boards = Board::where('status', 1)->get();
    	$total_enquery = count( Enquery::get() );
    	$services = Service::where('status', 1)->get();
		return view('board_welcome', compact('boards', 'services', 'total_enquery'));
	}
    public function welcome()
    {
    	$boards = Board::where('status', 1)->get();
    	$total_enquery = count( Enquery::get() );
    	$services = Service::where('status', 1)->get();
    	return view('welcome', compact('boards', 'services', 'total_enquery'));
    }
}
