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
            'project_name' => 'required',
            'project_category' => 'required',
            'project_details' => 'required',
            'project_image' => 'required|mimes:jpg,jpeg,png',
            'project_image_2' => 'required|mimes:jpg,jpeg,png',
        ], [
            'project_name.required' => __('admin_local.Project name required'),
            'project_category.required' => __('admin_local.Project category required'),
            'project_details.required' => __('admin_local.Project details required'),
            'project_image.required' => __('admin_local.Project image required'),
            'project_image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
            'project_image_2.required' => __('admin_local.Project image 2 required'),
            'project_image_2.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $newProject= new Project();

        $newProject->project_name = $data->project_name;
        $newProject->project_category = $data->project_category;
        $newProject->project_details = $data->project_details;
        $newProject->project_quotes = $data->project_quotes;
        $newProject->project_points = json_encode($data->project_points);

        $dir = getDirectoryLink('project/project-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->project_image) {
            $image = $data->project_image;
            $imageName = 'projectImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(399,529)->save($imageName);
            $allImages[] = $imageName;
        }

        if ($data->project_image_2) {
            $image = $data->project_image_2;
            $imageName = 'projectImg2-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(770,435)->save($imageName);
            $allImages[] = $imageName;
        }

        if(count($allImages)>0){
            $newProject->project_images = json_encode($allImages);
        }

        $newProject->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $project_name = $lang->lang != 'en' ? 'project_name_' . $lang->lang : 'project_name';
            $project_category = $lang->lang != 'en' ? 'project_category_' . $lang->lang : 'project_category';
            $project_details = $lang->lang != 'en' ? 'project_details_' . $lang->lang : 'project_details';
            $project_quotes = $lang->lang != 'en' ? 'project_quotes_' . $lang->lang : 'project_quotes';
            $project_points = $lang->lang != 'en' ? 'project_points_' . $lang->lang : 'project_points';
            if ($data->$project_name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $newProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_name',
                    'value'                 => $data->$project_name,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$project_category != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $newProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_category',
                    'value'                 => $data->$project_category,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$project_details != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $newProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_details',
                    'value'                 => $data->$project_details,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$project_quotes != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $newProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_quotes',
                    'value'                 => $data->$project_quotes,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$project_points != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $newProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_points',
                    'value'                 => json_encode($data->$project_points),
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
            'project_name' => 'required',
            'project_category' => 'required',
            'project_details' => 'required',
            'project_image' => 'mimes:jpg,jpeg,png',
            'project_image_2' => 'mimes:jpg,jpeg,png',
        ], [
            'project_name.required' => __('admin_local.Project name required'),
            'project_category.required' => __('admin_local.Project category required'),
            'project_details.required' => __('admin_local.Project details required'),
            'project_image.required' => __('admin_local.Project image required'),
            'project_image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
            'project_image_2.required' => __('admin_local.Project image 2 required'),
            'project_image_2.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updateProject= Project::findOrFail($id);

        $updateProject->project_name = $data->project_name;
        $updateProject->project_category = $data->project_category;
        $updateProject->project_details = $data->project_details;
        $updateProject->project_quotes = $data->project_quotes;
        $updateProject->project_points = json_encode($data->project_points);

        $dir = getDirectoryLink('project/project-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->project_image) {
            $image = $data->project_image;
            $imageName = 'projectImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(399,529)->save($imageName);
            $allImages[] = $imageName;
        }

        if ($data->project_image_2) {
            $image = $data->project_image_2;
            $imageName = 'projectImg2-' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(770,435)->save($imageName);
            $allImages[] = $imageName;
        }

        if(count($allImages)>0){
            $updateProject->project_images = json_encode($allImages);
        }

        $updateProject->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $project_name = $lang->lang != 'en' ? 'project_name_' . $lang->lang : 'project_name';
            $project_category = $lang->lang != 'en' ? 'project_category_' . $lang->lang : 'project_category';
            $project_details = $lang->lang != 'en' ? 'project_details_' . $lang->lang : 'project_details';
            $project_quotes = $lang->lang != 'en' ? 'project_quotes_' . $lang->lang : 'project_quotes';
            $project_points = $lang->lang != 'en' ? 'project_points_' . $lang->lang : 'project_points';

            if ($data->$project_name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $updateProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_name',
                ], [
                    'value'                 => $data->$project_name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$project_category != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $updateProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_category',
                ], [
                    'value'                 => $data->$project_category,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$project_details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $updateProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_details',
                ], [
                    'value'                 => $data->$project_details,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$project_quotes != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $updateProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_quotes',
                ], [
                    'value'                 => $data->$project_quotes,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$project_points != null) {
                //  $lang->lang=='bn'?dd($data->$project_points):'';
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Project',
                    'translationable_id'    => $updateProject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'project_points',
                ], [
                    'value'                 => json_encode($data->$project_points),
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
        $project->delete=1;
        $project->updated_at=Carbon::now();
        $project->save();
        return response([
            'title'=>__('admin_local.Congratulations !'),
            'text'=>__('admin_local.Project deleted successfully.'),
            'confirmButtonText'=>__('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Project::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $prject = Project::where('id', $data->id)->first();
        return $prject;
    }
}
