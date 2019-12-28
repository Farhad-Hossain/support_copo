@extends('admin.layouts.main', ['title'=>'Admin | Service Add'])

@section('dashboard')
	@include('notification')
	<div>
		<form action="{{ route('backend.add_service') }}" method="post">
			@csrf
			<div class="row">
				<div class="col-md-6 offset-3">
					<div class="form-group">
						<label>Select Board</label>
						<select class="form-control" name="board_id" required="">
							<option>-- Select Board -- </option>
							@foreach($boards as $board)
								<option value="{{ $board->id }}">{{ $board->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Service Name</label>
						<input type="text" name="service_name" class="form-control" required="">
					</div>

					<div class="form-group">
						<input type="submit" name="" value="Add Service">
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection