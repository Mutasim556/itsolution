<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;
use App\Models\Admin\Counting;
use App\Models\Admin\HomepageSilder;
use App\Models\Admin\Language;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Stichoza\GoogleTranslate\GoogleTranslate;

class HomepageSettingController extends Controller
{
    public function mainSlider()
    {
        $sliders = HomepageSilder::where([['status', 1], ['delete', 0]])->get();
        // dd($sliders);
        return view('backend.blade.settings.homepage.main_slider', compact('sliders'));
    }


    public function mainSliderStore(Request $data)
    {
        // dd($data->all());
        $data->validate([
            'slider_title' => 'required',
            'slider_short_description' => 'required',
            'slider_button_text' => 'required',
            'slider_image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $slider = new HomepageSilder();
        $slider->slider_title = $data->slider_title;
        $slider->slider_short_description = $data->slider_short_description;
        $slider->slider_link = $data->slider_link;
        $slider->slider_button_text = $data->slider_button_text;
        $slider->slider_video = $data->video_link;
        $slider->status = 1;
        $slider->created_by = LoggedAdmin()->id;
        $slider->updated_by = LoggedAdmin()->id;

        if ($data->slider_image) {
            $files = $data->slider_image;
            $file = time() . 'img1.' . $files->getClientOriginalExtension();
            $file_name = 'itsolution/files/settings/homepage/slider/' . $file;
            $manager = new ImageManager(new Driver);
            $manager->read($data->slider_image)->resize(1920, 896)->save(env('ASSET_DIRECTORY') . '/' . 'itsolution/files/settings/homepage/slider/' . $file);
        } else {
            $file_name = "";
        }

        $slider->slider_image = $file_name;


        $slider->save();

        $languages =  Language::where([['status', 1], ['delete', 0]])->get();

        foreach ($languages as $lang) {
            Translation::updateOrInsert([
                'translationable_type'  => 'App\Models\Admin\HomepageSilder',
                'translationable_id'    => $slider->id,
                'locale'                => $lang->lang,
                'key'                   => 'slider_title',
            ], [
                'value'                 =>  GoogleTranslate::trans($data->slider_title, $lang->lang, 'en'),
                'updated_at'            => Carbon::now(),
            ]);

            Translation::updateOrInsert([
                'translationable_type'  => 'App\Models\Admin\HomepageSilder',
                'translationable_id'    => $slider->id,
                'locale'                => $lang->lang,
                'key'                   => 'slider_short_description',
            ], [
                'value'                 =>  GoogleTranslate::trans($data->slider_short_description, $lang->lang, 'en'),
                'updated_at'            => Carbon::now(),
            ]);

            Translation::updateOrInsert([
                'translationable_type'  => 'App\Models\Admin\HomepageSilder',
                'translationable_id'    => $slider->id,
                'locale'                => $lang->lang,
                'key'                   => 'slider_button_text',
            ], [
                'value'                 =>  GoogleTranslate::trans($data->slider_button_text, $lang->lang, 'en'),
                'updated_at'            => Carbon::now(),
            ]);
        }

        return response([
            'slider' => HomepageSilder::findOrFail($slider->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Slider added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['homepage-slider-update', 'homepage-slider-delete']),
            'hasEditPermission' => hasPermission(['homepage-slider-update']),
            'hasDeletePermission' => hasPermission(['homepage-slider-delete']),
        ], 200);
    }

    public function destroySlider(string $id)
    {
        $slider = HomepageSilder::findOrFail($id);
        $slider->delete = 1;
        $slider->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Slider deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateSliderStatus(Request $data)
    {
        // dd($data->id);
        $slider = HomepageSilder::findOrFail($data->id);
        $slider->status = $data->status;
        $slider->updated_at = Carbon::now();
        $slider->save();
        return response($slider);
    }

    public function edit(string $id)
    {
        $slider = HomepageSilder::findOrFail($id);
        return response($slider);
    }

    public function update(Request $data, string $id)
    {
        $data->validate([
            'slider_title' => 'required',
            'slider_short_description' => 'required',
            'slider_button_text' => 'required',
            'slider_image' => 'mimes:png,jpg,jpeg',
            // 'slider_image'=>'mimes:png,jpg,jpeg|dimensions:min_width=2376,min_height=807',
        ]);

        $slider = HomepageSilder::findOrFail($id);
        $slider->slider_title = $data->slider_title;
        $slider->slider_short_description = $data->slider_short_description;
        $slider->slider_link = $data->slider_link;
        $slider->slider_button_text = $data->slider_button_text;
        $slider->slider_video = $data->video_link;
        $slider->status = 1;
        $slider->updated_by = LoggedAdmin()->id;

        if ($data->slider_image) {
            $files = $data->slider_image;
            $file = time() . 'img1.' . $files->getClientOriginalExtension();
            $file_name = 'itsolution/files/settings/homepage/slider/' . $file;
            $manager = new ImageManager(new Driver);
            $manager->read($data->slider_image)->resize(1920, 896)->save(env('ASSET_DIRECTORY') . '/' . 'itsolution/files/settings/homepage/slider/' . $file);
        } else {
            $file_name = $slider->slider_image;
        }

        $slider->slider_image = $file_name;

        $slider->save();

        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        foreach ($languages as $lang) {
            Translation::updateOrInsert([
                'translationable_type'  => 'App\Models\Admin\HomepageSilder',
                'translationable_id'    => $slider->id,
                'locale'                => $lang->lang,
                'key'                   => 'slider_title',
            ], [
                'value'                 =>  GoogleTranslate::trans($data->slider_title, $lang->lang, 'en'),
                'updated_at'            => Carbon::now(),
            ]);

            Translation::updateOrInsert([
                'translationable_type'  => 'App\Models\Admin\HomepageSilder',
                'translationable_id'    => $slider->id,
                'locale'                => $lang->lang,
                'key'                   => 'slider_short_description',
            ], [
                'value'                 =>  GoogleTranslate::trans($data->slider_short_description, $lang->lang, 'en'),
                'updated_at'            => Carbon::now(),
            ]);

            Translation::updateOrInsert([
                'translationable_type'  => 'App\Models\Admin\HomepageSilder',
                'translationable_id'    => $slider->id,
                'locale'                => $lang->lang,
                'key'                   => 'slider_button_text',
            ], [
                'value'                 =>  GoogleTranslate::trans($data->slider_button_text, $lang->lang, 'en'),
                'updated_at'            => Carbon::now(),
            ]);
        }

        return response([
            'slider' => HomepageSilder::findOrFail($id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Slider updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    public function comments()
    {
        $comments = Comment::where([['delete', 0], ['status', 1]])->get();
        return view('backend.blade.settings.homepage.comments', compact('comments'));
    }

    public function storeComments(Request $data)
    {
        $data->validate([
            'name' => 'required',
            'designation' => 'required',
            'comments' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ], [
            'name.required' => __('admin_local.Name required'),
            'designation.required' => __('admin_local.Designation required'),
            'comments.required' => __('admin_local.Comments required'),
            'image.required' => __('admin_local.Image required'),
            'image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);

        $newcomments = new Comment();

        $newcomments->name = $data->name;
        $newcomments->designation = $data->designation;
        $newcomments->comments = $data->comments;

        $dir = getDirectoryLink('comments/comments-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->image) {
            $image = $data->image;
            $imageName = 'commentsImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(470, 670)->save($imageName);
            $newcomments->image = $imageName;
        }
        $newcomments->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            $designation = $lang->lang != 'en' ? 'designation_' . $lang->lang : 'designation';
            $comments = $lang->lang != 'en' ? 'comments_' . $lang->lang : 'comments';
            if ($data->$name != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Comment',
                    'translationable_id'    => $newcomments->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                    'value'                 => $data->$name,
                    'created_at'            => Carbon::now(),
                ));
            }

            if ($data->$designation != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Comment',
                    'translationable_id'    => $newcomments->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'designation',
                    'value'                 => $data->$designation,
                    'created_at'            => Carbon::now(),
                ));
            }

            if ($data->$comments != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Comment',
                    'translationable_id'    => $newcomments->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'comments',
                    'value'                 => $data->$comments,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */


        return response([
            'comments' => Comment::findOrFail($newcomments->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Comments added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['comment-update', 'comment-delete']),
            'hasEditPermission' => hasPermission(['comment-update']),
            'hasDeletePermission' => hasPermission(['comment-delete']),
        ], 200);
    }

    public function updateCommentsStatus(Request $data)
    {
        Comment::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $comments = Comment::where('id', $data->id)->first();
        return $comments;
    }

    public function editComments(string $id)
    {
        $comments = Comment::withoutGlobalScope('translate')->findOrFail($id);
        return response($comments);
    }


    public function updateComments(Request $data, string $id){
         $data->validate([
            'name' => 'required',
            'designation' => 'required',
            'comments' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ], [
            'name.required' => __('admin_local.Name required'),
            'designation.required' => __('admin_local.Designation required'),
            'comments.required' => __('admin_local.Comments required'),
            'image.required' => __('admin_local.Image required'),
            'image.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updatecomments = Comment::findOrFail($id);

        $updatecomments->name = $data->name;
        $updatecomments->designation = $data->designation;
        $updatecomments->comments = $data->comments;

        $dir = getDirectoryLink('comments/comments-images');
        $makeDir = createDirectory($dir);
        if ($data->image) {
            $image = $data->image;
            $imageName = 'commentsImg' . time() . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $imageName  =  $dir . '/' . $imageName;
            $manager->read($image)->resize(470,670)->save($imageName);
            $updatecomments->image = $imageName;
        }



        $updatecomments->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $name = $lang->lang != 'en' ? 'name_' . $lang->lang : 'name';
            $designation = $lang->lang != 'en' ? 'designation_' . $lang->lang : 'designation';
            $comments = $lang->lang != 'en' ? 'comments_' . $lang->lang : 'comments';

            if ($data->$name != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Comment',
                    'translationable_id'    => $updatecomments->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'name',
                ], [
                    'value'                 => $data->$name,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            
            if ($data->$designation != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Comment',
                    'translationable_id'    => $updatecomments->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'designation',
                ], [
                    'value'                 => $data->$designation,
                    'updated_at'            => Carbon::now(),
                ]);
            }

            if ($data->$comments != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\Comment',
                    'translationable_id'    => $updatecomments->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'comments',
                ], [
                    'value'                 => $data->$comments,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            
        }

        return response([
            'comments' => Comment::findOrFail($id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Comments updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    public function deleteComments(string $id)
    {
        $comments = Comment::findOrFail($id);
        $comments->delete=1;
        $comments->updated_at=Carbon::now();
        $comments->save();
        return response([
            'title'=>__('admin_local.Congratulations !'),
            'text'=>__('admin_local.Comments deleted successfully.'),
            'confirmButtonText'=>__('admin_local.Ok'),
        ]);
    }

    public function counting(){
        $counting = Counting::first();
        if(!$counting){
            $counting = new Counting();
            $counting->save();
        }
        return view('backend.blade.settings.homepage.counting',compact('counting'));
    }

    public function updateCounting(Request $data){

        $update = Counting::findOrFail(1);
        $update->counting1_name = $data->counting1_name;
        $update->counting1_value = $data->counting1_value;
        $update->counting2_name = $data->counting2_name;
        $update->counting2_value = $data->counting2_value;
        $update->counting3_name = $data->counting3_name;
        $update->counting3_value = $data->counting3_value;
        $update->counting4_name = $data->counting4_name;
        $update->counting4_value = $data->counting4_value;
        $update->save();

        return back();
    }
}
