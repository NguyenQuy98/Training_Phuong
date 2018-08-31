@extends('layout.admin') 
@section('content')
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		<div id="breadcrumb"> <a href="{{route('admin.index')}}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<h1>Manage User Account</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
                                    <th>Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Flag</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($users as  $item) 
								<tr class="">

									<td>{{$item->name}}</td>
									<td>{{$item->email}}</td>
									<td>{{$item->password}}</td>
                                    
									@if($item->flag == 0)
										<td>Hoạt động</td>
									@else
										<td>Hết hoạt động</td>
									@endif
									<td>
									@csrf
										<!-- <a href="#" class="btn btn-success btn-mini">Edit</a> -->
										<a href="{{route('admin.delete_user',['id' => $item->id ])}}" onclick="return confirm('Are you sure to delete it?')" class="btn btn-danger btn-mini">Delete</a>
										
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