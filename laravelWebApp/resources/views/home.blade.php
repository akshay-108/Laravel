@extends('layout.master')
@section('content')
<div class="wrapper">
<h1 class="mt-4 text-center">Registration</h1>
<form action="create" method="post">
    @csrf
    <div class="form-group">
            <label for="name">Enter Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div>{{$errors->first('name')}}</div>  
        <div class="form-group">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div>{{$errors->first('email')}}</div>  
        <div class="row">
           
            <div class="col-md-6">
                <label for="pass1">Enter Password</label>
                <input type="password" class="form-control" name="pass1" id="pass1">
                <div>{{$errors->first('pass1')}}</div>  
            </div>
            
            <div class="col-md-6">
                <label for="pass2">Confirm Password</label>
                <input type="password" class="form-control" name="pass2" id="pass2">
                <div>{{$errors->first('pass2')}}</div>  
            </div>
        </div>
    <button type="submit" class="mt-4 btn btn-primary">Register</button>
</form>
</div>
<a href="read" class="btn btn-outline-success">Go to view page</a>


@endsection('content')

