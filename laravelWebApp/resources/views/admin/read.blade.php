@extends('layout.master')
@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
@if(session('fail'))
<div class="alert alert-danger">
    {{session('fail')}}
</div>
@endif
<table class="table text-center table-bordered">
    <thead class="bg-dark text-white">
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
                <button type="button" value="{{$data->id}}" class="btn btn-info editbtn">Edit</button>   
            </td>
            <td>
                <!-- <button type="button" value="{{$data->id}}" class="btn btn-danger delbtn">Delete</button> -->
                <a href="delete/{{$data->id}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @php
            $i++
        @endphp
        @endforeach
    </tbody>
</table>

<!-- pagination -->
<span>
    {{$crud->links()}}
</span>
<style>
    .w-5{
        display:none;
    }
</style>

<br><br>
<a href="create" class="btn btn-outline-success">Go to registration page</a>
<a href="profile" class="btn btn-outline-success">Go to Profile page</a>


<!-- Edit modal -->
<div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="read" method="POST">
            @csrf
            <!-- @method('PUT') -->

            <input type="hidden" name="data_id" id="data_id">
            <div class="row">
                <div class="col-md-6">
                    <label for="name">Enter New Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                <div class="col-md-6">
                    <label for="email">Enter New Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="update_data" class="btn btn-warning">Update</button>
                </div>
            </div>    
        </form>
    </div>
  </div>
</div>



@endsection('content')




@section('script')
<script>

    // alert('hello');
    // update code
    $(document).ready(function()
    {
        $(document).on('click','.editbtn',function()
        {
            var data_id=$(this).val();
            // alert(data_id);
            $('#EditModal').modal('show');

            $.ajax({
                type:"GET",
                url:'read/'+data_id,
                // alert(data_id);
                success:function(response)
                {
                    // console.log(response);
                    // console.log(response.crud.name);
                    $('#data_id').val(data_id);
                    $('#name').val(response.crud.name);
                    $('#email').val(response.crud.email);
                }   
            });
        });
    });

</script>
@endsection('script')