<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use App\Models\Admin\Project;
use App\Models\Admin\Service;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mews\Purifier\Facades\Purifier;
use Vinkla\Hashids\Facades\Hashids;

class FrontEndController extends Controller
{
    public function aboutUs(){
        return view('frontend.pages.about');
    }

    public function services(){
        return view('frontend.pages.services');
    }

    public function serviceDetails(string $slug){

        $serviceId = Hashids::decode(request()->get('service'))?Hashids::decode(request()->get('service'))[0]:'';
        // dd($serviceId);
        $serviceSlug = explode('?',$slug)[0];
        // dd($serviceId,$serviceSlug);
        $service = Service::where([['id',$serviceId],['status',1],['delete',0]])->first();
        if($service && $serviceId && \Str::slug($service->service_name)==$serviceSlug){
            return view('frontend.pages.subpages.service_details',compact('service'));
        }else{
            return response()->view('errors.frontend.404', ['message'=>__('admin_local.We are not able to find this service.Please select our service from the menu.')], 404);
        }

    }

    public function projects(){
        if(request()->has('type')){
            $projects = Project::where([['status',1],['delete',0],['type',request()->get('type')]])->get();
            return view('frontend.pages.projectsbytype',compact('projects'));
        }
        return view('frontend.pages.projects');
    }

    public function projectDetails(string $slug){

        $projectId = Hashids::decode(request()->get('project'))?Hashids::decode(request()->get('project'))[0]:'';
        $projectSlug = explode('?',$slug)[0];
        $project = Project::where([['id',$projectId],['status',1],['delete',0]])->first();
        // dd($projectSlug);
        if($project && $projectId && \Str::slug($project->title)==$projectSlug){
            return view('frontend.pages.subpages.project_details',compact('project'));
        }else{
            return response()->view('errors.frontend.404', ['message'=>__('admin_local.We are not able to find this project.Please select our projects from the menu.')], 404);
        }

    }

    public function teamMembers(){
        return view('frontend.pages.teammembers');
    }

    public function teamMemberDetails(string $slug){

        $teamMId = Hashids::decode(request()->get('team'))?Hashids::decode(request()->get('team'))[0]:'';
        $teamMSlug = explode('?',$slug)[0];
        $teamMs = Team::where([['id',$teamMId],['status',1],['delete',0]])->first();
        // dd($teamMs);
        if($teamMs && $teamMId && \Str::slug($teamMs->team_member_name)==$teamMSlug){
            return view('frontend.pages.subpages.teammember_details',compact('teamMs'));
        }else{
            return response()->view('errors.frontend.404', ['message'=>__('admin_local.We are not able to find this team member.Please select our team from the menu.')], 404);
        }

    }

    public function contactUs(){
        return view('frontend.pages.contact');
    }

    public function contactUsStore(Request $data)
    {
        $data->merge([
            'phone' => Purifier::clean(preg_replace('/\D/', '', $data->phone), [
                'HTML.Allowed' => ''
            ]),
            'email' =>  Purifier::clean(strtolower(trim($data->email)), [
                'HTML.Allowed' => ''
            ]),
            'name' => Purifier::clean($data->name, [
                'HTML.Allowed' => ''
            ]),
            'message' => Purifier::clean($data->message, [
                'HTML.Allowed' => ''
            ]),
        ]);
        $data->validate([
            'name' => 'required|max:49',
            'email' => 'email|max:49',
            'phone' => 'required|digits_between:10,15',
            'message' => 'required',
        ], [
            'name.required' => __('admin_local.Name field is required'),
            'name.max' => __('admin_local.Maximum 49 letters are allowed'),
            'email.required' => __('admin_local.Email field is required'),
            'email.email' => __('admin_local.Invalid email'),
            'email.max' => __('admin_local.Email shoul not greater then 49 letters'),
            'phone.required' => __('admin_local.Phone number is required'),
            'phone.digits_between' => __('admin_local.The phone field must be between 10 and 15 digits'),
            'message.required' => __('admin_local.Message is required'),
        ]);

        $message = new Message();
        $message->user_id = Auth::check()?Auth::user()->id:NULL;
        $message->name = $data->name;
        $message->email = $data->email;
        $message->phone = $data->phone;
        $message->message = $data->message;


        if ($message->save()) {
            return redirect()->to(url()->previous() . '#message_form')
                 ->with('success', __('admin_local.Thanks for messaging. We will contact you within a short time'));

        }
    }

    public function brands(){
        return view('frontend.pages.brands');
    }

    public function publicDiplomacy(){
        return view('frontend.pages.publicdiplomacy');
    }
}
