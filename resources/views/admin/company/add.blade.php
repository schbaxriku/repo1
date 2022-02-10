@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
@include('sweet::alert')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Company</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
      	<form action="{{ route('company_store') }}" method="post" enctype="multipart/form-data">
      	@csrf
        <div class="row">
        	<div class="col-lg-6">
				<div class="mb-3">
				  <label for="company_code" class="form-label">Comany Code</label>
				  <input type="text" class="form-control" id="company_code"  name="company_code" placeholder="company code">
					@error('company_code')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-6">
				<div class="mb-3">
				  <label for="company_name" class="form-label">Comany Name</label>
				  <input type="text" class="form-control" id="company_name"  name="company_name" placeholder="company name">
					@error('company_name')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-4">
				<div class="mb-3">
					<label for="country_id" class="form-label">Country Name</label>
					<select class="form-control form-select get-data" aria-label="Default select example" id="country_id" name="country_id" data-target="state_id" data-table="state" data-url="{{ route('get_data_by_ajax') }}" data-token="{{ csrf_token() }}" data-filtered_by="country_id">
						<option value="">Select Country Name</option>
						@if($countries)
							@foreach($countries as $country)
								<option value="{{ $country['id'] }}">{{ $country['name'] }}</option>
							@endforeach
						@endif
					</select>
					@error('country_id')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>        	
        	<div class="col-lg-4">
				<div class="mb-3">
					<label for="state_id" class="form-label">State Name</label>
					<select class="form-control form-select get-data" aria-label="Default select example" id="state_id" name="state_id" data-target="city_id" data-table="city" data-url="{{ route('get_data_by_ajax') }}" data-token="{{ csrf_token() }}" data-filtered_by="state_id">
						<option value="">Select State Name</option>
					</select>
					@error('state_id')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>        	
        	<div class="col-lg-4">
				<div class="mb-3">
					<label for="city_id" class="form-label">City Name</label>
					<select class="form-control form-select" aria-label="Default select example" id="city_id" name="city_id">
						<option value="">Select City Name</option>
					</select>
					@error('city_id')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>        	
        	<div class="col-lg-4">
				<div class="mb-3">
				  <label for="pincode" class="form-label">Pin Code</label>
				  <input type="text" class="form-control" id="pincode"  name="pincode" placeholder="Pin Code">
					@error('pincode')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-4">
				<div class="mb-3">
				  	<label for="address" class="form-label">Address</label>
					<textarea class="form-control" id="address" name="address" rows="3"></textarea>
					@error('address')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-4">
				<div class="mb-3">
				  <label for="email_id" class="form-label">Email Id</label>
				  <input type="email" class="form-control" id="email_id"  name="email_id" placeholder="email id">
					@error('email_id')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-4">
				<div class="mb-3">
				  <label for="phone_no" class="form-label">Phone No</label>
				  <input type="text" class="form-control" id="phone_no"  name="phone_no" placeholder="phone no">
					@error('phone_no')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-4">
				<div class="mb-3">
				  <label for="fax_no" class="form-label">Fax No</label>
				  <input type="text" class="form-control" id="fax_no"  name="fax_no" placeholder="Fax No">
					@error('fax_no')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-4">
				<div class="mb-3">
				  <label for="website" class="form-label">Website</label>
				  <input type="text" class="form-control" id="website"  name="website" placeholder="website">
					@error('website')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-6">
				<div class="mb-3">
				 	<label for="registration_type" class="form-label">Registration Type</label>
					<select class="form-control form-select" aria-label="Default select example" id="registration_type" name="registration_type">
						<option value="">Select Registration Type</option>
						<option value="1">CIN</option>
						<option value="2">GST</option>
					</select>
					@error('registration_type')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>        		
        	</div>
        	<div class="col-lg-6">
				<div class="mb-3">
					<label for="logo" class="form-label">Logo</label>
				 	<input type="file" class="form-control" id="logo" name="logo">
					@error('logo')
					    <div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>

        	</div>
        	<div class="col-lg-6">
				<div class="mb-3">
					<button type="submit" class="btn btn-primary">Add</button>
				</div>

        	</div>
        </div>
	    </form>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection