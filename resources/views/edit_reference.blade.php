@extends('master.masterpage')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                
                <h2 class="page-title">
                 Edit Source Details
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="" class="btn">
                      View Current Sources
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
              <form class="card" method="post" action="{{url('edit_reference_action')}}/{{$reference->id}}">
			  @csrf
                <div class="card-header">
                  <h3 class="card-title">Enter Details</h3>
                </div>
                <div class="card-body">
				  <div class="mb-3">
                    <label class="form-label required">Reference Name</label>
                    <div>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: Facebook" name="reference_name" value="{{$reference->reference_name}}">
                      <small class="form-hint"></small>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-end">
                  <button type="submit" class="btn btn-primary">Update</button>
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
	  <script type="text/javascript">
        function closeAlert() {
		  var alertElement = document.getElementById('alert');
		  if (alertElement) {
			alertElement.style.display = 'none'; 
		  }
		}

	setTimeout(closeAlert, 5000);
     </script>
	  @endsection