@extends('admin.layouts.main', ['title'=>'Admin | Add a Board'])

@section('dashboard')
	<div class="row">
		@include('notification')
		<div class="col-md-6 offset-3">
			<form action="{{ route('backend.add_board') }}" method="post">
				@csrf
				<div class="form-group">
					<label>Board Name</label>
					<input type="text" name="board" class="form-control" required>
				</div>

				<div class="form-group">
					<input type="submit" name="" value="Add Board" class="btn btn-sm btn-primary">
				</div>
			</form>
		</div>
	</div>
@endsection