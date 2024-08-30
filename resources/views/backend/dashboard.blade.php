@extends('layouts.backend')

@section('content')

<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">{{ $admin->username }}'s Dashboard</h4>
				<ul class="db-breadcrumb-list">
                @if (session('success'))
                    <div style="color: green;">
                        {{ session('success') }}
                    </div>
                @endif
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Admins
							</h4>
							<span class="wc-des">
								Total Number of Admins
							</span>
							<span class="wc-stats">
								<span class="counter">{{ $adminCount }}</span>
							</span>		
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Students
							</h4>
							<span class="wc-des">
								Total Number of Students
							</span>
							<span class="wc-stats counter">
								{{ $studentCount }} 
							</span>		
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Courses
							</h4>
							<span class="wc-des">
								Total Number of Courses 
							</span>
							<span class="wc-stats counter">
							{{ $courseCount }} 
							</span>		
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Total Visits 
							</h4>
							<span class="wc-des">
								Total Number of Site Visits
							</span>
							<span class="wc-stats counter">
							{{ $visitCount }}
							</span>		
						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<div class="col-lg-6 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Latest Students</h4>
						</div>
						<div class="widget-inner">
							<div class="new-user-list">
								<ul>
								@foreach($students as $student)
									<li>
										<span class="new-users-text">
											<a href="#" class="new-users-name">{{ $student->id }}. {{ $student->firstname }} {{ $student->lastname }} </a>
											<span class="new-users-info"><strong>Student ID:</strong> {{ $student->student_id }}</span>
											<span class="new-users-info"><strong>Email:</strong> {{ $student->email }}</span><br>
											<span class="new-users-info"><strong>Phone Number:</strong> {{ $student->phonenumber }}</span>
										</span>
										<span class="new-users-btn">
											<a href="{{ route('viewstudentdetails', $student->id) }}" class="btn button-sm outline">View Details</a>
										</span>
									</li>
								@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Latest Courses</h4>
						</div>
						<div class="widget-inner">
							<div class="new-user-list">
								<ul>
								@foreach($courses as $course)
									<li>
										<span class="new-users-text">
											<a href="#" class="new-users-name">{{ $course->id }}. {{ $course->coursename }}, {{ $course->coursecode }} </a>
											<span class="new-users-info"><strong>Credits:</strong> {{ $course->credits }}</span>
											<span class="new-users-info"><strong>Duration:</strong> {{ $course->duration }}</span>
										</span>
									</li>
								@endforeach
								</ul>
							</div>
						<span class="new-users-btn">
							<a href="{{ route('viewcourses')}}" class="btn button-sm outline">View More Courses</a>
						</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
    @endsection 