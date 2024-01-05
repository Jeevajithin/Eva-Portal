	@extends('master.masterpage')
	@section('content')

	<div class="page-header d-print-none">
			<div class="container-xl">
				<div class="row g-2 align-items-center">
				<div class="col">
					<!-- Page pre-title -->
					
					<h2 class="page-title">
					Add New Student
					</h2>
				</div>
				<!-- Page title actions -->
				<div class="col-auto ms-auto d-print-none">
					<div class="btn-list">
					<span class="d-none d-sm-inline">
						<a href="{{ route('view_users') }}" class="btn">
						View Students
						</a>
					</span>              
					</div>
				</div>
				</div>
			</div>
			</div>

	<div class="page-body">
			<div class="container-xl">
				<div class="row row-cards">
				@if(session()->has('success'))
			<div class= "alert alert_success">
				{{session()->get('success')}}
			</div>
			@endif
				<div class="col-md-12">
				<form class="card" method="post" action="{{url('new_student_action')}}">
						@csrf
					<div class="card-header">
					<h3 class="card-title">Enter Details</h3>
					</div>

					<div class="card-body">

			<div class="mb-3">
						<label class="form-label required">Admission Number</label>
						<div>
							<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="admission_no" value="{{ $admissionNo }}" readonly>
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

			<div class="mb-3">
						<label class="form-label required">Date of Joining</label>
						<div>
							<input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" aria-describedby="emailHelp" placeholder="" name="joining_date" max="<?= date('Y-m-d'); ?>">
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

					<div class="mb-3">
						<label class="form-label required">Student Name</label>
						<div>
							<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="student_name">
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

					<div class="mb-3">
						<label class="form-label required">Select Course</label>
						<div>
					<select class="form-select" name="course_id">
									<option>-Select-</option>
									@foreach($courses as $c)
										<option value="{{$c->id}}">{{$c->course_name}}</option>
									@endforeach
					</select>
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

			<div class="mb-3">
						<label class="form-label required">Select Technology</label>
						<div>
								<div class="row">
							@foreach($technology as $c)								  
									<div class="col-md-2">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" name="technologyids[]" value="{{$c->id}}">
										<span class="form-check-label">{{$c->technology_name}}</span>
									</label>
									</div>
							@endforeach
							</div>
							</div>
					</div>

					<div class="mb-3">
						<label class="form-label required">Fee Paid</label>
						<div>
							<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="fee_paid">
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

			<div class="mb-3">
						<label class="form-label required">Total Fees</label>
						<div>
							<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="total_fee">
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

					<div class="mb-3">
						<label class="form-label required">Contact Number</label>
						<div>
							<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="contact_no">
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

			<div class="mb-3">
						<label class="form-label required">Email ID</label>
						<div>
							<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="email">
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>
			
			<div class="mb-3">
						<label class="form-label required">Comments</label>
						<div>
							<textarea class="form-control" aria-describedby="emailHelp" name="comments" placeholder="Any preference like Offline/ Online/ Class Time and Other Comments"></textarea>
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
						</div>
					</div>

			<div class="mb-3">
						<label class="form-label required">Select Reference</label>
						<div>
					<select class="form-select" name="reference_owner" id="reference_owner">
									<option>-Select-</option>
									@foreach($reference as $c)
										<option value="{{$c->userid}}">{{$c->emp_name}}</option>
									@endforeach
					</select>
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>

				<div class="mb-3">
				<div class="form-label">Is this student shared with anyone?</div>
				<div>
					<label class="form-check form-check-inline">
					<input class="form-check-input" id="yes" type="radio" name="radios-inline">
						<span class="form-check-label">Yes</span>
					</label>

					<label class="form-check form-check-inline">
					<input class="form-check-input" id="no" type="radio" name="radios-inline" >
						<span class="form-check-label">No</span>
					</label>
				</div>
				</div>

				<div class="mb-3" id="reference" style="display:none;">
				<label class="form-label">References</label>
					<div>
						<div class="row" id="reference_data">
								
						</div>
					</div>
				</div>

				<div class="mb-3">
						<label class="form-label required">Select Source</label>
						<div>
					<select class="form-select" name="sources_id" id="sources_id">
									<option>-Select-</option>
									@foreach($sources as $c)
										<option value="{{$c->id}}">{{$c->source_name}}</option>
									@endforeach
					</select>
								@error('emp_id')
									<small class="text-danger">{{ $message }}</small>
								@enderror
							</div>
					</div>


				<div class="mb-3">
					<div class="form-label">Select multiple</div>
						<select class="form-select" name="certificate_details[]" multiple>
							<option>SSLC</option>
							<option>Plus Two</option>
							<option>Graduation</option>
						</select>
					</div>
				</div>
					

			<div class="card-footer text-end">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

		</form>
		</div>
				<div class="col-md-6"></div>
				<div class="col-lg-8">
				<div class="row row-cards">
					<div class="col-12"></div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
			$('#yes').click(function(){
				$('#reference').show();
			});
				
			$('#no').click(function(){
				$('#reference').hide();
			});

			$('#reference_owner').change(function(){
				var ref=$(this).val();

			$.ajax({
				url:'test/'+ref,
				method:"get",
		
				success:function(data){
				$('#reference_data').html(data);

				}
			});

		});
			
			});
		
			
		
		</script>
		@endsection
		