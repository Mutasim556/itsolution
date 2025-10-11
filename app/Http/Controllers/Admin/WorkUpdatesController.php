<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Translation;
use App\Models\Admin\Work;
use App\Models\Admin\WorkPayment;
use App\Models\Admin\WorkUpdate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkUpdatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        // dd($data->all());
        $data->validate([
            'updates_note' => 'required',
            'updates_details' => 'required',
            'request_amount' => 'required_if:add_payment,on',
            'payment_last_date' => 'required_if:add_payment,on',
            'updates_file' => 'mimes:pdf,doc,docx',
        ], [
            'updates_note.required' => __('admin_local.Updates Note required'),
            'updates_details.required' => __('admin_local.Updates details required'),
            'request_amount.required_if' => __('admin_local.Request amount required'),
            'payment_last_date.required_if' => __('admin_local.Payment last date required'),
            'updates_file.mimes' => __('admin_local.Invalid file format. (pdf,doc,docx)'),
        ]);

        $newPaymentId = NULL;
        if ($data->add_payment == 'on') {
            $newPayment = new WorkPayment();
            $newPayment->work_id = $data->work_id;
            $newPayment->user_id = $data->customer_id;
            $newPayment->asking_payment = $data->request_amount;
            $newPayment->asking_payment_date     = date('Y-m-d');
            $newPayment->actual_payment = $data->paid_amount;
            $newPayment->actual_payment_date = date('Y-m-d', strtotime($data->payment_last_date));
            $newPayment->created_by = Auth::guard('admin')->user()->id;

            $newPayment->save();

            $newPaymentId = $newPayment->id;
            $updateWork = Work::findOrFail($data->work_id);
            $updateWork->total_paid += $data->paid_amount;
            $updateWork->save();
        }

        $newUpdates = new WorkUpdate();
        $newUpdates->work_id = $data->work_id;
        $newUpdates->user_id = $data->customer_id;
        $newUpdates->payment_id = $newPaymentId;
        $newUpdates->updates_details = $data->updates_details;
        $newUpdates->updates_note = $data->updates_note;
        $newUpdates->payment_id = $newPaymentId;

        $dir = getDirectoryLink('work/work-updates');
        $makeDir = createDirectory($dir);
        if ($data->updates_file) {
            $workUpdates = $data->file('updates_file');
            $fileName = 'workUpdates' . time() . '.' . $workUpdates->getClientOriginalExtension();

            $workUpdates->move($dir, $fileName);
            $fileName  =  $dir . '/' . $fileName;
            $newUpdates->updates_file = $fileName;
        }
        $newUpdates->created_by = Auth::guard('admin')->user()->id;
        $newUpdates->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $updates_details = $lang->lang != 'en' ? 'updates_details_' . $lang->lang : 'updates_details';
            $updates_note = $lang->lang != 'en' ? 'updates_note_' . $lang->lang : 'updates_note';
            if ($data->$updates_details != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\WorkUpdate',
                    'translationable_id'    => $newUpdates->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'updates_details',
                    'value'                 => $data->$updates_details,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$updates_note != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\WorkUpdate',
                    'translationable_id'    => $newUpdates->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'updates_note',
                    'value'                 => $data->$updates_note,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */

        $workUpdate = WorkUpdate::with('user', 'payment')->findOrFail($newUpdates->id);
        $workUpdate->updates_file = $workUpdate->updates_file ? '<a target="__blank" class="badge badge-info" href="' . asset($workUpdate->updates_file) . '">' . __('admin_local.View File') . '</a>' : __('admin_local.No File');
        return response([
            'workupdates' => $workUpdate,
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Updates created successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['work-updates-update', 'work-updates-delete']),
            'hasEditPermission' => hasPermission(['work-updates-update']),
            'hasDeletePermission' => hasPermission(['work-updates-delete']),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $work = Work::with('user','payments', 'workupdates')->withoutGlobalScope('translate')->findOrFail($id);
        $workUpdates = WorkUpdate::with('user', 'payment')->where([['work_id', $id], ['delete', 0]])->get();
        foreach ($workUpdates as $key => $value) {
            if ($value->updates_file) {
                $workUpdates[$key]->updates_file = '<a target="__blank" class="badge badge-info" href="' . asset($value->updates_file) . '">' . __('admin_local.View File') . '</a>';
            } else {
                $workUpdates[$key]->updates_file = __('admin_local.No File');
            }
        }

        $worPayments = WorkPayment::where([['delete',0],['work_id',$id],['actual_payment','>',0]])->get();
        return response([
            'work' => $work,
            'workupdates' => $workUpdates,
            'payments' => $worPayments,
            'hasAnyPermission' => hasPermission(['work-updates-update', 'work-updates-delete']),
            'hasEditPermission' => hasPermission(['work-updates-update']),
            'hasDeletePermission' => hasPermission(['work-updates-delete']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $workUpdates = WorkUpdate::with('user', 'payment', 'work')->withoutGlobalScope('translate')->where([['id', $id], ['delete', 0]])->first();
        return $workUpdates;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'updates_note' => 'required',
            'updates_details' => 'required',
            'request_amount' => 'required_if:add_payment,on',
            'payment_last_date' => 'required_if:add_payment,on',
            'updates_file' => 'mimes:pdf,doc,docx',
        ], [
            'updates_note.required' => __('admin_local.Updates Note required'),
            'updates_details.required' => __('admin_local.Updates details required'),
            'request_amount.required_if' => __('admin_local.Request amount required'),
            'payment_last_date.required_if' => __('admin_local.Payment last date required'),
            'updates_file.mimes' => __('admin_local.Invalid file format. (pdf,doc,docx)'),
        ]);
        $workUpdates = WorkUpdate::findOrFail($id);

        $newPaymentId = NULL;
        if ($data->add_payment == 'on') {
            if (WorkPayment::findOrFail($workUpdates->payment_id)) {
                $updatePayment = WorkPayment::findOrFail($workUpdates->payment_id);
                $updatePayment->asking_payment = $data->request_amount;
                $updatePayment->asking_payment_date =  $updatePayment->asking_payment_date ? $updatePayment->asking_payment_date : date('Y-m-d');
                $wPyament = $data->paid_amount - $updatePayment->actual_payment;
                $updatePayment->actual_payment = $data->paid_amount;
                $updatePayment->actual_payment_date = date('Y-m-d', strtotime($data->payment_last_date));
                $updatePayment->updated_by = Auth::guard('admin')->user()->id;
                $updatePayment->save();

                $updateWork = Work::findOrFail($workUpdates->work_id);
                $updateWork->total_paid += $wPyament;
                $updateWork->save();
            } else {

                $newPayment = new WorkPayment();
                $newPayment->work_id = $workUpdates->work_id;
                $newPayment->user_id = $workUpdates->user_id;
                $newPayment->asking_payment = $data->request_amount;
                $newPayment->asking_payment_date = date('Y-m-d');
                $newPayment->actual_payment = $data->paid_amount;
                $newPayment->actual_payment_date = date('Y-m-d', strtotime($data->payment_last_date));
                $newPayment->created_by = Auth::guard('admin')->user()->id;

                $newPayment->save();

                $newPaymentId = $newPayment->id;
                $updateWork = Work::findOrFail($workUpdates->work_id);
                $updateWork->total_paid += $data->paid_amount;
                $updateWork->save();
            }
        }

        $workUpdates->updates_details = $data->updates_details;
        $workUpdates->updates_note = $data->updates_note;
        $workUpdates->payment_id = $newPaymentId != NULL ? $newPaymentId : $workUpdates->payment_id;

        $dir = getDirectoryLink('work/work-updates');
        $makeDir = createDirectory($dir);
        if ($data->updates_file) {
            $workUpdatesFile = $data->file('updates_file');
            $fileName = 'workUpdates' . time() . '.' . $workUpdatesFile->getClientOriginalExtension();

            $workUpdatesFile->move($dir, $fileName);
            $fileName  =  $dir . '/' . $fileName;
            $workUpdates->updates_file = $fileName;
        }
        $workUpdates->updated_by = Auth::guard('admin')->user()->id;
        $workUpdates->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $updates_details = $lang->lang != 'en' ? 'updates_details_' . $lang->lang : 'updates_details';
            $updates_note = $lang->lang != 'en' ? 'updates_note_' . $lang->lang : 'updates_note';
            if ($data->$updates_details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\WorkUpdate',
                    'translationable_id'    => $workUpdates->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'updates_details',
                ], [
                    'value'                 => $data->$updates_details,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$updates_note != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\WorkUpdate',
                    'translationable_id'    => $workUpdates->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'updates_note',
                ], [
                    'value'                 => $data->$updates_note,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }
        $workUpdates = WorkUpdate::with('user', 'payment')->where([['id', $id], ['delete', 0]])->first();
        if ($workUpdates->updates_file) {
            $workUpdates->updates_file = '<a target="__blank" class="badge badge-info" href="' . asset($workUpdates->updates_file) . '">' . __('admin_local.View File') . '</a>';
        } else {
            $workUpdates->updates_file = __('admin_local.No File');
        }
        return response([
            'work' => $workUpdates,
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Upadated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workUpdates = WorkUpdate::with('payment','work')->findOrFail($id);
        if ($workUpdates->payment) {
            $workUpdates->work->update([
                'total_paid'=>  $workUpdates->work->total_paid-$workUpdates->payment->actual_payment,
            ]);
            $workUpdates->payment->update([
                'delete'=>1,
            ]);
        }
        $workUpdates->delete = 1;
        $workUpdates->updated_at = Carbon::now();
        $workUpdates->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Updates deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }
}
