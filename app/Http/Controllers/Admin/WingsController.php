<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Translation;
use App\Models\Admin\Wing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class WingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:wing-index,admin');
        $this->middleware('permission:wing-store,admin')->only('store');
        $this->middleware('permission:wing-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:wing-delete,admin')->only('destroy');
    }
    public function index()
    {
        $wings = Wing::where([['delete', 0]])->get();
        return view('backend.blade.pages.wing', compact('wings'));
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


        $newwing = new Wing();

        $newwing->name = $data->name;
        $newwing->link = $data->link;

        $dir = getDirectoryLink('public-diplomacy/wing');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'wingImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName, 100);
            $newwing->logo = $imageName;
        }
        $newwing->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Wing',
                    'translationable_id'    => $newwing->id,
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
            'wing' => Wing::findOrFail($newwing->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['wing-update', 'wing-delete']),
            'hasEditPermission' => hasPermission(['wing-update']),
            'hasDeletePermission' => hasPermission(['wing-delete']),
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
        $wing = Wing::withoutGlobalScope('translate')->findOrFail($id);
        return response($wing);
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


        $updatewing = Wing::findOrFail($id);

        $updatewing->name = $data->name;
        $updatewing->link = $data->link;

        $dir = getDirectoryLink('public-diplomacy/wing');
        $makeDir = createDirectory($dir);
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'wingImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName);
            $updatewing->logo = $imageName;
        }



        $updatewing->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Wing',
                    'translationable_id'    => $updatewing->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                ], [
                    'value'                 => $data->$name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }

        return response([
            'wing' => Wing::findOrFail($id),
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
        $wing = Wing::findOrFail($id);
        $wing->delete = 1;
        $wing->updated_at = Carbon::now();
        $wing->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Wing::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $wing = Wing::where('id', $data->id)->first();
        return $wing;
    }
}
