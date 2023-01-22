@extends('vendor.vendor_dashboard')
@section('vendor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    	<div class="page-content"> 
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Vendor Change Password</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Vendor Change</li>
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
									<form method="POST" action="{{route('update.password')}}" enctype="multipart/form-data">
											@csrf
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                            @elseif (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                            @endif
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Change Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control @error('old_password') is-invalid @enderror" 
                                                id="current_password" placeholder="Old Password" name="old_password"/>
                                                @error('old_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
										</div>
                                       
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">New Password</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                                                id="new_password" placeholder="New Password" name="new_password"/>
                                                @error('new_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
										</div>
                                        <div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">New Password Confirmation</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" 
                                                id="new_password_confirmation" placeholder="New Password Confirmation" name="new_password_confirmation"/>
                                               
                                            </div>
										</div>
                                        
										
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="submit" class="btn btn-primary px-4" value="Save Changes" />
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