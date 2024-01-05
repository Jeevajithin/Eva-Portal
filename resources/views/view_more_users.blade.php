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

                <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">About Irfana</h3>
                    <table class="table table-sm table-borderless">
                      <thead>
                        <tr>
                          <th>Page</th>
                          <th class="text-end">Visitors</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td><div class="progressbg-text">Employee ID</div></td>
                          <td class="w-1 fw-bold text-end">5454</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Name</div></td>
                          <td class="w-1 fw-bold text-end">Irfana</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Email ID</div></td>
                          <td class="w-1 fw-bold text-end">irfana@gmail.com</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Contact Number</div></td>
                          <td class="w-1 fw-bold text-end">957896958</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Designation</div></td>
                          <td class="w-1 fw-bold text-end">Sales Associates</td>
                        </tr>
                        <tr>
                          <td><div class="progressbg-text">Reporting Person</div></td>
                          <td class="w-1 fw-bold text-end">Monisha</td>
                        </tr> 
                        <tr>
                          <td><div class="progressbg-text">Team Manager</div></td>
                          <td class="w-1 fw-bold text-end">Aarthi</td>
                        </tr> 
                        <tr>
                          <td><div class="progressbg-text">Team Lead</div></td>
                          <td class="w-1 fw-bold text-end">Nida</td>
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