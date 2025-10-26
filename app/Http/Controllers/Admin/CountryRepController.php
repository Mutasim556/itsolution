<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CountryRepresentation;
use App\Models\Admin\Language;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class CountryRepController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:country-index,admin');
        $this->middleware('permission:country-store,admin')->only('store');
        $this->middleware('permission:country-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:country-delete,admin')->only('destroy');
    }
    public function index()
    {
        $countries = CountryRepresentation::where([['delete', 0]])->get();
        return view('backend.blade.pages.country', compact('countries'));
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


        $newcountry = new CountryRepresentation();

        $newcountry->name = $data->name;

        $dir = getDirectoryLink('public-diplomacy/country');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'countryImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName,100);
            $newcountry->logo = $imageName;
        }
        $newcountry->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\CountryRepresentation',
                    'translationable_id'    => $newcountry->id,
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
            'country' => CountryRepresentation::findOrFail($newcountry->id),
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
        $country = CountryRepresentation::withoutGlobalScope('translate')->findOrFail($id);
        return response($country);
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


        $updatecountry = CountryRepresentation::findOrFail($id);

        $updatecountry->name = $data->name;

        $dir = getDirectoryLink('public-diplomacy/country');
        $makeDir = createDirectory($dir);
        if ($data->logo) {
            $image = $data->logo;
            $imageName = 'countryImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->save($imageName);
            $updatecountry->logo = $imageName;
        }



        $updatecountry->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            if ($data->$name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\CountryRepresentation',
                    'translationable_id'    => $updatecountry->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                ], [
                    'value'                 => $data->$name,
                    'updated_at'            => Carbon::now(),
                ]);
            }

        }

        return response([
            'country' => CountryRepresentation::findOrFail($id),
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
        $country = CountryRepresentation::findOrFail($id);
        $country->delete=1;
        $country->updated_at=Carbon::now();
        $country->save();
        return response([
            'title'=>__('admin_local.Congratulations !'),
            'text'=>__('admin_local.Deleted successfully.'),
            'confirmButtonText'=>__('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        CountryRepresentation::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $country = CountryRepresentation::where('id', $data->id)->first();
        return $country;
    }
}
