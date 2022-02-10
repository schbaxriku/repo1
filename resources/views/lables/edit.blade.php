@extends('layouts.app')
@section('content')
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
       <form action="{{route('lables.update')}}" method="POST">
        @csrf
<input type="hidden" name="id" id="id" value="{{$label_setting->id}}">
        <div class="mb-3">
  <label class="form-label">Language</label>
  
  <select name="language_id" id="language_id" class="form-control" value= "{{$label_setting->language_id}}">
  @foreach($languages as $lg)
           <option {{($lg->id==$label_setting->language_id)?'selected':''}} value="{{$lg->id}}">{{$lg->name}}</option>
        @endforeach
       </select>
   
@error('Language_id')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>
        
 <div class="mb-3">
  <label class="form-label">label Name</label>
  <input type="text" name="label_name" id="label_name" class="form-control" value="{{$label_setting->label_name}}">
@error('label_name')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>

 <div class="mb-3">
  <label class="form-label">label Value</label>
  <input type="text" name="label_value" id="label_value" class="form-control" value="{{$label_setting->label_value}}">
@error('label_value')
  <div class="alert alert-danger">{{$message}}</div>
  @enderror
</div>

<input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
 </form>

   </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection