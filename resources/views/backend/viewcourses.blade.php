@extends('layouts.backend')

@section('content')

<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Courses</h4>
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
            @foreach($courses as $course)
            <div class="col-lg-12 m-b30">
                <div class="card-courses-list admin-courses">
                    <div class="card-courses-full-dec">
                        <div class="card-courses-title">
                            <h4>{{ $course->id }}. {{ $course->coursename }}</h4>
                        </div>
                        <div class="card-courses-list-bx">
                            <ul class="card-courses-view">
                                <li class="card-courses-user">
                                    <div class="card-courses-user-info">
                                        <h5>Course Code</h5>
                                        <h4>{{ $course->coursecode }}</h4>
                                    </div>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Credits</h5>
                                    <h4>{{ $course->credits }}</h4>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Duration</h5>
                                    <h4>{{ $course->duration }}</h4>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Created At</h5>
                                    <h4>{{ $course->created_at }}</h4>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Updated At</h5>
                                    <h4>{{ $course->updated_at }}</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="row card-courses-dec">
                            <div class="col-md-12">
                                <h6 class="m-b10">Course Description</h6>
                                <p>{{ $course->description }}</p>
                            </div>
                            <div class="col-md-12">
								<a href="{{ route('editcourse', $course->id) }}" class="btn green radius-xl outline">Edit</a>
                                <form action="{{ route('destroycourse', $course->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn red outline radius-xl" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                </form>                            
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