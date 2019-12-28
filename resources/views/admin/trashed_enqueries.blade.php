@extends('admin.layouts.main', ['title'=>'Admin | Todays Enqueries'])

@section('custom_style')
	<style type="text/css">
		td hr{
			padding: 0px; 
			margin: 0px;
		}
	</style>
@endsection

@section('dashboard')



	<!-- Modal of sending sms	 -->
	<!-- Modal of sending sms	 -->
	<!-- Modal of sending sms	 -->
	<div id="sendSmsModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Send Sms</h4>
	      </div>
	      <div class="modal-body">
	        <form class="" action="{{ route('backend.send_feedback_sms_to_client') }}" method="post">
	        	@csrf
	        	<input type="hidden" name="enquery_id" id="send_sms_enquery_id">
	        	<input type="hidden" id="send_sms_phone_input" name="phone" readonly>
	        	<p>Sms will go to <span id="sms_presentation_span" style="color: red;"></span></p>
	        	<div class="form-group">
	        		<label>Sms Content</label>
	        		<textarea name="sms_content" class="form-control"></textarea>
	        	</div>
	        	<div class="form-group">
	        		<button type="submit" class="btn btn-sm btn-success">Send Message</button>
	        	</div>

	        </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>


	@include('notification')
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Sl.</th>
				<th colspan="3">Name | Phone | Email</th>
				<th>Board</th>
				<th>EEIN</th>
				<th>Service</th>
				<th colspan="2">Message | Feedback Message</th>
				<th>Status</th>
				<th>Documents</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			@foreach($trashed_enqueries as $enquery)
				<tr>
					<td class="align-middle">{{ $loop->iteration }}</td>
					<td colspan="3">{{ $enquery->name }} <hr /> {{ $enquery->phone }} <hr /> {{ $enquery->email }}</td>
					<td class="align-middle">{{ $enquery->board_name->name }}</td>
					<td class="align-middle">{{ $enquery->eiin }}</td>
					<td class="align-middle">{{ $enquery->service }}</td>
					<td colspan="2" class="align-middle">{{ $enquery->message }} <div style="border: 1px solid lightgrey;"></div> {{ $enquery->feedback_message ?? 'n/a' }} </td>
					<td class="align-middle">
						@if( $enquery->status == 0 )
							<span style="color: red;">Pending</span>
						@elseif( $enquery->status == 1 )
							<span style="color: deeppink;">Sms Sent</span>
						@elseif( $enquery->status == 2 )
							<span style="color: green">Success</span>
						@elseif( $enquery->status == 3 )
							<span style="color: red;">Rejected</span>
						@endif
					</td>
					<td class="align-middle">
						@if($enquery->doc1 != 'n/a')
							<a href="{{ asset('assets/documents') }}/{{$enquery->doc1}}" target="_blank">{{ "doc-1" }}</a>
						@else
							{{ 'n/a' }}
						@endif
						<hr />
						@if($enquery->doc2 != 'n/a')
							<a href="{{ asset('assets/documents') }}/{{$enquery->doc2}}" target="_blank">{{ "doc-2" }}</a>
						@else
							{{ 'n/a' }}
						@endif
					</td>
					<td>
						<span>
							<a href="#" data-toggle="modal" onclick="sendSms('{{ $enquery->id }}','{{ $enquery->phone }}')" id="sendSmsBtn" data-target="#sendSmsModal">Send Sms</a> <hr />
						</span>

						<span>
							<form action="{{ route('backend.make_enquery_done') }}" method="post">
								@csrf
								<input type="hidden" name="enquery_id" value="{{ $enquery->id }}">
								<button type="submit" style="background: none; border: none; margin: 0; padding: 0; cursor: pointer;" class="text-primary;" onclick="return confirm('Sure ??')">Done</button> <hr />
							</form>
						</span>

						<span>
							<form action="{{ route('backend.send_enquery_to_trash') }}" method="post">
								@csrf
								<input type="hidden" name="enquery_id" value="{{ $enquery->id }}">
								<button type="submit" style="background: none; border: none; margin: 0; padding: 0; cursor: pointer;" class="text-primary" onclick="return confirm('Sure ? This Enquery will be disapeare from here.')">Send to Trash</button>
							</form>
						</span>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection

@section('custom_script')
	<script>
		function sendSms(enquery_id, phone)
		{
			$("#send_sms_enquery_id").val(enquery_id);
			$("#send_sms_phone_input").val(phone);
			$("#sms_presentation_span").text(phone);
		}
		
	</script>
@endsection