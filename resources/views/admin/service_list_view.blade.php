@extends('admin.layouts.main', ['title'=>'Admin | Service List'])

@section('dashboard')
	@include('notification')


	<!-- Modal -->
	<div class="modal fade" id="service_edit_modal" tabindex="-1" role="dialog" aria-labelledby="service_edit_modal" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h5 class="modal-title" >Edit Service</h5>
	      </div>
	      <div class="modal-body">
	        <form action="{{route('backend.edit_service')}}" method="post">
	        	@csrf
	        	<div class="form-group">
	        		<input type="hidden" name="service_id" value="">
	        		<label>Service Name</label>
	        		<input type="text" name="service_name" value="" class="form-control form-control-sm">
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary btn-sm">Save changes</button>
	      </div>
	      	</form>
	    </div>
	  </div>
	</div>


	<div>
		<table class="table table-responsive table-bordered table-striped">
			<thead>
				<tr>
					<th>Sl.</th>
					<th>Service Name</th>
					<th>Board</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($services as $service)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $service->name }}</td>
						<td>{{ $service->board->name }}</td>
						<td>
							@if( $service->status == 1 )
								<span style="color: green;">Active</span>
							@else
								<span style="color: red;">Inactive</span>
							@endif
						</td>
						<td>
							<span>
								<!-- Button trigger modal -->
								<a href="javascript:{}" type="button" data-toggle="modal" data-target="#service_edit_modal" onclick="rise_service_edit_modal('{{$service->id}}', '{{$service->name}}')">
								  Edit
								</a>
								<form action="{{route('backend.delete_service' )}}" method="post" id="delete_form">
									@csrf
									<input type="hidden" name="service_id" value="{{ $service->id }}">
									<a href="javascript:{}" onclick="
																	 if( confirm('Are you sure want to delete ??') ) 
																	document.getElementById('delete_form').submit();">
										Delete
									</a>	
								</form>
								
							</span>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('custom_script')
	<script type="text/javascript">
		function rise_service_edit_modal(service_id, service_name)
		{
			$("#service_edit_modal input[name='service_id']").val(service_id);
			$("#service_edit_modal input[name='service_name']").val(service_name);
		}

		$(document).ready(function(){

		});
	</script>
@endsection