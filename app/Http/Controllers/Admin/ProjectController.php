<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Project;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:project-index,admin');
        $this->middleware('permission:project-store,admin')->only('store');
        $this->middleware('permission:project-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:project-delete,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::where([['delete', 0]])->get();
        return view('backend.blade.pages.project', compact('projects'));
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
            'project_title' => 'required',
            'project_details' => 'required',
            'project_type' => 'required',
            'project_images.*' => 'required|mimes:jpg,jpeg,png',
        ], [
            'project_title.required' => __('admin_local.Project title required'),
            'project_details.required' => __('admin_local.Project details required'),
            'project_type.required' => __('admin_local.Project type required'),
            'project_images.*.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $newProject = new Project();

        $newProject->title = $data->project_title;
        $newProject->details = $data->project_details;
        $newProject->type = $data->project_type;
        $newProject->video_link = $data->video_link;

        $dir = getDirectoryLink('project/project-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->project_images) {
            foreach ($data->project_images as $key => $Image) {
                $image = $Image;
                $imageName = 'projectImg' . $key . time() . '.' . $image->getClientOriginalExtension();
                $manager = new ImageManager(new Driver());
                $imageName  =  $dir . '/' . $imageName;
                $manager->read($image)->resize(400, 300)->save($imageName, 100);
                $allImages[] = $imageName;
            }
        }
        if (count($allImages) > 0) {
            $newProject->images = json_encode($allImages);
        }

        $newProject->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $project_title = $lang->lang != 'en' ? 'project_title_' . $lang->lang : 'project_title';
            $project_details = $lang->lang != 'en' ? 'project_details_' . $lang->lang : 'project_details';
            if ($data->$project_title != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $newProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'title',
                    'value'                 => $data->$project_title,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$project_details != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $newProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'details',
                    'value'                 => $data->$project_details,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */


        return response([
            'project' => Project::findOrFail($newProject->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Project added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['project-update', 'project-delete']),
            'hasEditPermission' => hasPermission(['project-update']),
            'hasDeletePermission' => hasPermission(['project-delete']),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::withoutGlobalScope('translate')->findOrFail($id);
        // dd(app()->getLocale());
        return response($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'project_title' => 'required',
            'project_details' => 'required',
            'project_type' => 'required',
            'project_images.*' => 'required|mimes:jpg,jpeg,png',
        ], [
            'project_title.required' => __('admin_local.Project title required'),
            'project_details.required' => __('admin_local.Project details required'),
            'project_type.required' => __('admin_local.Project type required'),
            'project_images.*.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updateProject = Project::findOrFail($id);

        $updateProject->title = $data->project_title;
        $updateProject->details = $data->project_details;
        $updateProject->type = $data->project_type;
        $updateProject->video_link = $data->video_link;

        $dir = getDirectoryLink('project/project-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->project_images) {
            foreach ($data->project_images as $key => $Image) {
                $image = $Image;
                $imageName = 'projectImg' . $key . time() . '.' . $image->getClientOriginalExtension();
                $manager = new ImageManager(new Driver());
                $imageName  =  $dir . '/' . $imageName;
                $manager->read($image)->resize(400, 300)->save($imageName, 100);
                $allImages[] = $imageName;
            }
        }
        if (count($allImages) > 0) {
            $updateProject->images = json_encode($allImages);
        }

        $updateProject->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $project_title = $lang->lang != 'en' ? 'project_title_' . $lang->lang : 'project_title';
            $project_details = $lang->lang != 'en' ? 'project_details_' . $lang->lang : 'project_details';

            if ($data->$project_title != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $updateProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'title',
                ], [
                    'value'                 => $data->$project_title,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$project_details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $updateProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'details',
                ], [
                    'value'                 => $data->$project_details,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            
        }

        return response([
            'project' => Project::findOrFail($id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Project updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete = 1;
        $project->updated_at = Carbon::now();
        $project->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Project deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Project::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $prject = Project::where('id', $data->id)->first();
        return $prject;
    }
}
