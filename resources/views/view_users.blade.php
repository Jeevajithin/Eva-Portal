@extends('master.masterpage')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                  Overview
                </div>
                <h2 class="page-title">
                  User Details
                </h2>
              </div>
              <!-- Page title actions -->
              
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">
            @if(session()->has('success'))
          <div class= "alert alert_success">
            {{session()->get('success')}}
          </div>
          @endif
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Active Users </h3>
                  </div>
				  
                  <div class="container" style="margin:20px 0px;">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="example">
                      <thead>
                        <tr>
                          <th>Employee ID</th>
						              <th>Name</th>
						              <th>Email</th>
						              <th>Contact Number</th>
						              <th>Designation</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
					  @foreach($users as $s)
                      <?php 
                        $designationDetails = (new \App\Helper)->get_designation_details($s->designation);
                      ?>
                        <tr>
                          <td>{{$s->emp_id}}</td>
						              <td>{{$s->emp_name}}</td>
                          <td>{{$s->email}}</td>
                          <td>{{$s->contact_no}}</td>
                          <td>{{$designationDetails->role_title}}</td>          			  
                          <td>
              <a href="{{ route('edit_user', $s->userid) }}"><img src="{{url('asset/static/img/edit.svg')}}" width="30" /></a>
              <a href="{{ route('delete_user', $s->userid) }}" onclick="return confirm('Are you sure you want to delete this user?')"><img src="{{url('asset/static/img/trash.svg')}}" width="30" /></a>
              <a href="{{ route('view_more_users', $s->userid) }}"><img src="{{url('asset/static/img/view_more.svg')}}" width="40" /></a>
                          </td>
                        </tr>
						@endforeach
                      </tbody>
                    </table>
                  </div>
				  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
		@endsection