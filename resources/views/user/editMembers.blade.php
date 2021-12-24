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
                                <label for="name">Member 1</label>
                                <select class="form-control" id="proj_mem1" name="proj_mem1" value="{{$data->proj_mem1}}" >
                                    @foreach ($staff as $staff)
                                        <option value="{{$staff->proj_mem1}}" @if ($data->proj_mem1 == $staff->name) selected @endif>{{$staff->proj_mem1}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Member 2</label>
                                <select class="form-control" id="proj_mem2" name="proj_mem2" value="{{$data->proj_mem2}}" >
                                    @foreach ($staff as $staff)
                                        <option value="{{$staff->proj_mem2}}" @if ($data->proj_mem2 == $staff->name) selected @endif>{{$staff->proj_mem2}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Member 3</label>
                                <select class="form-control" id="proj_mem3" name="proj_mem3" value="{{$data->proj_mem3}}" >
                                    @foreach ($staff as $staff)
                                        <option value="{{$staff->proj_mem3}}" @if ($data->proj_mem3 == $staff->name) selected @endif>{{$staff->proj_mem3}}</option>
                                    @endforeach
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