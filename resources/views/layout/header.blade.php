<div class="sticky-top">
        <header class="navbar navbar-expand-md sticky-top d-print-none" >
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
              <a href="{{ route('dashboard') }}">
                <img src="{{url('asset/static/logo_new.svg')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
              </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
              
             
              <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                  <span class="avatar avatar-sm" style="background-image: url('{{("asset/static/img/sristhi_logo.png") }}')"></span>
                  <div class="d-none d-xl-block ps-2">
                    <div>Eva Portal</div>
                    
                    <div class="mt-1 small text-muted">ADMIN</div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <a href="" class="dropdown-item">Profile Settings</a>
                  <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                </div>
              </div>
            </div>

          </div>
        </header>
        <header class="navbar-expand-md">
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
              <div class="container-xl">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Home
                      </span>
                    </a>
                  </li>
          
				          <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Users
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('new_user') }}" rel="noopener">
                        New User
                      </a>
					            <a class="dropdown-item" href="{{ route('view_users') }}" rel="noopener">
                       View All
                      </a>
                                           
                    </div>
                  </li>
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Students
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('new_student') }}" rel="noopener">New Student</a>
					            <a class="dropdown-item" href="{{ route('view_students') }}" rel="noopener">
                       View All
                      </a>
                      <a class="dropdown-item" href="{{ route('add_bulk_data') }}" rel="noopener">
                       Bulk Registration
                      </a>
                                           
                    </div>
                  </li>


                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M15 15l3.35 3.35" /><path d="M9 15l-3.35 3.35" /><path d="M5.65 5.65l3.35 3.35" /><path d="M18.35 5.65l-3.35 3.35" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Settings
                      </span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('new_course') }}" rel="noopener">
                        Add New Course
                      </a>
					  
                      <a class="dropdown-item" href="{{ route('new_source') }}" rel="noopener">
                        Add New Source
                      </a>
					 
					         <!--   <a class="dropdown-item" href="{{ route('new_reference') }}" rel="noopener">
                        Add New Reference
                      </a>-->
					  
					  
					  <a class="dropdown-item" href="{{ route('new_technology') }}">
                       Add New Technology
                      </a>
            
                      <a class="dropdown-item" href="{{ route('add_team') }}">
                       Create a Team
                      </a>
					  
					  <a class="dropdown-item" href="{{ route('new_roles') }}">
                       New Role
                      </a>

                    </div>
                  </li>
                </ul>
                
              </div>
            </div>
          </div>
        </header>
      </div>