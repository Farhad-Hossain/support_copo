<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Enquery;
use App\Model\EnqueryTrash;
use Carbon\Carbon;
use Auth;

class EnqueryController extends Controller
{
    public function today_enquery()
    {
    	$enqueries = Enquery::where('created_at', '>', Carbon::today())->orderBy('id', 'desc')->paginate(10);
    	return view('admin.todays_enquery', compact('enqueries'));
    }
    public function archived_enqueries()
    {
    	$enqueries_before_today = Enquery::where('created_at', '<', Carbon::today())->orderBy('id','desc')->paginate(10);
    	return view('admin.archieved_enquries', compact('enqueries_before_today') );
    }
    public function trashed_enqueries()
    {
        $trashed_enqueries = EnqueryTrash::orderBy('id','desc')->paginate(10);
        return view('admin.trashed_enqueries', compact('trashed_enqueries') );
    }

    public function send_feedback_sms_to_client(Request $request)
    {
        $validated_data = $request->validate([
            'enquery_id' => 'required|numeric',
            'phone' => 'required|numeric',
            'sms_content' => 'required'
        ]);
        try{
            $message_content = $request->sms_content;
            $phone = $request->phone;

            if($phone[0] == '1' && strlen($phone) == 10){
                $phone = '880'.$phone;
            }else if( $phone[0] == '0' && strlen($phone) == 11 ){
                $phone = '88'.$phone;
            }else if( $phone[0] == 8 && $phone[1] == '8' ){
                $phone = $phone;
            }

            $client = new \GuzzleHttp\Client();
            $api = "http://api.infobip.com/api/v3/sendsms/plain?user=bisectg&password=hgg66frrrs&sender=".'+8804445699999'."&SMSText=".$message_content."&GSM=".$phone;
            
            $response = $client->request('POST', $api);

            $response->getBody();

            $enquery = Enquery::findOrFail($request->enquery_id);
            $enquery->update([
                'feedback_message' => $request->sms_content,
                'actioned_by' => Auth::user()->id,
                'status' => 1,
            ]);

            return redirect()->back()->with('success', 'Feedback sent by Sms');
        }catch(Exception $e){
            return redirect()->back()->with('danger', 'Something went wrong');
        }
    }

    public function make_enquery_done(Request $request)
    {
        $request->validate([
            'enquery_id' => 'required|numeric',
        ]);
        $enquery = Enquery::findOrFail($request->enquery_id);
        
        try{
            $enquery->update([
                'actioned_by' => Auth::user()->id,
                'status' => 2, //done status
            ]);
            return redirect()->back()->with('success', 'This work done !');
        }catch(Exception $e){
            return redirect()->back()->with('danger', 'Something went wrong');
        }
    }
    public function send_enquery_to_trash(Request $request)
    {
        
        $enquery = Enquery::findOrFail($request->enquery_id)->toArray();
        $request->validate([
            'enquery_id' => 'required|numeric'
        ]);

        try{
            EnqueryTrash::insert($enquery);
            Enquery::find($request->enquery_id)->delete();
            return redirect()->back()->with('success', 'Moved to trash');
        }catch(Exception $e){
            return redirect()->back()->with('danger', 'Something went wrong');
        }
    }
}
