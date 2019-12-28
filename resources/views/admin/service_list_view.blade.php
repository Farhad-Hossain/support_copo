@extends('admin.layouts.main', ['title'=>'Admin | Service List'])

@section('dashboard')
	@include('notification')
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
								<a href="">Edit</a> | 
								<a href="">Delete</a>
							</span>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection