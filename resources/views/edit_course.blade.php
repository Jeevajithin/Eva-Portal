@extends('master.masterpage')
@section('content')
<div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                
                <h2 class="page-title">
                 Add New Courses
                </h2>
              </div>
              <!-- Page title actions -->
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                  <span class="d-none d-sm-inline">
                    <a href="" class="btn">
                      View Current Courses
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
			
              
              <div class="col-md-12">
              <form class="card" method="post" action="{{url('edit_course_action')}}/{{$course->id}}">
			  @csrf
                <div class="card-header">
                  <h3 class="card-title">Enter Details</h3>
                </div>
                <div class="card-body">
                  <div class="mb-3">
                    <label class="form-label required">Course ID</label>
                    <div>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: 46872" name="course_id" value="{{$course->course_id}}">
                      <small class="form-hint"></small>
                    </div>
                  </div>
				  <div class="mb-3">
                    <label class="form-label required">Course Name</label>
                    <div>
                      <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Eg: Laravel" name="course_name" value="{{$course->course_name}}">
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