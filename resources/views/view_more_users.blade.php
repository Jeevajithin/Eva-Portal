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
                          <td><div class="progressbg-text">Contact Person</div></td>
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
                        <tr>
                          <td><div class="progressbg-text">Contact Number</div></td>
                          <td class="w-1 fw-bold text-end">9576897456</td>
                        </tr> 
                        <tr>
                          <td><div class="progressbg-text">Email Id</div></td>
                          <td class="w-1 fw-bold text-end">Irfana@gmail.com</td>
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