<!DOCTYPE html>
<html lang="en">

<head>
@include('user.nav.css')
</head>

<body>
<div class="container-scroller">
    @if(Auth::user()->usertype == 1)
        @include('admin.nav.navbar')
    @else
        @include('user.nav.navbar')
    @endif
    <div class="content-wrapper">
        <div class="container">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <form class="forms-sample" action="/upd/profile" method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
                            <input type="hidden" class="form-control" name="usertype" value="{{$data->usertype}}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$data['name']}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{$data->phone_number}}">
                            </div>
                            <div class="form-group">
                                <label for="name">Department</label>
                                <input type="text" class="form-control" name="department" value="{{$data->department}}">
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