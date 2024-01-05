@extends('master.masterpage')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                
                <h2 class="page-title">
                 Edit User Details
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
              @php
                  $user = $users->first();
                @endphp
               <form class="card" method="post" action="{{url('edit_user_action')}}/{{$user->userid}}">
			  	@csrf
                <div class="card-header">
                  <h3 class="card-title">Enter Details</h3>
                </div>
                <div class="card-body"><div class="mb-3">
					<label class="form-label required">Employee ID</label>
					<div>
						<input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="emp_id" value="{{$user->emp_id}}">
						@error('emp_id')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
				</div>
				  <div class="mb-3">
                    <label class="form-label required">Employee Name</label>
                    <div>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: Jane Pawel" name="emp_name" value="{{$user->emp_name}}">
                      @error('emp_name')
							<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                  </div>
				  <div class="mb-3">
                    <label class="form-label required">Official Email address</label>
                    <div>
                      <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$user->email}}">
                      @error('email')
							<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                  </div>
				  <div class="mb-3">
                    <label class="form-label required">Contact Number</label>
                    <div>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="" name="contact_number" value="{{$user->contact_no}}">
                       @error('contact_number')
							<small class="text-danger">{{ $message }}</small>
						@enderror
                    </div>
                  </div>
				  <div class="mb-3"><div class="form-label">Select</div>
                <select class="form-select" name="designation">
                  <option>-Select-</option>
                  @foreach($roles as $c)
                  <option value="{{$c->id}}" @if($c->id == $user->designation) selected @endif>{{$c->role_title}}</option>
                  @endforeach
                </select>
							  
						@error('designation')
							<small class="text-danger">{{ $message }}</small>
						@enderror
					</div>
                 
          <div class="mb-3">
    <label class="form-label">Module Access</label>
    <div>
        <div class="row">
            <?php 
              $userModulesdetails = (new \App\Helper)->get_module_access_details($user->userid);
            ?>
            @foreach($module as $m)              
                <div class="col-md-3">
                    <label class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="modules[]" value="{{$m->id}}"
                               @if($userModulesdetails->contains('module_id', $m->id)) checked @endif>
                        <span class="form-check-label">{{$m->module_name}}</span>
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>


				  <div class="mb-3">
          <?php 
              $userReferenceDetails = (new \App\Helper)->get_reference_access_details($user->userid);
          ?>
                    <label class="form-label">References</label>
                    <div>
						<div class="row">
						@foreach($user_reference as $c)
								  
								  <div class="col-md-3">
								  <label class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="references[]" value="{{$c->userid}}"
                  @if($userReferenceDetails->contains('reference_id', $c->userid)) checked @endif>
									<span class="form-check-label">{{$c->emp_name}}</span>
								  </label>
								  </div>
						@endforeach
						</div>
                    </div>
                  </div>
				  <div class="mb-3">
          <?php 
              $userSourceDetails = (new \App\Helper)->get_source_access_details($user->userid);
          ?>
                            <div class="form-label">Source</div>
                            <div>
								<div class="row">
								@foreach($sources as $c)
										  <div class="col-md-3">
										  <label class="form-check form-check-inline">
											<input class="form-check-input" type="checkbox" name="sources[]" value="{{$c->id}}"
                      @if($userSourceDetails->contains('source_id', $c->id)) checked @endif>
											<span class="form-check-label">{{$c->source_name}}</span>
										  </label>
										  </div>
								@endforeach
								</div>
				 
                  <div class="mb-3">
                    <div class="form-label">Select Team Lead</div>
                      <select class="form-select" name="team_lead">
                        <option value="">-Select-</option>
                        @foreach($teamleads as $c)
                        <option value="{{$c->userid}}" @if($c->userid == $user->team_lead) selected @endif>{{$c->emp_name}}</option>
                        @endforeach
                      </select>
                   </div>
                  
				  	<div class="mb-3">
              <div class="form-label">Select Manager</div>
                <select class="form-select" name="manager">
                  <option value="">-Select-</option>
                  @foreach($marketingmanagers as $c)
                  <option value="{{$c->userid}}" @if($c->userid == $user->marketing_manager) selected @endif>{{$c->emp_name}}</option>
                  @endforeach
                </select>
              </div>
				   
				   <div class="mb-3">
              <div class="form-label">Select Reporting Person</div>
                  <select class="form-select" name="reporting_person">
                    <option value="">-Select-</option>
                    @foreach($managers as $c)
                    <option value="{{$c->userid}}" @if($c->userid == $user->reporting_person) selected @endif>{{$c->emp_name}}</option>
                    @endforeach
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
	  @endsection
	  