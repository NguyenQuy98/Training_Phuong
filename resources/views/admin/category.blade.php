@extends('layout.admin') 
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{route('admin.index')}}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage Product Type</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon"><a href="{{route('admin.getProductType')}}"> <i class="fas fa-plus"></i> </a></span>
						<h5>Product Type</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>slug</th>
									<th>perent</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($categories as  $item) 
								<tr class="">

									<td>{{$item->name}}</td>
									<td>{{$item->slug}}</td>
									<td>{{$item->perent_id}}</td>
									<!-- <td>{{$item->status}}</td> -->
									@if($item->status == 0)
										<td>Sale</td>
									@else
										<td>New</td>
									@endif
									<td>
									@csrf
										<a href="{{route('admin.getEditType',['id' => $item->id ])}}" class="btn btn-success btn-mini">Edit</a>
										<a href="{{route('admin.delete_category',['id' => $item->id ])}}" onclick="return confirm('Are you sure to delete it?')" class="btn btn-danger btn-mini">Delete</a>
										
									</td>
								</tr>
								@endforeach							
							</tbody>
						</table>

					</div>
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