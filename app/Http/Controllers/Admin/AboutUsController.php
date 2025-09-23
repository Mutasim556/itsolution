<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutUs;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class AboutUsController extends Controller
{
    public function aboutUs(){
        $aboutus = AboutUs::withoutGlobalScope('translate')->first();
        if(!$aboutus){
            $create = new AboutUs();
            $create->save();
        }
        $aboutus = AboutUs::withoutGlobalScope('translate')->first();
        return view('backend.blade.pages.about',compact('aboutus'));
    }

    public function updateAboutUs(Request $data){
        dd($data->all());
        $aboutus = AboutUs::findOrFail(1);
        $aboutus->about_us_title = $data->about_us_title;
        $aboutus->short_details = $data->short_details;
        $aboutus->details = $data->details;
        $aboutus->points = json_encode($data->points);
        $dir = getDirectoryLink('aboutus/aboutus-images');
        $makeDir = createDirectory($dir);
        if($data->image1) {

            $images = $data->image1;
            $image_names = [];

            $imageName = 'aboutus1'.time().'.'.$images->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($images)->save($imageName);

            $aboutus_images = $imageName;
        }else {
            $aboutus_images = $aboutus->image1;
        }

        $aboutus->image1 = $aboutus_images;


        if($data->image2) {

            $images = $data->image2;
            $image_names = [];

            $imageName = 'aboutus2'.time().'.'.$images->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($images)->save($imageName);

            $aboutus_images = $imageName;
        }else {
            $aboutus_images = $aboutus->image2;
        }

        $aboutus->image2 = $aboutus_images;

        $aboutus->save();


        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        foreach ($languages as $lang) {
            $about_us_title = $lang->lang != 'en' ? 'about_us_title_' . $lang->lang : 'about_us_title';
            $short_details = $lang->lang != 'en' ? 'short_details_' . $lang->lang : 'short_details';
            $details = $lang->lang != 'en' ? 'details_' . $lang->lang : 'details';
            if ($data->$about_us_title != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\AboutUs',
                     'translationable_id'    => $aboutus->id,
                     'locale'                => $lang->lang,
                     'key'                   => 'about_us_title',
                ],[
                    'value'                 => $data->$about_us_title,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$short_details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\AboutUs',
                        'translationable_id'    => $aboutus->id,
                        'locale'                => $lang->lang,
                        'key'                   => 'short_details',
                ],[
                    'value'                 => $data->$short_details,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\AboutUs',
                        'translationable_id'    => $aboutus->id,
                        'locale'                => $lang->lang,
                        'key'                   => 'details',
                ],[
                    'value'                 => $data->$details,
                    'updated_at'            => Carbon::now(),
                ]);
            }

        }
        return back();
    }
}
