@extends('master.masterpage')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                
                <h2 class="page-title">
                 Add New User
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="{{ route('view_users') }}" class="btn">
                      View Users
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
               <form class="card" method="post" action="{{url('new_user_action')}}">
			  	@csrf
                <div class="card-header">
                  <h3 class="card-title">Enter Details</h3>
                </div>
                <div class="card-body">
                  <div class="mb-3">
					<label class="form-label required">Employee ID</label>
					<div>
						<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="emp_id">
						@error('emp_id')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
				</div>
				  <div class="mb-3">
                    <label class="form-label required">Employee Name</label>
                    <div>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: Jane Pawel" name="emp_name">
                      @error('emp_name')
							<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                  </div>
				  <div class="mb-3">
                    <label class="form-label required">Official Email address</label>
                    <div>
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                      @error('email')
							<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                  </div>
				  <div class="mb-3">
                    <label class="form-label required">Contact Number</label>
                    <div>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" name="contact_number">
                       @error('contact_number')
							<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                  </div>
				  <div class="mb-3">
                              <div class="form-label">Select Designation</div>
                              <select class="form-select" name="designation">
							  <option>-Select-</option>
							  @foreach($roles as $c)
								<option value="{{$c->id}}">{{$c->role_title}}</option>
							  @endforeach
                              </select>
							  
						@error('designation')
							<small class="text-danger">{{ $message }}</small>
						@enderror
						
                            </div>
                  <div class="mb-3">
                    <label class="form-label required">Password</label>
                    <div>
                      <input type="password" class="form-control" placeholder="Password" name="password">
                      @error('password')
							<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Module Access</label>
                    <div>
						<div class="row">
						@foreach($module as $c)
								  
								  <div class="col-md-3">
								  <label class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="modules[]" value="{{$c->id}}">
									<span class="form-check-label">{{$c->module_name}}</span>
								  </label>
								  </div>
						@endforeach
						</div>
                    </div>
                  </div>
				  <!--<div class="mb-3">
                    <label class="form-label">References</label>
                    <div>
						<div class="row">
						@foreach($reference as $c)
								  
								  <div class="col-md-3">
								  <label class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="references[]" value="{{$c->id}}">
									<span class="form-check-label">{{$c->reference_name}}</span>
								  </label>
								  </div>
						@endforeach
						</div>
                    </div>
                  </div>-->
				  <div class="mb-3">
                            <div class="form-label">Source</div>
                            <div>
								<div class="row">
								@foreach($sources as $c)
										  
										  <div class="col-md-3">
										  <label class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" name="sources[]" value="{{$c->id}}">
											<span class="form-check-label">{{$c->source_name}}</span>
										  </label>
										  </div>
								@endforeach
								</div>
                    	</div>
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
	  @endsection
	  