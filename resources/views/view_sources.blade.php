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
                  Dashboard
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
                    <h3 class="card-title">Invoices</h3>
                  </div>
				  
                  <div class="container" style="margin:20px 0px;">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable" id="example">
                      <thead>
                        <tr>
                          <th>Source Name </th>
                          <th>Created Date </th>
                          <th>Updated Date </th>
                          <th class="w-1"></th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
					  @foreach($sources as $s)
                        <tr>
                          <td>{{$s->source_name}}</td>
                          <td>{{$s->created_at}}</td>
                          <td>{{$s->updated_at}}</td>
                          <td><a href="{{ route('edit_source', $s->id) }}">Edit</a></td>
            <td><a href="{{ route('delete_source', $s->id) }}" onclick="return confirm('Are you sure you want to delete this source?')">Delete</a></td>
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