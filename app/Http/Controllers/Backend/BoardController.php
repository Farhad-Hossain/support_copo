<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Board;

class BoardController extends Controller
{
	public function add_board_view()
	{
		return view('admin.add_board_view');
	}
	public function insert_a_board(Request $request)
	{
		try{
			Board::create([
				'name' => $request->board,
			]);
			return redirect()->back()->with('success', 'Board Added Successfully');
		}catch(Exception $e){
			return redirect()->back()->with('danger', 'Something went wrong');
		}
	}

    public function all_board(Request $request)
    {
    	$boards = Board::where('status', 1)->get();
    	return view('admin.board_list', compact('boards'));
    }

    public function edit_a_board(Request $request)
    {
    	$request->validate([
    		'board_id' => 'required|numeric',
    		'edit_board_name' => 'required',
    	]);

    	try{
	    	Board::findOrFail($request->board_id)->update([
	    		'name' => $request->edit_board_name,
	    	]);
	    	return redirect()->back()->with('success', 'Board name updated successfully');
    	}catch(Exception $e){
    		return redirect()->back()->with('danger', 'Something went wrong');
    	}
    }

    public function delete_a_board(Request $request)
    {
    	$request->validate([
    		'delete_board_input_id' => 'required|numeric',
    	]);
    	try{
    		Board::findOrFail($request->delete_board_input_id)->delete();
    		return redirect()->back()->with('success', 'Board deleted successfully');
    	}catch(Exception $e){
    		return redirect()->back()->with('danger', 'Something went wrong');
    	}
    }
}
