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
                        <h4 class="card-title">Add New Project</h4>
                        <form class="forms-sample" action="{{url('add/proj')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" class="form-control" id="proj_name" name="proj_name" placeholder="Project Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Project Leader</label>
                                <select class="form-control" id="proj_leader" name="proj_leader">
                                    <option value="">Project Leader</option>
                                    @foreach ($staff as $staff)
                                        <option value="{{$staff['name']}}">{{$staff['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Project Type</label>
                                <select class="form-control" id="proj_type" name="proj_type">
                                    <option value="">Project Type</option>
                                    <option value="Consultancy Project">Consultancy Project</option>
                                    <option value="Research Grant Project">Research Grant Project</option>
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
    </div>
@include('user.nav.script')
</body>
</html>