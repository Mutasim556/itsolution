<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\OurProject;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class OurProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:our-project-index,admin');
        $this->middleware('permission:our-project-store,admin')->only('store');
        $this->middleware('permission:our-project-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:our-project-delete,admin')->only('destroy');
    }
    public function index()
    {
        $ourprojects = OurProject::where([['delete', 0]])->get();
        return view('backend.blade.pages.ourproject', compact('ourprojects'));
    }


    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        $data->validate([
            'name' => 'required',
            'logo' => 'required|mimes:jpg,jpeg,png',
        ], [
            'name.required' => __('admin_local.Name required'),
            'logo.required' => __('admin_local.Logo required'),
            'logo.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $newourproject = new OurProject();

        $newourproject->name = $data->name;
        $newourproject->link = $data->link;

        $dir = getDirectoryLink('projects/ourproject');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'ourprojectImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName, 100);
            $newourproject->logo = $imageName;
        }
        $newourproject->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\OurProject',
                    'translationable_id'    => $newourproject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                    'value'                 => $data->$name,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */


        return response([
            'ourproject' => OurProject::findOrFail($newourproject->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['our-project-update', 'our-project-delete']),
            'hasEditPermission' => hasPermission(['our-project-update']),
            'hasDeletePermission' => hasPermission(['our-project-delete']),
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
        $ourproject = OurProject::withoutGlobalScope('translate')->findOrFail($id);
        return response($ourproject);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'name' => 'required',
            'logo' => 'mimes:jpg,jpeg,png',
        ], [
            'name.required' => __('admin_local.Name required'),
            'logo.required' => __('admin_local.Logo required'),
            'logo.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updateourproject = OurProject::findOrFail($id);

        $updateourproject->name = $data->name;
        $updateourproject->link = $data->link;

        $dir = getDirectoryLink('projects/ourproject');
        $makeDir = createDirectory($dir);
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'ourprojectImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName);
            $updateourproject->logo = $imageName;
        }



        $updateourproject->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\OurProject',
                    'translationable_id'    => $updateourproject->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                ], [
                    'value'                 => $data->$name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }

        return response([
            'ourproject' => OurProject::findOrFail($id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ourproject = OurProject::findOrFail($id);
        $ourproject->delete = 1;
        $ourproject->updated_at = Carbon::now();
        $ourproject->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        OurProject::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $ourproject = OurProject::where('id', $data->id)->first();
        return $ourproject;
    }
}
