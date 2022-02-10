@extends('layouts.app')
@section('content')
@include('sweet::alert')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registration Details</h1>
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

<form action="{{route('regist.store')}}" method="POST" enctype="multipart/form-data">
  @csrf

        <div class="mb-3">
  <label class="form-label">Registration Type</label>
  <select name="registration_type" id="registration_type" class="form-control">
           <option value="">Select Registration Type</option>
           <option value="1">GST</option>
           <option value="2">CIN</option>
           <option value="3">ESIC</option>
           <option value="4">TAN</option>
           <option value="5">PAN</option>
       </select>
   
@error('registration_type')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
        
 <div class="mb-3">
  <label class="form-label">Registration No.</label>
  <input type="text" name="registration_no" id="registration_no" class="form-control">
@error('registration_no')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>

 <div class="mb-3">
  <label class="form-label">With Effective From Date</label>
  <input type="text" name="effective_date" id="effective_date" class="form-control">
@error('effective_date')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>

<div class="mb-3">
  <label class="form-label">Certificate Browse</label>
  <div class="input-group mb-3">
  <input type="file" class="form-control" name="certificate_image" id="certificate_image">
  <label class="input-group-text">Upload</label>
</div>
@error('certificate_image')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
<input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
 </form>
<br/>
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Registration Details</h1>
          </div><!-- /.col -->
           </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Registration Type</th>
      <th scope="col">Registration No</th>
      <th scope="col">With Effective From Date</th>
      <th scope="col">Certificate Browse</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($registration as $key => $rg)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$rg->registration_type}}</td>
      <td>{{$rg->registration_no}}</td>
      <td>{{$rg->effective_date}}</td>
      <td><img src="{{asset('public/assets/custom-assets/image/registration/'.$rg->certificate_image)}}" width="90px" height="90px" alt="image"></td>
      <td>
        <a href="{{route('regist.edit',$rg->id)}}">Edit</a>
        <a href="{{route('regist.delete',$rg->id)}}">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <script>
  $( function() {
    $( "#effective_date" ).datepicker({

    });
  } );
  </script>

@endsection