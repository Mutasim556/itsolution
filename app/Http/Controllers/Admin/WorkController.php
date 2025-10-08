<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Work;
use App\Models\User;
use Illuminate\Http\Request;

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
        $works = Work::with('user')->where([['delete', 0]])->get();
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
            'project_file' => 'mimes:pdf,doc,docx',
        ], [
            'work_title.required' => __('admin_local.Work title required'),
            'work_details.required' => __('admin_local.Work details required'),
            'duration.required' => __('admin_local.Duration required'),
            'total_cost.required' => __('admin_local.Total cost required'),
            'progress.required' => __('admin_local.Progress required'),
            'project_file.mimes' => __('admin_local.Invalid file format. (pdf,doc,docx)'),
        ]);

        dd($data->all());

        $newWork = new Work();
        $newWork->work_title = $data->work_title;
        $newWork->work_details = $data->work_details;
        $newWork->duration = $data->duration;
        $newWork->total_cost = $data->total_cost;
        $newWork->total_paid = $data->total_paid;
        $newWork->progress = $data->progress;
        $newWork->progress_status = $data->progress_status;
        $newWork->status = $data->status;

        $newWork->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $phone)
    {
        $user = User::where([['status',1],['delete',0],['phone','like',"%$phone%"]])->first();
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
