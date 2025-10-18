<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Work;
use App\Models\Admin\WorkPayment;
use App\Models\Admin\WorkUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Vinkla\Hashids\Facades\Hashids;

class UserProfileController extends Controller
{
    public function userProfile(){
        $works = Work::where([['status',1],['delete',0],['user_id',Auth::user()->id]])->get();
        return view('frontend.pages.user.profile',compact('works'));
    }

    public function getWorkUpdates(string $id){
        if(request()->ajax()){
            $workId = Hashids::decode($id);
            if($workId[0]){
                $work = Work::where([['status',1],['delete',0],['id',$workId[0]]])->first();
                if($work){
                    $workUpdates = WorkUpdate::with('payment')->where([['status',1],['delete',0],['work_id',$workId[0]]])->get();
                    foreach ($workUpdates as $key => $value) {
                        $workUpdates[$key]->updates_file = $value->updates_file?asset($value->updates_file):'';
                        // $workUpdates[$key]->hash_id = Hashids::encode($value->id);
                    }
                    // dd($workUpdates);
                    return $workUpdates;
                }
            }

        }

    }
    public function getWorkPayments(string $id){
        // dd($id);
        if(request()->ajax()){
            $workId = Hashids::decode($id);
            if($workId[0]){
                $work = Work::where([['status',1],['delete',0],['id',$workId[0]]])->first();
                if($work){
                    $workPayments = WorkPayment::with('work','admin')->where([['status',1],['delete',0],['work_id',$workId[0]],['actual_payment','>',0]])->get();
                    return $workPayments;
                }
            }

        }

    }

    public function updatesFeedback(Request $data , string $id){
        $work = WorkUpdate::where([['status',1],['delete',0],['id',$id]])->update([
            'customer_feedback'=>$data->customer_feedback,
        ]);

        return [
            'success'=>1,
        ];
    }
}
