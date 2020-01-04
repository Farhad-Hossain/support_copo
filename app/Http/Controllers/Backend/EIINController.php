<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EIINController extends Controller
{
    public function index()
    {
    	return view('admin.eiin_list');
    }
}
