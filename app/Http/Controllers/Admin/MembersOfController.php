<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Member;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class MembersOfController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:memberof-index,admin');
        $this->middleware('permission:memberof-store,admin')->only('store');
        $this->middleware('permission:memberof-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:memberof-delete,admin')->only('destroy');
    }
    public function index()
    {
        $members = Member::where([['delete', 0]])->get();
        return view('backend.blade.pages.member', compact('members'));
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


        $newmember = new Member();

        $newmember->name = $data->name;

        $dir = getDirectoryLink('memberof/member');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'memberImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName, 100);
            $newmember->logo = $imageName;
        }
        $newmember->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Member',
                    'translationable_id'    => $newmember->id,
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
            'member' => Member::findOrFail($newmember->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['country-update', 'country-delete']),
            'hasEditPermission' => hasPermission(['country-update']),
            'hasDeletePermission' => hasPermission(['country-delete']),
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
        $member = Member::withoutGlobalScope('translate')->findOrFail($id);
        return response($member);
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


        $updatemember = Member::findOrFail($id);

        $updatemember->name = $data->name;

        $dir = getDirectoryLink('memberof/member');
        $makeDir = createDirectory($dir);
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'memberImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName);
            $updatemember->logo = $imageName;
        }



        $updatemember->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Member',
                    'translationable_id'    => $updatemember->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                ], [
                    'value'                 => $data->$name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }

        return response([
            'member' => Member::findOrFail($id),
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
        $member = Member::findOrFail($id);
        $member->delete = 1;
        $member->updated_at = Carbon::now();
        $member->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Member::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $member = Member::where('id', $data->id)->first();
        return $member;
    }
}
