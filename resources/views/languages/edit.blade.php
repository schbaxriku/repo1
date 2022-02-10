@extends('layouts.app')
@section('content')
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
      <form action="{{route('update')}}" method="POST">
      	@csrf
        <input type="hidden" name="id" id="id" value="{{$languages->id}}">
     <div class="mb-3">
  <label class="form-label">Language</label>
  <input type="text" class="form-control" id="name" name="name" placeholder="Language" value="{{$languages->name}}">
  @error('name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
<div class="mb-3">
  <label class="form-label">Language Short Name</label>
   <input type="text" class="form-control" name="short_name" id="short_name" placeholder="Language Short Name" value="{{$languages->short_name}}">
   @error('short_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
</div>
<input type="submit"  name="submit" id="submit" value="Add Language" class="btn btn-primary">
</form>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection