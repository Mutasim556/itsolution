<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Translation;
use App\Models\Admin\Work;
use App\Models\Admin\WorkPayment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:work-index,admin');
        $this->middleware('permission:work-store,admin')->only('store');
        $this->middleware('permission:work-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:work-delete,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::with('user')->where([['delete', 0]])->orderBy('id', 'DESC')->get();
        return view('backend.blade.work.index', compact('works'));
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
        $data->validate([
            'work_title' => 'required',
            'work_details' => 'required',
            'duration' => 'required',
            'total_cost' => 'required',
            'progress' => 'required',
            'customer_phone' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'project_file' => 'mimes:pdf,doc,docx',
        ], [
            'work_title.required' => __('admin_local.Work title required'),
            'work_details.required' => __('admin_local.Work details required'),
            'duration.required' => __('admin_local.Duration required'),
            'total_cost.required' => __('admin_local.Total cost required'),
            'progress.required' => __('admin_local.Progress required'),
            'customer_phone.required' => __('admin_local.Customer phone required'),
            'customer_name.required' => __('admin_local.Customer name required'),
            'customer_address.required' => __('admin_local.Customer address required'),
            'project_file.mimes' => __('admin_local.Invalid file format. (pdf,doc,docx)'),
        ]);


        $user = User::where('phone', $data->customer_phone)->first();

        if ($user) {
            $data->validate([
                'customer_email' => 'unique:users,email,'.$user->id,
            ], [
                'customer_email.unique' => __('admin_local.This email already used'),
            ]);
            $user->update([
                'name'    => $data->customer_name,
                // 'username'    => \Str::slug($data->customer_name).rand(10000,99999),
                'email'   => $data->customer_email,
                'address' => $data->customer_address,
            ]);
        } else {
            $data->validate([
                'customer_email' => 'unique:users,email',
            ], [
                'customer_email.unique' => __('admin_local.This email already used'),
            ]);
            $user = User::create([
                'phone'    => $data->customer_phone,
                'name'     => $data->customer_name,
                'username'     => \Str::slug($data->customer_name) . rand(10000, 99999),
                'email'    => $data->customer_email,
                'address'  => $data->customer_address,
                'password' => Hash::make('123456'),
            ]);
        }

        $newWork = new Work();
        $newWork->work_title = $data->work_title;
        $newWork->user_id = $user->id;
        $newWork->work_details = $data->work_details;
        $newWork->duration = $data->duration;
        $newWork->total_cost = $data->total_cost;
        $newWork->total_paid = $data->total_paid;
        $newWork->progress = $data->progress;
        $newWork->progress_status = $data->progress_status;
        $newWork->status = $data->work_status;

        $dir = getDirectoryLink('work/work-files');
        $makeDir = createDirectory($dir);
        if ($data->work_file) {
            $workFile = $data->file('work_file');
            $fileName = 'workFile' . time() . '.' . $workFile->getClientOriginalExtension();

            $workFile->move($dir, $fileName);
            $fileName  =  $dir . '/' . $fileName;
            $newWork->work_file = $fileName;
            // dd($newWork->work_file);
        }
        // dd($data->all());
        $newWork->save();

        if ($data->total_paid > 0) {
            $newWorkPayment = new WorkPayment();
            $newWorkPayment->work_id = $newWork->id;
            $newWorkPayment->user_id = $user->id;
            $newWorkPayment->asking_payment = $data->total_paid;
            $newWorkPayment->asking_payment_date = date('Y-m-d');
            $newWorkPayment->actual_payment = $data->total_paid;
            $newWorkPayment->actual_payment_date = date('Y-m-d');
            $newWorkPayment->created_by = Auth::guard('admin')->user()->id;
            $newWorkPayment->updated_by = Auth::guard('admin')->user()->id;

            $newWorkPayment->save();
        }

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $work_title = $lang->lang != 'en' ? 'work_title_' . $lang->lang : 'work_title';
            $work_details = $lang->lang != 'en' ? 'work_details_' . $lang->lang : 'work_details';
            if ($data->$work_title != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Work',
                    'translationable_id'    => $newWork->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'work_title',
                    'value'                 => $data->$work_title,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$work_details != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Work',
                    'translationable_id'    => $newWork->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'work_details',
                    'value'                 => $data->$work_details,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */

        $currentWork = Work::with('user', 'payments')->findOrFail($newWork->id);
        if ($currentWork->payment_status == 0) {
            $currentWork->payment_status = "<span class='badge badge-danger'>" . __('admin_local.Unpaid') . "</span>";
        } elseif ($currentWork->payment_status == 1) {
            $currentWork->payment_status = "<span class='badge badge-warning'>" . __('admin_local.Partially Paid') . "</span>";
        } else {
            $currentWork->payment_status = "<span class='badge badge-success'>" . __('admin_local.Paid') . "</span>";
        }
        return response([
            'work' => $currentWork,
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Work posted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['work-update', 'work-delete']),
            'hasEditPermission' => hasPermission(['work-update']),
            'hasDeletePermission' => hasPermission(['work-delete']),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $phone)
    {
        $user = User::where([['status', 1], ['delete', 0], ['phone', 'like', "%$phone%"]])->first();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $work = Work::with('user')->withoutGlobalScope('translate')->findOrFail($id);
        return response($work);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'work_title' => 'required',
            'work_details' => 'required',
            'duration' => 'required',
            'total_cost' => 'required',
            'progress' => 'required',
            'customer_phone' => 'required',
            'customer_name' => 'required',
            'customer_address' => 'required',
            'project_file' => 'mimes:pdf,doc,docx',
        ], [
            'work_title.required' => __('admin_local.Work title required'),
            'work_details.required' => __('admin_local.Work details required'),
            'duration.required' => __('admin_local.Duration required'),
            'total_cost.required' => __('admin_local.Total cost required'),
            'progress.required' => __('admin_local.Progress required'),
            'customer_phone.required' => __('admin_local.Customer phone required'),
            'customer_name.required' => __('admin_local.Customer name required'),
            'customer_address.required' => __('admin_local.Customer address required'),
            'project_file.mimes' => __('admin_local.Invalid file format. (pdf,doc,docx)'),
        ]);


        $user = User::where('phone', $data->customer_phone)->first();

        if ($user) {
            $user->update([
                'name'    => $data->customer_name,
                // 'username'    => \Str::slug($data->customer_name).rand(10000,99999),
                'email'   => $data->customer_email,
                'address' => $data->customer_address,
            ]);
        } else {
            $user = User::create([
                'phone'    => $data->customer_phone,
                'name'     => $data->customer_name,
                'username'     => \Str::slug($data->customer_name) . rand(10000, 99999),
                'email'    => $data->customer_email,
                'address'  => $data->customer_address,
                'password' => Hash::make('123456'),
            ]);
        }

        $newWork = Work::findOrFail($id);
        $newWork->work_title = $data->work_title;
        $newWork->user_id = $user->id;
        $newWork->work_details = $data->work_details;
        $newWork->duration = $data->duration;
        $newWork->total_cost = $data->total_cost;
        $newWork->total_paid = $data->total_paid;
        $newWork->progress = $data->progress;
        $newWork->progress_status = $data->progress_status;
        $newWork->status = $data->work_status;

        $dir = getDirectoryLink('work/work-files');
        $makeDir = createDirectory($dir);
        if ($data->work_file) {
            $workFile = $data->file('work_file');
            $fileName = 'workFile' . time() . '.' . $workFile->getClientOriginalExtension();

            $workFile->move($dir, $fileName);
            $fileName  =  $dir . '/' . $fileName;
            $newWork->work_file = $fileName;
            // dd($newWork->work_file);
        }
        // dd($data->all());
        $newWork->save();

        if ($data->total_paid > 0) {
            $newWorkPayment = WorkPayment::where('work_id', $id)->firstOrFail();
            $newWorkPayment->work_id = $newWork->id;
            $newWorkPayment->user_id = $user->id;
            $newWorkPayment->asking_payment = $data->total_paid;
            $newWorkPayment->asking_payment_date = date('Y-m-d');
            $newWorkPayment->actual_payment = $data->total_paid;
            $newWorkPayment->actual_payment_date = date('Y-m-d');
            $newWorkPayment->updated_by = Auth::guard('admin')->user()->id;
            $newWorkPayment->save();
        }



        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $work_title = $lang->lang != 'en' ? 'work_title_' . $lang->lang : 'work_title';
            $work_details = $lang->lang != 'en' ? 'work_details_' . $lang->lang : 'work_details';
            if ($data->$work_title != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Work',
                    'translationable_id'    => $newWork->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'work_title',
                ], [
                    'value'                 => $data->$work_title,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$work_details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Work',
                    'translationable_id'    => $newWork->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'work_details',
                ], [
                    'value'                 => $data->$work_details,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }

        $updatedWork = Work::with('user')->findOrFail($id);
        $updatedWork->work_file = $updatedWork->work_file ? '<a target="__blank" class="badge badge-info" href="' . asset($updatedWork->work_file) . '">' . __('admin_local.View File') . '</a>' : '<span class="badge badge-danger"' . __('admin_local.No File') . '</span>';

        $updatedWork->payment_status =  $updatedWork->payment_status == 0 ? '<span class="badge badge-danger">' . __('admin_local.Unpaid') . '</span>' : ($updatedWork->payment_status == 1 ? '<span class="badge badge-warning">' . __('admin_local.Partially Paid') . '</span>' : '<span class="badge badge-success">' . __('admin_local.Paid') . '</span>');

        return response([
            'work' => $updatedWork,
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Work updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work = Work::findOrFail($id);
        $work->delete = 1;
        $work->updated_at = Carbon::now();
        $work->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Work deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Work::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $work = Work::where('id', $data->id)->first();
        return $work;
    }
}
