<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Enquery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnqueryController extends Controller
{
    public function insert_user_enqury(Request $request)
    {
    	$name = $request->name;
    	$email = $request->email;
    	$phone = $request->number;
    	$board = $request->board;
    	$eiin = $request->eiin;
        $eiin_password = $request->eiin_password;
        $student_reg = $request->student_reg;
    	$service_name = $request->service_name;
    	$doc1 = $request->doc1 ?? 'n/A';
    	$doc2 = $request->doc2 ?? 'n/A';
    	$message = $request->message;

        // dd($request);

        
        try{
            if( $request->doc1 ){
                $fileName1 = 'doc1'.time().'.'.request()->doc1->getClientOriginalExtension();
                Storage::disk('public')->putFileAs("documents/", $request->doc1, $fileName1);
            }
            if( $request->doc2 ){
                $fileName2 = 'doc2'.time().'.'.request()->doc2->getClientOriginalExtension();
                Storage::disk('public')->putFileAs("documents/", $request->doc2, $fileName2);
            }
        	Enquery::create([
        		'name' => $name,
        		'phone' => $phone,
        		'email' => $email,
        		'board' => $board,
        		'eiin' => $eiin,
                'eiin_password' => $eiin_password,
                'student_reg' => $student_reg,
        		'service' => $service_name,
        		'doc1' =>  $fileName1 ?? 'n/a',
        		'doc2' => $fileName2 ?? 'n/a',
                'enquery_from' => 1,
        		'message' => $message
        	]);

            
        }catch(Exception $e){
            return redirect()->back()->with('danger', 'Something went wrong');            
        }

    	return redirect()->back()->with('success', 'Submited succesfully, We will contact with you soon,');
    }
}
