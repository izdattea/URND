<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use App\Models\Project;
use App\Models\Client;

class userControl extends Controller
{
    function profile() //not sure perlu Request $req tak?
    {
        $user=Auth::user();
        return view('user.profile',['data'=>$user]);
    }

    function showProfile()
    {
        $user=Auth::user();
        return view('user.editProfile',['data'=>$user]);
        
    }

    function updateProfile(Request $req)
    {
        $user=Staff::find($req->id);

        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone_number=$req->phone_number;
        $user->department=$req->department;

        $user->save();

        if (Auth::user() -> usertype == '1'){
            return redirect('users');
        }else{
            return redirect('profile');
        }
        
    }

    function projectList()
    {
        $user = Auth::user();
        // $project = DB::table('projects');
        // if ($user['name']==$project['proj_leader'])
        // {
        //     $data = DB::table('projects')
        //         ->leftJoin('users', 'projects.proj_manager', '=', 'users.name')
        //         ->select('projects.*', 'users.name')
        //         ->get();
        // } else //other users
        // {
        //     $data = DB::table('projects')
        //         ->leftJoin('users', 'projects.proj_manager', '=', 'users.name')
        //         ->where('projects.proj_manager', '=', $user['name'])
        //         ->select('projects.*')
        //         ->get();
        // }
        // $staff = User::where('usertype', '!=', '1')->get();
        // return view('user.projects', ['staff'=>$staff, 'user'=>$user]);
        $project=Project::all();
        return view('user.projects',['data'=>$project, 'user'=>$user]);
        // return view('user.projects');
    }

    function showProject($id)
    {
        $user=Auth::user();
        $staff=Staff::where('usertype', '!=', '1')->get();
        $data = DB::table('projects')
            ->leftJoin('users', 'projects.proj_leader', '=', 'users.name')
            ->where('projects.id', '=', $id)
            ->select('projects.*')->get()
            ->first();
        return view('user.editProject',['data'=>$data, 'user'=>$user, 'staff'=>$staff]);

        // $staff=Staff::where('usertype', '!=', '1')->get();
        // return view('user.addProject', ['user'=>$user, 'staff'=>$staff, 'client'=>$client]);
    }

    function updateProject(Request $req)
    {
        $project=Project::find($req->id);

        $project->proj_name=$req->proj_name;
        $project->proj_leader=$req->proj_leader;
        $project->proj_members=$req->proj_members;
        $project->proj_type=$req->proj_type;
        $project->start_date=$req->start_date;
        $project->end_date=$req->end_date;
        $project->duration=$req->duration;
        $project->cost=$req->cost;
        $project->client=$req->client;
        $project->proj_stage=$req->proj_stage;
        $project->proj_status=$req->proj_status;

        $project->save();

        return redirect('project');

    }

    function deleteProject($id)
    {
        $project=Project::find($id);

        $project->delete();

        return redirect('projects');
    }

    function viewAddProject()
    {
        $user=Auth::user();
        // $user=$user->name;
        $staff=Staff::where('usertype', '!=', '1')->get();
        $client=Client::all();
        return view('user.addProject', ['user'=>$user, 'staff'=>$staff, 'client'=>$client]);
    }

    function  addProject(Request $req)
    {
        $project = new Project;

        $project->proj_name=$req->proj_name;
        $project->proj_leader=$req->proj_leader;
        $project->proj_type=$req->proj_type;
        $project->save();

        return redirect('project');
    }

    function  addClient(Request $req)
    {
        $client = new Client;

        $client->name = $req->name;
        $client->email = $req->email;
        $client->phone_number = $req->phone_number;
        $client->save();

        return redirect('/project');
    }

    function editMembers($id)
    {
        $user=Auth::user();
        $staff=Staff::where('usertype', '!=', '1')->get();
        $data = DB::table('projects')
            ->leftJoin('users', 'projects.proj_leader', '=', 'users.name')
            ->where('projects.id', '=', $id)
            ->select('projects.*')->get()
            ->first();
        return view('user.editMembers',['data'=>$data, 'user'=>$user, 'staff'=>$staff]);
    }
}
