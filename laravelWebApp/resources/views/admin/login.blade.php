@extends('layout.master')
@section('content')

<div class="wrapper">
<form action="{{route('admin.login')}}" method="POST">

@if(Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
@endif

    @csrf
    <div class="form-group">
        <label for="adminName">Admin User-Name</label>
        <input type="text" class="form-control" name="adminName" id="adminName">
    </div>
    <div class="text-danger">@error ('adminName') {{$message}} @enderror</div> 
    <div class="form-group">
        <label for="adminPass">Admin Password</label>
        <input type="password" class="form-control" name="adminPass" id="adminPass">
    </div>
    <div class="text-danger">@error ('adminPass') {{$message}} @enderror</div> 
    <button type="submit" class="btn btn-dark">Access</button>
</form>

</div>


@endsection('content')