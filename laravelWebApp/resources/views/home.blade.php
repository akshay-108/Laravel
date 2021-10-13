@extends('layout.master')
@section('content')
<h1 class="mt-4 text-center">Laravel Crud operation</h1>
<form action="create" method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="name">Enter Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="col-md-6">
            <label for="email">Enter Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
    </div>
    <button type="submit" class="mt-4 btn btn-primary">Insert</button>
</form>

<table class="table text-center">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i=1
        @endphp
        @foreach($crud as $data)
        <tr>
            <td>{{$i}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            <td>
                <a href="edit/{{$data->id}}" class="btn btn-info">Edit</a>   
            </td>
            <td>
                <a href="{{$data->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @php
            $i++
        @endphp
        @endforeach
    </tbody>
</table>

<span>
    {{$crud->links()}}
</span>
<style>
    .w-5{
        display:none;
    }
    p {
        /* margin-top: 0;
        margin-bottom: 1rem;
        position: absolute;
        left: 332px;
        top: 426px; */
    }
    .shadow-sm {
        /* box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        position: absolute;
        top: 477px; */
    }
</style>
@endsection('content')

