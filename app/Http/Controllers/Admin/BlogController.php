<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Language;
use App\Models\Admin\Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-index,admin');
        $this->middleware('permission:blog-store,admin')->only('store');
        $this->middleware('permission:blog-update,admin')->only(['edit', 'update', 'updateStatus']);
        $this->middleware('permission:blog-delete,admin')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('admin')->where([['delete', 0]])->get();
        return view('backend.blade.pages.blog', compact('blogs'));
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
            'blog_title' => 'required',
            'blog_details' => 'required',
            'blog_images.*' => 'required|mimes:jpg,jpeg,png',
        ], [
            'blog_title.required' => __('admin_local.Blog title required'),
            'blog_details.required' => __('admin_local.Blog details required'),
            'blog_type.required' => __('admin_local.Blog type required'),
            'blog_images.*.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $newblog = new Blog();

        $newblog->title = $data->blog_title;
        $newblog->details = $data->blog_details;
        $newblog->video = $data->video_link;

        $newblog->created_by = Auth::guard('admin')->user()->id;

        $dir = getDirectoryLink('blog/blog-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->blog_images) {
            foreach ($data->blog_images as $key => $Image) {
                $image = $Image;
                $imageName = 'blogImg' . $key . time() . '.' . $image->getClientOriginalExtension();
                $manager = new ImageManager(new Driver());
                $imageName  =  $dir . '/' . $imageName;
                $manager->read($image)->resize(348,348)->save($imageName, 100);
                $allImages[] = $imageName;
            }
        }
        if (count($allImages) > 0) {
            $newblog->images = json_encode($allImages);
        }

        $newblog->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $blog_title = $lang->lang != 'en' ? 'blog_title_' . $lang->lang : 'blog_title';
            $blog_details = $lang->lang != 'en' ? 'blog_details_' . $lang->lang : 'blog_details';
            if ($data->$blog_title != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Blog',
                    'translationable_id'    => $newblog->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'title',
                    'value'                 => $data->$blog_title,
                    'created_at'            => Carbon::now(),
                ));
            }
            if ($data->$blog_details != null) {
                array_push($datas, array(
                    'translationable_type'  => 'App\Models\Admin\Blog',
                    'translationable_id'    => $newblog->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'details',
                    'value'                 => $data->$blog_details,
                    'created_at'            => Carbon::now(),
                ));
            }
        }
        Translation::insert($datas);
        /** Insert Translations End */


        return response([
            'blog' => Blog::findOrFail($newblog->id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Blog added successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
            'hasAnyPermission' => hasPermission(['blog-update', 'blog-delete']),
            'hasEditPermission' => hasPermission(['blog-update']),
            'hasDeletePermission' => hasPermission(['blog-delete']),
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
        $blog = blog::withoutGlobalScope('translate')->findOrFail($id);
        // dd(app()->getLocale());
        return response($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $data, string $id)
    {
        $data->validate([
            'blog_title' => 'required',
            'blog_details' => 'required',
            'blog_images.*' => 'mimes:jpg,jpeg,png',
        ], [
            'blog_title.required' => __('admin_local.blog title required'),
            'blog_details.required' => __('admin_local.blog details required'),
            'blog_images.*.mimes' => __('admin_local.Invalid image format. (jpeg,jpg,png)'),
        ]);


        $updateblog = Blog::findOrFail($id);

        $updateblog->title = $data->blog_title;
        $updateblog->details = $data->blog_details;
        $updateblog->video = $data->video_link;

        $dir = getDirectoryLink('blog/blog-images');
        $makeDir = createDirectory($dir);
        $allImages = [];
        if ($data->blog_images) {
            foreach ($data->blog_images as $key => $Image) {
                $image = $Image;
                $imageName = 'blogImg' . $key . time() . '.' . $image->getClientOriginalExtension();
                $manager = new ImageManager(new Driver());
                $imageName  =  $dir . '/' . $imageName;
                $manager->read($image)->resize(348,348)->save($imageName, 100);
                $allImages[] = $imageName;
            }
        }
        if (count($allImages) > 0) {
            $updateblog->images = json_encode($allImages);
        }

        $updateblog->save();

        /** Insert Translations Start */
        $languages =  Language::where([['status', 1], ['delete', 0]])->get();
        $datas = [];
        foreach ($languages as $lang) {
            $blog_title = $lang->lang != 'en' ? 'blog_title_' . $lang->lang : 'blog_title';
            $blog_details = $lang->lang != 'en' ? 'blog_details_' . $lang->lang : 'blog_details';

            if ($data->$blog_title != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\blog',
                    'translationable_id'    => $updateblog->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'title',
                ], [
                    'value'                 => $data->$blog_title,
                    'updated_at'            => Carbon::now(),
                ]);
            }
            if ($data->$blog_details != null) {
                Translation::updateOrInsert([
                    'translationable_type'  => 'App\Models\Admin\blog',
                    'translationable_id'    => $updateblog->id,
                    'locale'                => $lang->lang,
                    'key'                   => 'details',
                ], [
                    'value'                 => $data->$blog_details,
                    'updated_at'            => Carbon::now(),
                ]);
            }
        }

        return response([
            'blog' => Blog::findOrFail($id),
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Blog updated successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete = 1;
        $blog->updated_at = Carbon::now();
        $blog->save();
        return response([
            'title' => __('admin_local.Congratulations !'),
            'text' => __('admin_local.Blog deleted successfully.'),
            'confirmButtonText' => __('admin_local.Ok'),
        ]);
    }

    public function updateStatus(Request $data)
    {
        Blog::where('id', $data->id)->update(['status' => $data->status, 'updated_at' => Carbon::now()]);
        $blog = Blog::where('id', $data->id)->first();
        return $blog;
    }
}
