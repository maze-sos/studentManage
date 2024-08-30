@extends('layouts.backend')

@section('content')
<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Edit Profile</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a></li>
					<li>Edit Profile: {{ $admin->username }}</li>
				</ul>
			</div>	
            <div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Edit Profile: {{ $admin->username }}</h4>
						</div>
						<div class="widget-inner">
                            <form action="{{ route('updateadmin', $admin->id) }}" method="POST">
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
										<label class="col-form-label">Name</label>
										<div>
											<input name="name" class="form-control" type="text" value="{{ $admin->name }}">
										</div>
                                        @error('name')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Username</label>
										<div>
											<input name="username" class="form-control" type="text" value="{{ $admin->username }}">
										</div>
                                        @error('username')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Email</label>
										<div>
											<input name="email" class="form-control" type="email" value="{{ $admin->email }}">
										</div>
                                        @error('email')
                                            <div style="color: red;">{{ $message }}</div>
                                        @enderror
									</div>
									<div class="col-12">
										<button name="submit" type="submit" value="Submit" class="btn">Save Changes</button>
										<a href="{{route('viewadminprofile', $admin->id)}}" class="btn-secondry">Cancel</a>
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
       