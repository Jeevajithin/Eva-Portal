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
                  Students Details
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
                    <h3 class="card-title">Active Students</h3>
                  </div>
				  
                  <div class="container" style="margin:20px 0px;">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="example">
                      <thead>
                        <tr>
                          <th>Admission No</th>
                          <th>Name</th>
                          <th>Course</th>
                          <th>Technology</th>
                          <th>Contact No</th>
                          <th>Total Fee</th>
                          <th>Fee Paid</th>
                          <th>Reference</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($students as $s)
                      <?php 
                      $technologyDetails = (new \App\Helper)->get_technology_details($s->id);
                      $referenceDetails = (new \App\Helper)->get_reference_details($s->id);
                      ?>
                        <tr>
                        <td>{{$s->admission_no}}</td>
                          <td>{{$s->name}}</td>
                          <td>{{$s->course_name}}</td>
                          <td>
                          @foreach($technologyDetails as $t)
                          {{$t->technology_name}}
                          @endforeach
                          </td>
                          <td>{{$s->contact_no}}</td>
                          <td>{{$s->total_fee}}</td>
                          <td>{{$s->fee_paid}}</td>                         
                          <td>
                            <ol>
                              @foreach($referenceDetails as $r)
                                <li>{{$r->emp_name}}</li>
                              @endforeach
                            </ol>
                          </td>
                          <td></td>
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