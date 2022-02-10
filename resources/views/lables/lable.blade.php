@extends('layouts.app')
@section('content')
@include('sweet::alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <form action="{{route('lables.store')}}" method="POST">
        @csrf

        <div class="mb-3">
  <label class="form-label">Language</label>
  
  <select name="language_id" id="language_id" class="form-control">
    @foreach($languages as $lg)
           <option value="{{$lg->id}}">{{$lg->name}}</option>
           @endforeach
       </select>
   
@error('Language_id')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
        
 <div class="mb-3">
  <label class="form-label">label Name</label>
  <input type="text" name="label_name" id="label_name" class="form-control">
@error('label_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>

 <div class="mb-3">
  <label class="form-label">label Value</label>
  <input type="text" name="label_value" id="label_value" class="form-control">
@error('label_value')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>

<input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
 </form>


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
      <th scope="col">label Name</th>
      <th scope="col">label value</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($label_setting as $key => $lg)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$lg->language_id}}</td>
      <td>{{$lg->label_name}}</td>
      <td>{{$lg->label_value}}</td>
      <td>
        <a href="{{route('lables.edit',$lg->id)}}">Edit</a>
        <a href="{{route('lables.delete',$lg->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection