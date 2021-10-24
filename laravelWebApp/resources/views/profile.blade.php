@extends('layout.master')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="profile">Socia Account</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-condivols="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="profile" href="profile">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        

        <!-- display name -->
        <li class="nav-item li">
          <a class="nav-link active" href="#">Welcome {{$LoggedUserInfo['name']}}</a>
        </li>
        <li class="nav-item lo">
          <a class="nav-link active" href="{{route('userlogout')}}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


@section('content')
<div class="card profile-card mt-4 mb-3 p-4">
<h3>Profile</h3>
      <div>
        <div>
          <span class="text-danger">Name : </span>
          <input type="text" id="userdata" value="{{$LoggedUserInfo['name']}}" readonly>
          <i class="far fa-edit" id="edit-data" title="edit"></i>
          <i class="fas fa-trash-alt" id="delete-data" title="delete"></i>
        </div>

        <div>
          <span class="text-danger">Email : </span>
          <input type="email" id="userdata" value="{{$LoggedUserInfo['email']}}" readonly>
          <i class="far fa-edit" id="edit-data" title="edit"></i>
          <i class="fas fa-trash-alt" id="delete-data" title="delete"></i>
        </div>

        <div>
          <span class="text-danger">Password : </span>
          <input type="password" id="userdata" value="{{$LoggedUserInfo['password']}}" readonly>
          <i class="far fa-edit" id="edit-data" title="edit"></i>
          <i class="fas fa-trash-alt" id="delete-data" title="delete"></i>
        </div>
      </div>
</div>
@endsection('content')

@section('script')
<script>

$(document).ready(function()
{
  $("#edit-data").click(function()
  {
    $("#userdata").removeAttr('readonly');
  })
});

</script>
@endsection('script')