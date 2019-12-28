@extends('admin.layouts.main', ['title'=>'Admin | Farhad'])
@section('custom_style')
	<style type="text/css">
		h5{
			text-align: center;
		}
	</style>
@endsection
@section('dashboard')
	<div class="row">
		<div class="col-md-6">
			<p class="h4">Today</p>
			<div class="d-flex">
				<div class="col-md-4 bg-info" style="border-right: 1px solid lightgrey">
					<h3 style="text-align: center;">{{ $today_total_pendings }}</h3>
					<h5>Pending</h5>
				</div>
				<div class="col-md-4 bg-info" style="border-right: 1px solid lightgrey">
					<h3 style="text-align: center;">{{ $today_total_successes }}</h3>
					<h5>Success / Done</h5>
				</div>
				<div class="col-md-4 bg-info">
					<h3 style="text-align: center;">{{ $today_total_sent_sms }}</h3>
					<h5>Sent Sms</h5>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<p class="h4">Archieved</p>
			<div class="d-flex">
				<div class="col-md-4 bg-info" style="border-right: 1px solid lightgrey">
					<h3 style="text-align: center;">{{ $archieved_total_pendings }}</h3>
					<h5>Success</h5>
				</div>
				<div class="col-md-4 bg-info" style="border-right: 1px solid lightgrey">
					<h3 style="text-align: center;">{{ $archieved_total_successes }}</h3>
					<h5>Pending</h5>
				</div>
				<div class="col-md-4 bg-info">
					<h3 style="text-align: center;">{{ $archieved_total_sent_sms }}</h3>
					<h5>Sent Sms</h5>
				</div>
			</div>
		</div>
	</div>
@endsection