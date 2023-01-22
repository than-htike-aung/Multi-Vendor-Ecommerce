@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    	<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Inactive Vendor Details</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Inactive Vendor Details</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
									<form method="POST" action="{{route('active.vendor.approve')}}" enctype="multipart/form-data">
											@csrf
									<input type="hidden" name="id" value="{{$inactiveVendorDetails->id}}">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">User Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="username" value="{{ $inactiveVendorDetails->username }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Full Name</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="name" value="{{ $inactiveVendorDetails->name }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Email</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="email" class="form-control" name="email" value="{{ $inactiveVendorDetails->email }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Phone</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="phone" value="{{ $inactiveVendorDetails->phone }}" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Address</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="address" value="{{ $inactiveVendorDetails->address }}" />
											</div>
										</div>
										
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Join</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" class="form-control" name="vendor_join" value="{{ $inactiveVendorDetails->vendor_join }}" />
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Vendor Photo</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<img id="showImage" src="{{
													(!empty($inactiveVendorDetails->photo)) ? url('upload/vendor_images/'.$inactiveVendorDetails->photo) :
													url('upload/no-image.jpg')}}" alt="vendor" style="width: 100px; height:100px;">
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-danger px-4" value="Active Vendor" />
											</div>
										</div>
									</form>	
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>

		
@endsection