@extends('layouts.backend')

@section('content')

<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Students</h4>
				<ul class="db-breadcrumb-list">
                    <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a></li>
					<li>Our Courses</li>
					@if (session('success'))
						<div style="color: green;">
							{{ session('success') }}
						</div>
                	@endif
					@if (session('delete'))
						<div style="color: red;">
							{{ session('delete') }}
						</div>
                	@endif
				</ul>
			</div>	
			<div class="row">
            @foreach($students as $student)
            <div class="col-lg-12 m-b30">
                <div class="card-courses-list admin-courses">
                    <div class="card-courses-full-dec">
                        <div class="card-courses-title">
                            <h4>{{ $student->id }}. {{ $student->firstname }} {{ $student->lastname }}</h4>
                        </div>
                        <div class="card-courses-list-bx">
                            <ul class="card-courses-view">
                                <li class="card-courses-user">
                                    <div class="card-courses-user-info">
                                        <h5>Student ID</h5>
                                        <h4>{{ $student->student_id }}</h4>
                                    </div>
                                </li>
                                <li class="card-courses-user">
                                    <div class="card-courses-user-info">
                                        <h5>Email</h5>
                                        <h4>{{ $student->email }}</h4>
                                    </div>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Phone Number</h5>
                                    <h4>{{ $student->phonenumber }}</h4>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Created At</h5>
                                    <h4>{{ $student->created_at }}</h4>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Updated At</h5>
                                    <h4>{{ $student->updated_at }}</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="row card-courses-dec">
                            <div class="col-md-12">
								<a href="{{ route('viewstudentdetails', $student->id) }}" class="btn green radius-xl outline">View Details</a>                          
							</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection