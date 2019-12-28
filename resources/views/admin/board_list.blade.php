@extends('admin.layouts.main', ['title'=>'Admin | All Board'])

@section('dashboard')
	<!-- Modal -->
	<div id="edit_board_modal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Edit Board</h4>
	      </div>
	      <div class="modal-body">
	        <form action="{{ route('backend.board_edit') }}" method="post">
	        	@csrf
	        	<input type="hidden" name="board_id" id="edit_board_id_input_field">
	        	<div class="form-group">
	        		<label>Edit the Name</label>
	        		<input type="text" name="edit_board_name" id="edit_board_name_input_field" class="form-control">
	        	</div>

	        	<div class="form-group">
	        		<input type="submit" name="" class="btn btn-success btn-sm" value="Save Changes">
	        	</div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

	<div class="row">
		@include('notification')
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Sl.</th>
					<th>Name</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($boards as $board)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $board->name }}</td>
						<td>
							@if( $board->status == 1 )
								<span style="color: green;">Active</span>
							@else
								<span style="color: red;">Inactive</span>
							@endif
						</td>
						<td>
							<span>
								<a href="#" data-toggle="modal" data-target="#edit_board_modal" onclick="arise_edit_modal_with_data('{{$board->id}}', '{{$board->name}}')">Edit</a> | 
								<form action="{{ route('backend.board_delete') }}" method="post" style="display: hidden;">
									@csrf
									<input type="hidden" name="delete_board_input_id" value="{{ $board->id }}">
									<button type="submit" style="border: none; padding: 0; margin: 0;background: none; display: inline;" onclick="return confirm('Are you sure to delete this board ?')">Delete</button>
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
		function arise_edit_modal_with_data(board_id, board_name)
		{
			$("#edit_board_id_input_field").val(board_id);
			$("#edit_board_name_input_field").val(board_name);
		}
	</script>
@endsection