@extends('layouts.backend')

@section('content')

<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Edit Student</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>Dashboard</a></li>
                <li>Edit Student</li>
            </ul>
        </div>  
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Edit Student</h4>
                    </div>
                    <div class="widget-inner">
                        <form class="edit-profile m-b30" action="{{ route('updatestudent', $student->id) }}" method="POST">
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
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">First Name</label>
                                    <div>
                                        <input name="firstname" class="form-control" type="text" value="{{ old('firstname', $student->firstname) }}">
                                    </div>
                                    @error('firstname')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Last Name</label>
                                    <div>
                                        <input name="lastname" class="form-control" type="text" value="{{ old('lastname', $student->lastname) }}">
                                    </div>
                                    @error('lastname')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Email</label>
                                    <div>
                                        <input name="email" class="form-control" type="email" value="{{ old('email', $student->email) }}">
                                    </div>
                                    @error('email')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Phone Number</label>
                                    <div>
                                        <input name="phonenumber" class="form-control" type="text" value="{{ old('phonenumber', $student->phonenumber) }}">
                                    </div>
                                    @error('phonenumber')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Student ID</label>
                                    <div>
                                        <input name="student_id" class="form-control" type="text" value="{{ old('student_id', $student->student_id) }}">
                                    </div>
                                    @error('student_id')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Select Courses</label>
                                    <div>
                                        <select name="courses[]" class="form-control" multiple>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->id }}" {{ in_array($course->id, old('courses', $student->courses->pluck('id')->toArray())) ? 'selected' : '' }}>
                                                    {{ $course->coursename }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('courses')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button name="submit" type="submit" value="Submit" class="btn">Update Student</button>
                                    <a href="{{ route('dashboard') }}" class="btn-secondry">Cancel</a>
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
