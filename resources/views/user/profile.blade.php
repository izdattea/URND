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
                        @if(Auth::user() -> usertype == 1)
                            <h4 class="card-title">Users</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $data)
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->phone_number}}</td>
                                            <td>{{$data->department}}</td>
                                            <td><a href={{'edit-user/'.$data['id']}}>Edit</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h4 class="card-title">Profile</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->phone_number}}</td>
                                            <td>{{$data->department}}</td>
                                            <td><a href={{'edit-profile'}}>Edit</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.nav.css')
</body>

</html>