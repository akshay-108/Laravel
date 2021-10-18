@extends('layout.master')
@section('content')

<div class="wrapper">
	<h1 class="text-center">Crud App</h1>
	<form action="insert" method="post" name="frm">
		@csrf
		<div class="form-group">	
			<label for='name'>Enter Your Name</label>
			<input type="text" class="form-control" name="name">
		</div>
		<div class="form-group">	
			<label for='email'>Enter Your Email</label>
			<input type="email" class="form-control" name="email">
		</div>
		<div class="form-group">	
			<label for='fpass'>Enter Your Password</label>
			<input type="password" class="form-control" name="fpass">
		</div>
		<div class="form-group">	
			<label for='cpass'>Enter Confirm Password</label>
			<input type="password" class="form-control" name="cpass">
		</div>
		<button type="submit" class="btn btn-outline-primary">Insert</button>
	</form>
</div>

<table class="mt-4 table">
	<thead>
		<tr class="bg-dark text-white">
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{$crud2->id}}</td>
			<td>{{$crud2->name}}</td>
			<td>{{$crud2->email}}</td>
		</tr>
	</tbody>
</table>
@endsection