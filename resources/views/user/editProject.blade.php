<!DOCTYPE html>
<html lang="en">
<head>
@include('user.nav.css')
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    @include('user.nav.navbar')
    <div class="content-wrapper">
        <div class="container">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Projects</h4>
                        <div class="table-responsive">
                        <form class="forms-sample" action="/upd/project" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" class="form-control" name="proj_name" value="{{$data->proj_name}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Project Leader</label>
                                <select class="form-control" id="proj_leader" name="proj_leader" value="{{$data->proj_leader}}" >
                                    @foreach ($staff as $staff)
                                        <option value="{{$staff->name}}" @if ($data->proj_leader == $staff->name) selected @endif>{{$staff->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label>Project Leader</label>
                                <input type="text" class="form-control" name="proj_leader" value="{{$data->proj_leader}}">
                            </div>  -->
                            <div class="form-group">
                            <label for="name">Number of Member</label>
                                <select class="form-control" id="proj_members" name="proj_members">
                                    <option value="">{{$data->proj_members}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Project Type</label>
                                <select class="form-control" id="proj_type" name="proj_type">
                                    <option value="{{$data->proj_type}}">{{$data->proj_type}}</option>
                                    <option value="Consultancy Project">Consultancy Project</option>
                                    <option value="Research Grant Project">Research Grant Project</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Start Date</label>
                                <input type="date" class="form-control" name="start_date" value="{{$data->start_date}}">
                            </div>
                            <div class="form-group">
                                <label for="name">End Date</label>
                                <input type="date" class="form-control" name="end_date" value="{{$data->end_date}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Duration (Months)</label>
                                <input type="text" class="form-control" name="duration" value="{{$data->duration}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Cost</label>
                                <input type="text" class="form-control" name="cost" value="{{$data->cost}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Client</label>
                                <input type="text" class="form-control" name="client" value="{{$data->client}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Project Stage</label>
                                <select class="form-control" name="proj_stage">
                                    <option value="{{$data->proj_stage}}">{{$data->proj_stage}}</option>
                                    <option value="Inception">Inception</option>
                                    <option value="Milestone 1">Milestone 1</option>
                                    <option value="Milestone 2">Milestone 2</option>
                                    <option value="Final Report">Final Report</option>
                                    <option value="Closing">Closing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Project Status</label>
                                <select class="form-control" name="proj_status">
                                    <option value="{{$data->proj_status}}">{{$data->proj_status}}</option>    
                                    <option value="On Track">On Track</option>
                                    <option value="Delayed">Delayed</option>
                                    <option value="Extended">Extended</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{url()->previous()}}" class="btn btn-light">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.nav.script')
</body>
</html>