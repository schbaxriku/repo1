@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Edit Registration Details</h1>
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

<form action="{{route('regist.update',$registration->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
<input type="hidden" name="id" id="id" value="{{$registration->id}}">
        <div class="mb-3">
  <label class="form-label">Registration Type</label>
  <select name="registration_type" id="registration_type" class="form-control">
           <option value="">Select Registration Type</option>
           <option value="1" {{(1==$registration->registration_type)?'selected':''}}>GST</option>
           <option value="2"{{(2==$registration->registration_type)?'selected':''}}>CIN</option>
           <option value="3"{{(3==$registration->registration_type)?'selected':''}}>ESIC</option>
           <option value="4"{{(4==$registration->registration_type)?'selected':''}}>TAN</option>
           <option value="5"{{(5==$registration->registration_type)?'selected':''}}>PAN</option>
       </select>
   
@error('registration_type')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
        
 <div class="mb-3">
  <label class="form-label">Registration No.</label>
  <input type="text" name="registration_no" id="registration_no" class="form-control" value="{{$registration->registration_no}}">
@error('registration_no')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>

 <div class="mb-3">
  <label class="form-label">With Effective From Date</label>
  <input type="text" name="effective_date" id="effective_date" class="form-control" value="{{$registration->effective_date}}">
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
<div>
   <img src="{{asset('public/assets/custom-assets/image/registration/'.$registration->certificate_image)}}" width="90px" height="90px" alt="image">
</div class="mb-3"><br/>
<input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
 </form>

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