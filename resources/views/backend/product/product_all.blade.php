@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">All Product</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Product Table</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('add.product')}}"  class="btn btn-primary">Add Product</a>
							
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
			<h6>
				Product List : <span class="badge rounded-pill bg-danger">{{count($products)}}</span>
			</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sl</th>
										<th>Image</th>
										<th>Product Name</th>
                                        <th>Price</th>
										<th>QTY</th>
                                        <th>Discount</th>
										<th>Status</th>
                                        <th>Action</th>
										
									</tr>
								</thead>
								<tbody>
                @foreach ($products as $key => $item )
                <tr>
                        <td>{{ $key+1 }}</td>
                       
                        <td>
                            <img src="{{asset($item->product_thambnail)}}" style="width: 70px; height:40px" alt="no-img">
        
                        </td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>{{$item->product_qty}}</td>
                        <td>
							@if ($item->discount_price == NULL)
							<span class="badge rounded-pill bg-info">No Discount</span>
							@else
							@php
								$amount = $item->selling_price - $item->discount_price;
								$discount = ($amount/$item->selling_price) * 100;

							@endphp
							<span class="badge rounded-pill bg-danger">{{round($discount)}} %</span>
							@endif
					
                        <td>
							@if ($item->status == 1)
								<span class="badge rounded-pill bg-success">Acitve</span>
							@else
								<span class="badge rounded-pill bg-danger">InAcitve</span>
							@endif
						</td>

                        <td>
                            <a href="{{route('edit.product', $item->id)}}" class="btn btm-sm btn-info" title="edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{route('delete.product', $item->id)}}" class="btn btn-sm btn-danger" title="delete" id="delete"><i class="fa fa-trash"></i></a>

							<a href="{{route('edit.category', $item->id)}}" class="btn btm-sm btn-info" title="details"><i class="fa fa-eye"></i></a>
                            @if ($item->status == 1)
							<a href="{{route('product.inactive', $item->id)}}" class="btn btn-sm btn-danger" title="inactive" ><i class="fa-solid fa-thumbs-down"></i></a>
							@else
							<a href="{{route('product.active', $item->id)}}" class="btn btn-sm btn-primary" title="active" ><i class="fa-solid fa-thumbs-up"></i></a>
							@endif
							
                        </td>
                        
                    </tr>   
                @endforeach    
									
									
								</tbody>
								
							</table>
						</div>
					</div>
				</div>

</div>
@endsection