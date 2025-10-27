<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CountryRepresentation;
use App\Models\Admin\Language;
use App\Models\Admin\PublicDiplomacy;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PublicDiplomacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:public-diplomacy-index,admin');
        $this->middleware('permission:public-diplomacy-store,admin')->only('store');
        $this->middleware('permission:public-diplomacy-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:public-diplomacy-delete,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicDiplomacies = PublicDiplomacy::with('country')->where([['delete', 0]])->get();
        $countries = CountryRepresentation::where([['delete', 0], ['status', 1]])->get();
        return view('backend.blade.pages.publicdiplomacy', compact('publicDiplomacies', 'countries'));
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
            'publicdiplomacy_title' => 'required',
            'publicdiplomacy_name' => 'required',
            'country_id' => 'required',
            'link' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ], [
            'publicdiplomacy_title.required' => __('admin_local.Title required'),
            'publicdiplomacy_name.required' => __('admin_local.Name required'),
            'country_id.required' => __('admin_local.Country representation required'),
            'link.required' => __('admin_local.Link required'),
            'image.required' => __('admin_local.Image required'),
            'image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $newpublicdiplomacy = new PublicDiplomacy();

        $newpublicdiplomacy->title = $data->publicdiplomacy_title;
        $newpublicdiplomacy->name = $data->publicdiplomacy_name;
        $newpublicdiplomacy->country_id = $data->country_id;
        $newpublicdiplomacy->link = $data->link;

        $dir = getDirectoryLink('publicdiplomacy/publicdiplomacy-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->image) {
            $image = $data->image;
            $imageName = 'publicdiplomacyImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName, 100);
            $newpublicdiplomacy->image = $imageName;
        }
        $newpublicdiplomacy->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $publicdiplomacy_title = $lang->lang != 'en' ? 'publicdiplomacy_title_' . $lang->lang : 'publicdiplomacy_title';
            $publicdiplomacy_name = $lang->lang != 'en' ? 'publicdiplomacy_name_' . $lang->lang : 'publicdiplomacy_name';
            if ($data->$publicdiplomacy_title != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\PublicDiplomacy',
                    'translationable_id'    => $newpublicdiplomacy->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'title',
                    'value'                 => $data->$publicdiplomacy_title,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$publicdiplomacy_name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\PublicDiplomacy',
                    'translationable_id'    => $newpublicdiplomacy->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                    'value'                 => $data->$publicdiplomacy_name,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */


        return response([
            'publicdiplomacy' => PublicDiplomacy::with('country')->where('id', $newpublicdiplomacy->id)->first(),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['public-diplomacy-update', 'public-diplomacy-delete']),
            'hasEditPermission' => hasPermission(['public-diplomacy-update']),
            'hasDeletePermission' => hasPermission(['public-diplomacy-delete']),
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
        $publicdiplomacy = PublicDiplomacy::with('country')->withoutGlobalScope('translate')->findOrFail($id);
        return response($publicdiplomacy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'publicdiplomacy_title' => 'required',
            'publicdiplomacy_name' => 'required',
            'country_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ], [
            'publicdiplomacy_title.required' => __('admin_local.Title required'),
            'publicdiplomacy_name.required' => __('admin_local.Name required'),
            'country_id.required' => __('admin_local.Country representation required'),
            'link.required' => __('admin_local.Link required'),
            'image.required' => __('admin_local.Image required'),
            'image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updatepublicdiplomacy = PublicDiplomacy::findOrFail($id);

        $updatepublicdiplomacy->title = $data->publicdiplomacy_title;
        $updatepublicdiplomacy->name = $data->publicdiplomacy_name;
        $updatepublicdiplomacy->country_id = $data->country_id;
        $updatepublicdiplomacy->link = $data->link;

        $dir = getDirectoryLink('publicdiplomacy/publicdiplomacy-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->image) {
            $image = $data->image;
            $imageName = 'publicdiplomacyImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName, 100);
            $updatepublicdiplomacy->image = $imageName;
        }

        $updatepublicdiplomacy->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $publicdiplomacy_title = $lang->lang != 'en' ? 'publicdiplomacy_title_' . $lang->lang : 'publicdiplomacy_title';
            $publicdiplomacy_name = $lang->lang != 'en' ? 'publicdiplomacy_name_' . $lang->lang : 'publicdiplomacy_name';

            if ($data->$publicdiplomacy_title != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\PublicDiplomacy',
                    'translationable_id'    => $updatepublicdiplomacy->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'title',
                ], [
                    'value'                 => $data->$publicdiplomacy_title,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$publicdiplomacy_name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\PublicDiplomacy',
                    'translationable_id'    => $updatepublicdiplomacy->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                ], [
                    'value'                 => $data->$publicdiplomacy_name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }

        return response([
            'publicdiplomacy' => PublicDiplomacy::with('country')->findOrFail($id),
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
        $publicdiplomacy = PublicDiplomacy::findOrFail($id);
        $publicdiplomacy->delete = 1;
        $publicdiplomacy->updated_at = Carbon::now();
        $publicdiplomacy->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        PublicDiplomacy::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $publicpiplomacy = PublicDiplomacy::where('id', $data->id)->first();
        return $publicpiplomacy;
    }
}
