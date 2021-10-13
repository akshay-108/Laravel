@extends('layout.master')
@section('content')
<h1 class="mt-4 text-center">Laravel Crud operation</h1>
<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="name">Enter Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$crud->name}}">
        </div>

        <div class="col-md-6">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$crud->email}}">
        </div>
    </div>
    <button type="submit" class="mt-4 btn btn-warning">Update</button>
</form>
@endsection('content')