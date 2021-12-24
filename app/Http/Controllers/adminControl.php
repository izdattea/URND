<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Staff;
use App\Models\Project;

class adminControl extends Controller
{
    // function clientList()
    // {
    //     $client=Client::all();
    //     return view('admin.clientList',['data'=>$client]);
    // } //view client list 

    function userList()
    {
        $staff=Staff::all();
        return view('user.profile',['data'=>$staff]);
    } //view user list 

    function showUser($id)
    {
        $staff=Staff::find($id);
        return view('user.editProfile',['data'=>$staff]);
    }

    function updateUser(Request $req)
    {
        $staff=Staff::find($req->id);

        $staff->name=$req->name;
        $staff->email=$req->email;
        $staff->phone_number=$req->phone_number;
        $staff->department=$req->department;

        $staff->save();

        return redirect('/admin/user-list');

    }

    function deleteUser($id)
    {
        $staff=Staff::find($id);

        $staff->delete();

        return redirect('/admin/user-list');
    }

    function addUser(Request $req)
    {
        $staff=new Staff;

        $staff->name=$req->name;
        $staff->email=$req->email;
        $staff->phone_number=$req->phone_number;
        $staff->department=$req->department;
        $staff->save();

        return redirect('/admin/user-list');
    }

    function projectList()
    {
        $project=Project::all();
        return view('admin.projectList',['data'=>$project]);
    }

    function showProject($id)
    {
        $project=Project::find($id);
        return view('admin.editProject',['disp'=>$project]);
    }

    function updateProject(Request $req)
    {
        $project=Project::find($req->id);

        $project->name=$req->name;
        $project->proj_name=$req->proj_name;
        $project->proj_manager=$req->proj_manager;
        $project->proj_leader=$req->proj_leader;
        $project->proj_members=$req->proj_members;
        $project->start_date=$req->start_date;
        $project->end_date=$req->end_date;
        $project->duration=$req->duration;
        $project->cost=$req->cost;
        $project->client=$req->client;
        $project->proj_stage=$req->proj_stage;
        $project->proj_status=$req->proj_status;

        $project->save();

        return redirect('/admin/project-list');

    }

    function deleteProject($id)
    {
        $project=Project::find($id);

        $project->delete();

        return redirect('/admin/project-list');
    }
}
