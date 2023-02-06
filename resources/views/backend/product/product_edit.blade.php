@extends('admin.admin_dashboard')
@section('admin')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
<!-- -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit Product</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </nav>
    </div>
    
</div>
<!--end breadcrumb-->

<div class="card">
  <div class="card-body p-4">
      <h5 class="card-title">Edit New Product</h5>
      <hr/>
      <form id="myForm" action="{{route('update.product')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$products->id}}"/>
       <div class="form-body mt-4">
        <div class="row">
           <div class="col-lg-8">
           <div class="border border-3 p-4 rounded">
            <div class="form-group mb-3">
                <label for="inputProductTitle" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="product_name" value="{{$products->product_name}}" id="inputProductTitle" placeholder="Enter product name">
              </div>
              <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Product Tags</label>
                <input type="text" name="product_tags" value="{{$products->product_tags}}" class="form-control visually-hidden" data-role="tagsinput" value="men,women,child">
              </div>
              <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Product Size</label>
                <input type="text" name="product_size" value="{{$products->product_size}}" class="form-control visually-hidden" data-role="tagsinput" value="small,medium,large">
              </div>
              <div class="mb-3">
                <label for="inputProductTitle" class="form-label">Product Color</label>
                <input type="text" name="product_color" value="{{$products->product_color}}" class="form-control visually-hidden" data-role="tagsinput" value="red,blue,green">
              </div>
              <div class="form-group mb-3">
                <label for="inputProductDescription" class="form-label">Short Description</label>
                <textarea class="form-control" id="inputProductDescription" name="short_descp" rows="3">
                   {{$products->short_descp}}
                </textarea>
              </div>
              <div class="form-group mb-3">
                <label for="inputProductDescription" class="form-label">Long Description</label>
                <textarea class="form-control" name="long_descp" id="mytextarea" rows="3">
                  {{$products->long_descp}}
                </textarea>
              </div>
             
             
            </div>
           </div>
           <div class="col-lg-4">
            <div class="border border-3 p-4 rounded">
              <div class="row g-3">
                <div class="form-group col-md-6">
                    <label for="inputPrice" class="form-label">Product Price</label>
                    <input type="text" class="form-control" name="selling_price" value="{{$products->selling_price}}" id="inputPrice" placeholder="00.00">
                  </div>
                  <div class="col-md-6">
                    <label for="inputCompareatprice" class="form-label">Discount Price</label>
                    <input type="text" name="discount_price" value="{{$products->discount_price}}" class="form-control" id="inputCompareatprice" placeholder="00.00">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputCostPerPrice" class="form-label">Product Code</label>
                    <input type="text" name="product_code" value="{{$products->product_code}}" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputStarPoints" class="form-label">Product Quantity</label>
                    <input type="text" name="product_qty" value="{{$products->product_qty}}" class="form-control" id="inputStarPoints" placeholder="00.00">
                  </div>
                  <div class="form-group col-12">
                    <label for="inputProductType" class="form-label">Product Brands</label>
                    <select class="form-select" name="brand_id" id="inputProductType">
                        <option></option>
                        @foreach ($brands as $item )
                        <option value="{{$item->id}}" 
                          {{ $item->id == $products->brand_id ? 'selected': '' }}
                        >{{$item->brand_name}}</option>
                        
                        @endforeach
                        
                      </select>
                  </div>
                  <div class="form-group col-12">
                    <label for="inputProductType" class="form-label">Product Category</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option></option>
                        @foreach ($categories as $item )
                        <option value="{{$item->id}}"
                          {{ $item->id == $products->category_id ? 'selected': '' }}
                        >{{$item->category_name}}</option>
                          @endforeach                                            
                      </select>
                  </div>
                  <div class="form-group col-12">
                    <label for="inputProductType" class="form-label">Product Subcategory</label>
                    <select class="form-select"  name="subcategory_id" id="subcategory_id">
                        <option></option>
                        @foreach ($subcategories as $item )
                        <option value="{{$item->id}}"
                          {{ $item->id == $products->subcategory_id ? 'selected': '' }}
                        >{{$item->subcategory_name}}</option>
                          @endforeach  
                      </select>
                  </div>
                  <div class="col-12">
                    <label for="inputVendor" class="form-label">Select Vendor</label>
                    <select class="form-select" name="vendor_id" id="inputVendor">
                        <!-- <option>Select Vendor user</option> -->
                        @foreach ($activeVendor as $vendor )
                        <option value="{{$vendor->id}}"
                        {{ $vendor->id == $products->vendor_id ? 'selected': '' }}
                        >{{$vendor->name}}</option>
                          @endforeach
                        
                        
                      </select>
                  </div>
                 
                  <div class="col-12">
                    <div class="row g-3">
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" {{ $products->hot_deals == 1 ? 'checked': '' }} name="hot_deals" id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">Hot deals</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="featured" {{ $products->featured == 1 ? 'checked': '' }} id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">Featured</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="speical_offer" {{ $products->special_offer == 1 ? 'checked': '' }} id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">Speical offer</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="special_deals" {{ $products->special_deals == 1 ? 'checked': '' }} id="flexCheckChecked" >
                            <label class="form-check-label" for="flexCheckChecked">Special deals</label>
                          </div>
                        </div>
                    </div> <!-- end row -->
                 
                  </div>
                  <div class="col-12">
                      <div class="d-grid">
                      <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                      </div>
                  </div>
              </div> 
          </div>
          </div>
       </div><!--end row-->
    </div>
    </form>
  </div>
</div>

</div>
<!-- Main Image Thambnail update -->
<div class="page-content">
  <h6 className="mb-0 text-uppercase">Update Main Image Thambnail</h6>
  <hr>
  <div class="card">
    <form method="POST" action="{{route('update.product.thambnail')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$products->id}}">
				<input type="hidden" name="old_img" value="{{$products->product_thambnail}}">		
        <div class="card-body">
								<div class="mb-3">
									<label for="formFile" class="form-label">Choose Thambnail Image</label>
									<input class="form-control" name="product_thambnail" type="file" id="formFile">
								</div>
								<div class="mb-3">
									
                  <img src="{{asset($products->product_thambnail)}}" style="width: 100px; height:100px;">
								</div>
                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
							</div>
      </form>
						</div>
</div>
<!--End Main Image Thambnail update -->

<!-- Multi Image  update -->
<div class="page-content">
  <h6 className="mb-0 text-uppercase">Update Multi Image</h6>
  <hr>
  <div class="card">
   
        <div class="card-body">
								<table class="table mb-0 table-striped">
									<thead>
										<tr>
											<th scope="col">#Sl</th>
											<th scope="col">Image</th>
											<th scope="col">Change Image</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
                  
									<tbody>
    <form method="POST" action="{{route('update.product.multiimage')}}" enctype="multipart/form-data">
        @csrf

            @foreach ($multiImgs as $key => $img )
              
										<tr>
											<th scope="row">{{$key+1}}</th>
					 <td><img src="{{asset($img->photo_name)}}" style="width: 70px; height:40px"></td>
											<td><input type="file" class="form-group" name="multi_img[{{$img->id}}]"></td>
											<td>
                      <input type="submit" class="btn btn-primary px-4" value="Update Image" />
                  <a href="{{route('product.multiimg.delete', $img->id)}}" id="delete" class="btn btn-danger"> Delete</a>      
                      </td>
										</tr>
          @endforeach
    </form>			
									</tbody>
								</table>
							</div>
      </form>
						</div>
</div>
<!--End Multi image update -->
<!-- Validation -->

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                }, 
                short_descp: {
                    required : true,
                }, 
                long_descp: {
                    required : true,
                }, 
                product_thambnail: {
                    required : true,
                }, 
                multi_img: {
                    required : true,
                }, 
                selling_price: {
                    required : true,
                }, 
             
                product_code: {
                    required : true,
                }, 
                product_qty: {
                    required : true,
                }, 
                brand_id: {
                    required : true,
                }, 
                category_id: {
                    required : true,
                }, 
                subcategory_id: {
                    required : true,
                }, 
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
                },
                short_descp: {
                    required : 'Please Enter Short description',
                },
                long_descp: {
                    required : 'Please Enter Long description',
                },
                product_thambnail: {
                    required : 'Please select product thambnail image',
                },
                multi_img: {
                    required : 'Please select product multi image',
                },
                selling_price: {
                    required : 'Please Enter Selling Price',
                },
             
                product_code: {
                    required : 'Please Enter Product Code',
                },
                product_qty: {
                    required : 'Please Enter Product Quantity',
                },
                
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

<script>
  function mainThamUrl(input){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainThmb').attr('src', e.target.result).width(80).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script> 
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
  </script>

<script type="text/javascript">
  		
  		$(document).ready(function(){
        
  			$('select[name="category_id"]').on('change', function(){
  				var category_id = $(this).val();
  				if (category_id) {
  					$.ajax({
              headers: { 'csrftoken' : '{{ csrf_token() }}' },
  						url: "{{ url('/subcategory/ajax') }}/"+category_id,
  						type: "GET",
  						dataType:"json",
  						success:function(data){
  							$('select[name="subcategory_id"]').html('');
  							var d =$('select[name="subcategory_id"]').empty();
  							$.each(data, function(key, value){
  								$('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
  							});
  						},
  					});
  				} else {
  					alert('danger');
  				}
  			});
  		});
  </script>
@endsection