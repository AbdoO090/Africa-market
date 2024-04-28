<header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
	  <div>
		  <ul class="nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
					<i class="nav-link-icon mdi mdi-menu"></i>
			    </a>
			</li>
			<li class="btn-group nav-item">
				<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
					<i class="nav-link-icon mdi mdi-crop-free"></i>
			    </a>
			</li>

            <h5 class="widget-user-username">Hello....... {{ Auth::guard('admin')->name}}</h5>

		  </ul>
	  </div>

      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
		  <!-- full Screen -->
          <li class="dropdown user user-menu">


			<a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
				 <img class="rounded-circle"
                        src="{{ !empty($admindata->profile_photo_path) ? url('upload/admin_images/'.$admindata->profile_photo_path)
                        : url('upload/no_image.jpg') }}"
                 alt="">

			</a>
			<ul class="dropdown-menu animated flipInX">
			  <li class="user-body">

                 <a class="dropdown-item" href="{{route('admin.change_Password')}}"><i class="ti-wallet text-muted mr-2"></i> Change Password</a>
				 <div class="dropdown-divider"></div>
				 <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ti-lock text-muted mr-2"></i> Logout</a>
			  </li>
			</ul>
          </li>



        </ul>
      </div>
    </nav>
  </header>
