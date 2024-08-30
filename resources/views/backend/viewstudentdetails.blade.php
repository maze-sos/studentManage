@extends('layouts.backend')

@section('content')

<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">View Student Detaiils</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a></li>
					<li>View Student Detaiils</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>{{ $student->firstname }} {{ $student->lastname }} Details</h4>
						</div>
						<div class="widget-inner">
							<div class="edit-profile m-b30">
                            @if (session('success'))
                                <div style="color: green;">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div style="color: red;">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf 
                                <div class="row">
                                    <div class="form-group col-6">
                                        <h4>First Name</h4>
                                        <label class="col-form-label">{{ $student->firstname }} </label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Last Name</h4>
                                        <label class="col-form-label">{{ $student->lastname }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Email</h4>
                                        <label class="col-form-label">{{ $student->email }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Phone Number</h4>
                                        <label class="col-form-label">{{ $student->phonenumber }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Student ID</h4>
                                        <label class="col-form-label">{{ $student->student_id }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Created At</h4>                                        
                                        <label class="col-form-label">{{ $student->created_at }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Updated At</h4>
                                        <label class="col-form-label">{{ $student->updated_at }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                    <h4>Courses Offered</h4>
                                    @foreach ($student->courses as $course)
                                        <li>{{ $course->coursename }} ({{ $course->coursecode }})</li>
                                    @endforeach
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('editstudent', $student->id) }}" class="btn green radius-xl outline">Edit</a>
                                        <form action="{{ route('destroystudent', $student->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn red outline radius-xl" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                        </form>       
                                        <a href="{{ route('dashboard') }}" class="btn-secondry">Back</a>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>

    @endsection