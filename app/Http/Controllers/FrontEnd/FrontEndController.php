<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use App\Models\Admin\Service;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
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
        return view('frontend.pages.projects');
    }

    public function projectDetails(string $slug){

        $projectId = Hashids::decode(request()->get('project'))?Hashids::decode(request()->get('project'))[0]:'';
        $projectSlug = explode('?',$slug)[0];
        $project = Project::where([['id',$projectId],['status',1],['delete',0]])->first();
        if($project && $projectId && \Str::slug($project->project_name)==$projectSlug){
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
}
