<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Team;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:team-index,admin');
        $this->middleware('permission:team-store,admin')->only('store');
        $this->middleware('permission:team-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:team-delete,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Team::where([['delete', 0]])->get();
        return view('backend.blade.pages.team', compact('members'));
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
            'team_member_name' => 'required',
            'team_member_desig' => 'required',
            'team_member_about' => 'required',
            'team_member_gender' => 'required',
            'team_member_phone' => 'required',
            'team_member_email' => 'required|email',
            'team_member_image' => 'required|mimes:jpg,jpeg,png',
        ], [
            'team_member_name.required' => __('admin_local.Team member name required'),
            'team_member_desig.required' => __('admin_local.Team member designation required'),
            'team_member_about.required' => __('admin_local.About team member required'),
            'team_member_gender.required' => __('admin_local.Team member gender required'),
            'team_member_phone.required' => __('admin_local.Team member phone required'),
            'team_member_email.required' => __('admin_local.Team member email required'),
            'team_member_email.email' => __('admin_local.Invalid E-mail'),
            'team_member_image.required' => __('admin_local.Team member image required'),
            'team_member_image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $newMember = new Team();

        $newMember->team_member_name = $data->team_member_name;
        $newMember->team_member_desig = $data->team_member_desig;
        $newMember->team_member_about = $data->team_member_about;
        $newMember->team_member_gender = $data->team_member_gender;
        $newMember->team_member_phone = $data->team_member_phone;
        $newMember->team_member_email = $data->team_member_email;
        $newMember->team_member_address = $data->team_member_address;
        $newMember->team_member_facebook = $data->team_member_facebook;
        $newMember->team_member_instagram = $data->team_member_instagram;
        $newMember->team_member_linkedin = $data->team_member_linkedin;
        $newMember->team_member_youtube = $data->team_member_youtube;
        $newMember->team_member_expertise = json_encode($data->expertise);
        $newMember->team_member_exp_lavel = json_encode($data->expertiselavel);

        $dir = getDirectoryLink('team/team-members');
        $makeDir = createDirectory($dir);
        if ($data->team_member_image) {
            $image = $data->team_member_image;
            $imageName = 'teamMember' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(370, 267)->save($imageName);
            $newMember->team_member_image = $imageName;
        }

        $newMember->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $team_member_name = $lang->lang != 'en' ? 'team_member_name_' . $lang->lang : 'team_member_name';
            $team_member_about = $lang->lang != 'en' ? 'team_member_about_' . $lang->lang : 'team_member_about';
            $team_member_desig = $lang->lang != 'en' ? 'team_member_desig_' . $lang->lang : 'team_member_desig';
            if ($data->$team_member_name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Team',
                    'translationable_id'    => $newMember->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'team_member_name',
                    'value'                 => $data->$team_member_name,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$team_member_about != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Team',
                    'translationable_id'    => $newMember->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'team_member_about',
                    'value'                 => $data->$team_member_about,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$team_member_desig != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Team',
                    'translationable_id'    => $newMember->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'team_member_desig',
                    'value'                 => $data->$team_member_desig,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */


        return response([
            'team' => Team::findOrFail($newMember->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Team member added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['team-update', 'team-delete']),
            'hasEditPermission' => hasPermission(['team-update']),
            'hasDeletePermission' => hasPermission(['team-delete']),
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
        $team = Team::withoutGlobalScope('translate')->findOrFail($id);
        // dd(app()->getLocale());
        return response($team);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'team_member_name' => 'required',
            'team_member_desig' => 'required',
            'team_member_about' => 'required',
            'team_member_gender' => 'required',
            'team_member_phone' => 'required',
            'team_member_email' => 'required|email',
            'team_member_image' => 'mimes:jpg,jpeg,png',
        ], [
            'team_member_name.required' => __('admin_local.Team member name required'),
            'team_member_desig.required' => __('admin_local.Team member designation required'),
            'team_member_about.required' => __('admin_local.About team member required'),
            'team_member_gender.required' => __('admin_local.Team member gender required'),
            'team_member_phone.required' => __('admin_local.Team member phone required'),
            'team_member_email.required' => __('admin_local.Team member email required'),
            'team_member_email.email' => __('admin_local.Invalid E-mail'),
            'team_member_image.required' => __('admin_local.Team member image required'),
            'team_member_image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updateMember = Team::findOrFail($id);

        $updateMember->team_member_name = $data->team_member_name;
        $updateMember->team_member_desig = $data->team_member_desig;
        $updateMember->team_member_about = $data->team_member_about;
        $updateMember->team_member_gender = $data->team_member_gender;
        $updateMember->team_member_phone = $data->team_member_phone;
        $updateMember->team_member_email = $data->team_member_email;
        $updateMember->team_member_address = $data->team_member_address;
        $updateMember->team_member_facebook = $data->team_member_facebook;
        $updateMember->team_member_instagram = $data->team_member_instagram;
        $updateMember->team_member_linkedin = $data->team_member_linkedin;
        $updateMember->team_member_youtube = $data->team_member_youtube;
        $updateMember->team_member_expertise = json_encode($data->expertise);
        $updateMember->team_member_exp_lavel = json_encode($data->expertiselavel);

        $dir = getDirectoryLink('team/team-members');
        $makeDir = createDirectory($dir);
        if ($data->team_member_image) {
            $image = $data->team_member_image;
            $imageName = 'teamMember' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(370, 267)->save($imageName);
            $updateMember->team_member_image = $imageName;
        }

        $updateMember->save();

        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        foreach ($languages as $lang) {
            $team_member_name = $lang->lang != 'en' ? 'team_member_name_' . $lang->lang : 'team_member_name';
            $team_member_about = $lang->lang != 'en' ? 'team_member_about_' . $lang->lang : 'team_member_about';
            $team_member_desig = $lang->lang != 'en' ? 'team_member_desig_' . $lang->lang : 'team_member_desig';
            if ($data->$team_member_name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Team',
                    'translationable_id'    => $updateMember->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'team_member_name',
                ], [
                    'value'                 => $data->$team_member_name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$team_member_about != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Team',
                    'translationable_id'    => $updateMember->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'team_member_about',
                ], [
                    'value'                 => $data->$team_member_about,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$team_member_desig != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Team',
                    'translationable_id'    => $updateMember->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'team_member_desig',
                ], [
                    'value'                 => $data->$team_member_desig,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }

        return response([
            'team' => Team::findOrFail($id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Team member updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::findOrFail($id);
        $team->delete=1;
        $team->updated_at=Carbon::now();
        $team->save();
        return response([
            'title'=>__('admin_local.Congratulations !'),
            'text'=>__('admin_local.Team member deleted successfully.'),
            'confirmButtonText'=>__('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Team::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $team = Team::where('id', $data->id)->first();
        return $team;
    }
}
