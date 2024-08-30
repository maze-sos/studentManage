@extends('layouts.backend')

@section('content')
<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Edit Course</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a></li>
					<li>Edit Course: {{ $course->coursename }}</li>
				</ul>
			</div>	
            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Edit Course: {{ $course->coursename }}</h4>
						</div>
						<div class="widget-inner">
                            <form action="{{ route('updatecourse', $course->id) }}" method="POST">
                                @csrf
                                @method('PUT')
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
										<label class="col-form-label">Course Name</label>
										<div>
											<input name="coursename" class="form-control" type="text" value="{{ $course->coursename }}">
										</div>
                                        @error('coursename')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Course Code</label>
										<div>
											<input name="coursecode" class="form-control" type="text" value="{{ $course->coursecode }}">
										</div>
                                        @error('coursecode')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Credits</label>
										<div>
											<input name="credits" class="form-control" type="text" value="{{ $course->credits }}">
										</div>
                                        @error('credits')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Duration</label>
										<div>
											<input name="duration" class="form-control" type="text" value="{{ $course->duration }}">
										</div>
                                        @error('duration')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Description</label>
										<div>
                                            <textarea name="description" id="description" class="form-control">{{ $course->description }}</textarea>
										</div>
                                        @error('description')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="col-12">
										<button name="submit" type="submit" value="Submit" class="btn">Save Changes</button>
										<a href="{{ route('viewcourses') }}" class="btn-secondry">Cancel</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>

    @endsection
       