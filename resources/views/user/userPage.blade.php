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
  <div class="banner" >
    <div class="container">
      <h1 class="font-weight-semibold">UNITEN R&D</h1>
      <h6 class="font-weight-normal text-muted pb-3">A Research and Consultancy Projects Management</h6>
      <img src="images/Group171.svg" alt="" class="img-fluid">
    </div>
  </div>
  @include('user.nav.script')
</body>
</html>