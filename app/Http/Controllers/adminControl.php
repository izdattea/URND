<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Staff;
use App\Models\Project;

class adminControl extends Controller
{

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
}
