@extends('layouts.app')
@section('content')
@include('sweet::alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Language</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Language</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      <form action="{{route('add')}}" method="POST">
      	@csrf
     <div class="mb-3">
  <label class="form-label">Language</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="Language">
  @error('name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
<div class="mb-3">
  <label class="form-label">Language Short Name</label>
   <input type="text" class="form-control" name="short_name" id="short_name" placeholder="Language Short Name">
   @error('short_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
<input type="submit"  name="submit" id="submit" value="Add Language" class="btn btn-primary">
</form>

<br/><br/>

 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">All Languages</h1>
          </div><!-- /.col -->
           </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Language Name</th>
      <th scope="col">Language Short Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($languages as $key => $lg)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$lg->name}}</td>
      <td>{{$lg->short_name}}</td>
      <td>
        <a href="{{route('edit',$lg->id)}}">Edit</a>
        <a href="{{route('delete',$lg->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

  </div><!-- /.container-fluid -->
</div>
    <!-- /.content -->



@endsection