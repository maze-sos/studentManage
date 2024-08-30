<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
                <i class="ti-menu ttr-close-icon"></i>
				<i class="ti-close ttr-open-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<a href="{{route('dashboard')}}" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="{{asset('admin/assets/images/logo-mobile.png')}}" width="30" height="30">
						<img class="ttr-logo-desktop" alt="" src="{{asset('admin/assets/images/logo-white.png')}}" width="160" height="27">
					</a>
				</div>
			</div>
			<!--logo end -->
			<div class="ttr-header-menu">
				<!-- header left menu start -->
				<ul class="ttr-header-navigation">
					<li>

					</li>

				</ul>
				<!-- header left menu end -->
			</div>
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="{{route('viewadminprofile', $admin->id)}}" class="ttr-material-button"><span class="ttr-icon" style="margin-right: 7%;"><i class="ti-user"></i></span>{{ $admin->username }}</a>
					</li> 
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
					<li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: red;">Logout</a> </li>
				</ul>
				<!-- header right menu end -->
			</div>
			<!--header search panel start -->
			<!--header search panel end -->
		</div>
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<!-- side menu logo start -->
			<div class="ttr-sidebar-logo">
				<a href="#"><img alt="" src="{{asset('admin/assets/images/logo.png')}}" width="122" height="27"></a>
				<!-- <div class="ttr-sidebar-pin-button" title="Pin/Unpin Menu">
					<i class="material-icons ttr-fixed-icon">gps_fixed</i>
					<i class="material-icons ttr-not-fixed-icon">gps_not_fixed</i>
				</div> -->
				<div class="ttr-sidebar-toggle-button">
					<i class="ti-arrow-left"></i>
				</div>
			</div>
			<!-- side menu logo end -->
			<!-- sidebar menu start -->
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="{{route('dashboard')}}" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashborad</span>
		                </a>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
                            <span class="ttr-icon"><i class="ti-user"></i></span>
		                	<span class="ttr-label">Students</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="{{route('addstudent')}}" class="ttr-material-button"><span class="ttr-label">Add Student</span></a>
		                	</li>
		                	<li>
		                		<a href="{{route('viewstudents')}}" class="ttr-material-button"><span class="ttr-label">View Students</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
                            <span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Courses</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="{{route('addcourse')}}" class="ttr-material-button"><span class="ttr-label">Add Course</span></a>
		                	</li>
		                	<li>
		                		<a href="{{route('viewcourses')}}" class="ttr-material-button"><span class="ttr-label">View Courses</span></a>		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-user"></i></span>
		                	<span class="ttr-label">Admin Profile</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="{{route('viewadminprofile', $admin->id)}}" class="ttr-material-button"><span class="ttr-label">My Profile</span></a>
		                	</li>
		                	<li>
		                		<a href="{{route('addadmin')}}" class="ttr-material-button"><span class="ttr-label">Add Admin Profile</span></a>
		                	</li>
		                	<li>
		                		<a href="{{route('viewadmins')}}" class="ttr-material-button"><span class="ttr-label">View Admin Profiles</span></a>
		                	</li>
		                </ul>
		            </li>
		            <li class="ttr-seperate"></li>
				</ul>
				<!-- sidebar menu end -->
			</nav>
			<!-- sidebar menu end -->
		</div>
	</div>