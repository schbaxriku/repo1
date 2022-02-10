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
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Company Name</th>
		      <th scope="col">Pincode</th>
		      <th scope="col">Address</th>
		      <th scope="col">Email</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
			@if($companies)
				@foreach($companies as $key=>$company)
					    <tr>
					      <th scope="row">{{ $key+1 }}</th>
					      <td>{{ $company['company_name'] }}</td>
					      <td>{{ $company['pincode'] }}</td>
					      <td>{{ $company['address'] }}</td>
					      <td>{{ $company['email_id'] }}</td>
					      <td>{{ $company['phone_no'] }}</td>
					      <td>
					      	<a href="#">
								<button type="button" class="btn btn-primary">Edit</button>					      		
					      	</a>
					      	<a href="#">
								<button type="button" class="btn btn-danger">Delete</button>					      		
					      	</a>
					      </td>
					    </tr>
				@endforeach
			@endif
		  </tbody>
		</table>      	
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

@endsection