@extends('layout.master')
@section('content')
<div class="wrapper">
<h1 class="mt-4 text-center">Login</h1>
<form action="{{route('usercheck')}}" method="POST">

@if(Session::get('fail'))
    <div class="alert alert-danger">
        {{Session::get('fail')}}
    </div>
@endif

<!-- @method('POST') -->
    @csrf
        <div class="form-group">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
        </div>
        <div class="text-danger">@error ('email') {{$message}} @enderror</div> 

        <div class="form-group">
            <label for="pass2">Enter Password</label>
            <input type="password" class="form-control" name="pass2" id="pass2" value="{{old('pass2')}}">
            <div class="text-danger">@error ('pass2') {{$message}} @enderror</div>
            
        </div>

    <button type="submit" class="mt-4 btn btn-primary">Login</button>
    <a class="float-end" href="{{route('create')}}">create account</a> 
</form>

</div>
<a href="read" class="btn btn-outline-success">Go to view page</a>


@endsection('content')

