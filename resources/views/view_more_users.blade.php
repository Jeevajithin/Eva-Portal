@extends('master.masterpage')
@section('content')
@php
  $user = $users->first();
@endphp
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
<div class="page-body">
          <div class="container-xl">
            
            <div class="row row-cards"> 
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="card card-link">
                        <div class="card-body"><div class="text-uppercase text-muted font-weight-medium">Total Revenue Achieved</div>
                            <div class="display-6 fw-bold my-3" style="text-align=center;">$0</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="card card-link">
                        <div class="card-body"><div class="text-uppercase text-muted font-weight-medium">Revenue Target</div>
                            <div class="display-6 fw-bold my-3">$0</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="card card-link">
                        <div class="card-body"><div class="text-uppercase text-muted font-weight-medium">Total Sales Achieved</div>
                            <div class="display-6 fw-bold my-3">$0</div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <a href="#" class="card card-link">
                        <div class="card-body"><div class="text-uppercase text-muted font-weight-medium">Revenue Target</div>
                            <div class="display-6 fw-bold my-3">$0</div>
                        </div>
                    </a>
                </div>
                <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
               
                <h3>Students Referred by {{$user->emp_name}}</h3>
              </div>
              <!-- Page title actions -->
              
            </div>
                <div class="col-lg-8">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Admission No</th>
                          <th>Name</th>
                          <th>Course</th>
                          <th>Total Fee</th>
                          <th>Fee Paid</th> 
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>SC5465</td>
                          <td class="text-muted">Archana</td>
                          <td class="text-muted">Software Testing</td>
                          <td><b>600000</b></td>
                          <td>10000</td>
                          <td><a href="#">view</a></td>
                        </tr>
                        <tr>
                          <td>SC5465</td>
                          <td class="text-muted">Sarath Chandran</td>
                          <td class="text-muted">Python</td>
                          <td><b>600000</b></td>
                          <td>10000</td>
                          <td><a href="#">view</a></td>
                        </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <?php 
                $designationDetails = (new \App\Helper)->get_designation_details($user->userid);

                $teamleadDetails = (new \App\Helper)->get_teamlead_details($user->team_lead);
                
                $managerDetails = (new \App\Helper)->get_manager_details($user->marketing_manager);

                $reportingPersonDetails = (new \App\Helper)->get_reporting_person_details($user->reporting_person);
                
              ?>
                <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">About {{$user->emp_name}}</h3>
                    <table class="table table-sm table-borderless">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th class="text-end">Details</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td><div class="progressbg-text">Employee ID</div></td>
                          <td class="w-1 fw-bold text-end">{{$user->emp_id}}</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Name</div></td>
                          <td class="w-1 fw-bold text-end">{{$user->emp_name}}</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Email ID</div></td>
                          <td class="w-1 fw-bold text-end">{{$user->email}}</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Contact Number</div></td>
                          <td class="w-1 fw-bold text-end">{{$user->contact_no}}</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Designation</div></td>
                          <td class="w-1 fw-bold text-end">{{$designationDetails->role_title}}</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Reporting Person</div></td>
                          <td class="w-1 fw-bold text-end">{{$teamleadDetails->emp_name}}</td>
                        </tr> 
                        <tr>
                          <td><div class="progressbg-text">Team Manager</div></td>
                          <td class="w-1 fw-bold text-end">{{$managerDetails->marketing_manager}}</td>
                        </tr> 
                        <tr>
                          <td><div class="progressbg-text">Team Lead</div></td>
                          <td class="w-1 fw-bold text-end">{{$reportingPersonDetails->reporting_person}}</td>
                        </tr>   
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