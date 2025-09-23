<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
     public function contactUs(){
        $contactinfo = Contact::first();
        if(!$contactinfo){
            $contactinfo = new Contact();
            $contactinfo->phone = null;
            $contactinfo->email = null;
            $contactinfo->address =null;
            $contactinfo->location =null;
            $contactinfo->facebook = null;
            $contactinfo->twitter = null;
            $contactinfo->youtube = null;
            $contactinfo->linkedin = null;

            $contactinfo->save();
        }
        return view('backend.blade.pages.contact',compact('contactinfo'));
    }

    public function updateContactUs(Request $data){
        // dd($data->all());
        $contactinfo = Contact::findOrFail(1);
        $contactinfo->phone = $data->phone;
        $contactinfo->email = $data->email;
        $contactinfo->address = $data->address;
        $contactinfo->location = $data->location;
        $contactinfo->facebook = $data->facebook;
        $contactinfo->twitter = $data->twitter;
        $contactinfo->youtube = $data->youtube;
        $contactinfo->linkedin = $data->linkedin;

        $contactinfo->save();
        return back();
    }


    public function contactUsMessages(){
        $messages =Message::where('reply_status',0)->get();
        return view('backend.blade.others.messages',compact('messages'));
    }
}
