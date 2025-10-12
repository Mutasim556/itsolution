<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Logo;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class LogoIconController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logo = Logo::first();
        if(!$logo){
            $cLogo = new Logo();
            $cLogo->save();
        }
        return view('backend.blade.settings.logo',compact('logo'));
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $updateLogo = Logo::findOrFail(1);
        $dir = getDirectoryLink('logos');
        $makeDir = createDirectory($dir);
        if($data->admin_panel_logo){
            $image = $data->admin_panel_logo;
            $imageName = 'adminPanelLogo' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(92, 60)->save($imageName);
            $updateLogo->admin_panel_logo = $imageName;
        }
        if($data->admin_panel_icon){
            $image = $data->admin_panel_icon;
            $imageName = 'adminPanelIcon' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(32, 32)->save($imageName);
            $updateLogo->admin_panel_icon = $imageName;
        }
        if($data->main_site_header_logo){
            $image = $data->main_site_header_logo;
            $imageName = 'mainSiteHeaderLogo' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(193, 46)->save($imageName);
            $updateLogo->main_site_header_logo = $imageName;
        }
        if($data->main_site_footer_logo){
            $image = $data->main_site_footer_logo;
            $imageName = 'mainSiteFooterLogo' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(165, 40)->save($imageName);
            $updateLogo->main_site_footer_logo = $imageName;
        }
        if($data->main_site_icon){
            $image = $data->main_site_icon;
            $imageName = 'mainSiteIcon' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(32, 32)->save($imageName);
            $updateLogo->main_site_icon = $imageName;
        }

        $updateLogo->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
