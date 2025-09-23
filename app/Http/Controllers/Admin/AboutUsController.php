<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutUs;
use App\Models\Admin\Language;
use App\Models\Admin\Translation;
use Carbon\Carbon;
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

        $aboutus = AboutUs::findOrFail(1);
        $aboutus->company_name = $data->company_name;
        $aboutus->about_us_title = $data->about_us_title;
        $aboutus->short_details = $data->short_details;
        $aboutus->details = $data->details;
        $aboutus->points = implode('||',$data->points);
        $aboutus->project_line = $data->project_line;
        $aboutus->resp_person_name = $data->resp_person_name;
        $aboutus->resp_person_desig = $data->resp_person_desig;
        $aboutus->experience = $data->experience;
        $aboutus->video_link = $data->video_link;

        // dd($aboutus);
        $dir = getDirectoryLink('aboutus/aboutus-images');
        $makeDir = createDirectory($dir);
         if($data->resp_person_image) {
            $images = $data->resp_person_image;
            $imageName = 'aboutusRespPerson'.time().'.'.$images->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($images)->resize(80,80)->save($imageName);
            $aboutus->resp_person_image = $imageName;
         }
         if($data->resp_person_sig) {
            $images = $data->resp_person_sig;
            $imageName = 'aboutusRespPersonSig'.time().'.'.$images->getClientOriginalExtension();

            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($images)->resize(196,100)->save($imageName);
            $aboutus->resp_person_signature = $imageName;
         }
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
            $company_name = $lang->lang != 'en' ? 'company_name_' . $lang->lang : 'company_name';
            $about_us_title = $lang->lang != 'en' ? 'about_us_title_' . $lang->lang : 'about_us_title';
            $short_details = $lang->lang != 'en' ? 'short_details_' . $lang->lang : 'short_details';
            $details = $lang->lang != 'en' ? 'details_' . $lang->lang : 'details';
            $points = $lang->lang != 'en' ? 'points_' . $lang->lang : 'points';
            $project_line = $lang->lang != 'en' ? 'project_line_' . $lang->lang : 'project_line';
            if ($data->$company_name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\AboutUs',
                     'translationable_id'    => $aboutus->id,
                     'locale'                => $lang->lang,
                     'key'                   => 'company_name',
                ],[
                    'value'                 => $data->$company_name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$points != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\AboutUs',
                     'translationable_id'    => $aboutus->id,
                     'locale'                => $lang->lang,
                     'key'                   => 'points',
                ],[
                    'value'                 => implode('||',$data->$points),
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$project_line != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\AboutUs',
                     'translationable_id'    => $aboutus->id,
                     'locale'                => $lang->lang,
                     'key'                   => 'project_line',
                ],[
                    'value'                 => $data->$project_line,
                    'updated_at'            => Carbon::now(),
                ]);
            }
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
