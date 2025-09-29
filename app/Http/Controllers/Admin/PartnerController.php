<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Language;
use App\Models\Admin\Partner;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:partner-index,admin');
        $this->middleware('permission:partner-store,admin')->only('store');
        $this->middleware('permission:partner-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:partner-delete,admin')->only('destroy');
    }
    public function index()
    {
        $partners = Partner::where([['delete', 0]])->get();
        return view('backend.blade.pages.partner', compact('partners'));
    }


    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $data)
    {
        $data->validate([
            'partner_name' => 'required',
            'partner_details' => 'required',
            'partner_image' => 'required|mimes:jpg,jpeg,png',
        ], [
            'partner_name.required' => __('admin_local.Partner name required'),
            'partner_details.required' => __('admin_local.Partner details required'),
            'partner_image.required' => __('admin_local.Partner image required'),
            'partner_image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $newpartner = new Partner();

        $newpartner->partner_name = $data->partner_name;
        $newpartner->partner_details = $data->partner_details;

        $dir = getDirectoryLink('partner/partner-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->partner_image) {
            $image = $data->partner_image;
            $imageName = 'partnerImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(180, 150)->save($imageName);
            $newpartner->partner_image = $imageName;
        }
        $newpartner->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $partner_name = $lang->lang != 'en' ? 'partner_name_' . $lang->lang : 'partner_name';
            $partner_details = $lang->lang != 'en' ? 'partner_details_' . $lang->lang : 'partner_details';
            if ($data->$partner_name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Partner',
                    'translationable_id'    => $newpartner->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'partner_name',
                    'value'                 => $data->$partner_name,
                    'created_at'            => Carbon::now(),
                ));
            }

            if ($data->$partner_details != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Partner',
                    'translationable_id'    => $newpartner->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'partner_details',
                    'value'                 => $data->$partner_details,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */


        return response([
            'partner' => Partner::findOrFail($newpartner->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Partner added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['partner-update', 'partner-delete']),
            'hasEditPermission' => hasPermission(['partner-update']),
            'hasDeletePermission' => hasPermission(['partner-delete']),
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
        $partner = Partner::withoutGlobalScope('translate')->findOrFail($id);
        return response($partner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'partner_name' => 'required',
            'partner_details' => 'required',
            'partner_image' => 'mimes:jpg,jpeg,png',
        ], [
            'partner_name.required' => __('admin_local.Partner name required'),
            'partner_details.required' => __('admin_local.Partner details required'),
            'partner_image.required' => __('admin_local.Partner image required'),
            'partner_image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updatepartner = Partner::findOrFail($id);

        $updatepartner->partner_name = $data->partner_name;
        $updatepartner->partner_details = $data->partner_details;

        $dir = getDirectoryLink('partner/partner-images');
        $makeDir = createDirectory($dir);
        if ($data->partner_image) {
            $image = $data->partner_image;
            $imageName = 'partnerImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(180, 150)->save($imageName);
            $updatepartner->partner_image = $imageName;
        }



        $updatepartner->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $partner_name = $lang->lang != 'en' ? 'partner_name_' . $lang->lang : 'partner_name';
            $partner_details = $lang->lang != 'en' ? 'partner_details_' . $lang->lang : 'partner_details';

            if ($data->$partner_name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Partner',
                    'translationable_id'    => $updatepartner->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'partner_name',
                ], [
                    'value'                 => $data->$partner_name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            
            if ($data->$partner_details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Partner',
                    'translationable_id'    => $updatepartner->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'partner_details',
                ], [
                    'value'                 => $data->$partner_details,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            
        }

        return response([
            'partner' => Partner::findOrFail($id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Partner updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete=1;
        $partner->updated_at=Carbon::now();
        $partner->save();
        return response([
            'title'=>__('admin_local.Congratulations !'),
            'text'=>__('admin_local.Partner deleted successfully.'),
            'confirmButtonText'=>__('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Partner::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $partner = Partner::where('id', $data->id)->first();
        return $partner;
    }
}
