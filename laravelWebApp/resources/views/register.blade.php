@extends('layout.master')
@section('content')
<div class="wrapper">
<h1 class="mt-4 text-center">Registration</h1>

<form action="create" method="post">

@if(Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif

@if(Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
@endif

    @csrf
    <div class="form-group">
            <label for="name">Enter Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
        </div>
        <div class="text-danger">@error ('name') {{$message}} @enderror</div> 
        <div class="form-group">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
        </div>
        <div class="text-danger">@error ('email') {{$message}} @enderror</div>
        <div class="row">
           
            
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
            <div class="text-danger">@error ('password') {{$message}} @enderror</div>  
        </div>
        </div>
    <button type="submit" class="mt-4 btn btn-primary">Register</button>
    <a class="float-end" href="{{route('userlogin')}}">Already have an account</a> 
</form>
</div>
<a href="read" class="btn btn-outline-success">Go to view page</a>


@endsection('content')

