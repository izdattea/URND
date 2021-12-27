<!DOCTYPE html>
<html lang="en">
<head>
@include('user.nav.css')
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
@if(Auth::user()->usertype == 1)
    @include('admin.nav.navbar')
  @else
    @include('user.nav.navbar')
  @endif
    <div class="content-wrapper">
        <div class="container">
            <div class="card">
                @if (Auth::user() -> usertype == 1)
                <h4 class="card-title">Projects<button onclick="location.href='add-project'" type="button" class="btn btn-outline-secondary btn-rounded" style="float:right;">New Project</button></h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Name</th>
                                <th>Project Leader</th>
                                <th>Project Members</th>
                                <th>Project Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Duration</th>
                                <th>Cost</th>
                                <th>Client</th>
                                <th>Project Stage</th>
                                <th>Project Status</th>
                                <th colspan=2>Actions</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->proj_name}}</td>
                                <td>{{$data->proj_leader}}</td>
                                <td>{{$data->proj_members}}</td> 
                                <td>{{$data->proj_type}}</td>
                                <td>{{$data->start_date}}</td>
                                <td>{{$data->end_date}}</td>
                                <td>{{$data->duration}}</td>
                                <td>{{$data->cost}}</td>
                                <td>{{$data->client}}</td>
                                <td>{{$data->proj_stage}}</td>
                                <td>{{$data->proj_status}}</td>
                                <td><a href="edit-project/{{$data->id}}">Edit</a></td>
                                <td><a href="edit-members/{{$data->id}}">Edit Members</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                @else
                        <h4 class="card-title">Projects</h4>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Project Name</th>
                                        <th>Project Leader</th>
                                        <th>Project Members</th>
                                        <th>Project Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Duration</th>
                                        <th>Cost</th>
                                        <th>Client</th>
                                        <th>Project Stage</th>
                                        <th>Project Status</th>
                                        <th colspan=2>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $data)
                                @if (Auth::user()->name == $data->proj_leader)
                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->proj_name}}</td>
                                    <td>{{$data->proj_leader}}</td>
                                    <td>{{$data->proj_members}}</td> 
                                    <td>{{$data->proj_type}}</td>
                                    <td>{{$data->start_date}}</td>
                                    <td>{{$data->end_date}}</td>
                                    <td>{{$data->duration}}</td>
                                    <td>{{$data->cost}}</td>
                                    <td>{{$data->client}}</td>
                                    <td>{{$data->proj_stage}}</td>
                                    <td>{{$data->proj_status}}</td>
                                    <td><a href="edit-project/{{$data->id}}">Edit</a></td>
                                    <td><a href="edit-members/{{$data->id}}">Edit Members</a></td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                @endif
                    </table>
                </div>  
            </div>
        </div>
    </div>
@include('user.nav.script')
</body>
</html>