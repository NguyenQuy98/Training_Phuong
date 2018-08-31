@extends('layout.admin') 
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{route('admin.index')}}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage Products</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon"><a href="{{route('admin.getProduct')}}"> <i class="fas fa-plus"></i> </a></span>
						<h5>Products</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Image</th>
									<th>Name</th>
									<!-- <th>Type</th> -->
									<th>Manufactures</th>
									<th>Price (VND)</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($products as  $product) 
								<tr class="">
									<td><img src="{{asset('images/'.$product->main_image)}} " alt="sp" class="img-responsive"/></td>
									<td>{{$product->name}}</td>
									<!-- <td>category_name></td> -->
									<td>{{$product->description}}</td>
									<td>{{$product->price}}</td>
									<td>
									@csrf
										<a href="{{route('admin.getEditProduct',['id' => $product->id ])}}" class="btn btn-success btn-mini">Edit</a>
										<a href="{{route('admin.delete',['id' => $product->id ])}}" onclick="return confirm('Are you sure to delete it?')" class="btn btn-danger btn-mini">Delete</a>
										
									</td>
								</tr>
								@endforeach							
							</tbody>
						</table>

					</div>
					{{$products->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
<!--Footer-part-->
<!-- <div class="row-fluid">
	<div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
	</div> -->
<!--end-Footer-part-->
@endsection