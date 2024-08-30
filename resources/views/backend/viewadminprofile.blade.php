@extends('layouts.backend')

@section('content')

<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">View Admin Detaiils</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a></li>
					<li>View Admin Details</li>
				</ul>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>{{ $admin->username }}  Details</h4>
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
                                        <h4>Name</h4>
                                        <label class="col-form-label">{{ $admin->name }} </label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Username</h4>
                                        <label class="col-form-label">{{ $admin->username }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Email</h4>
                                        <label class="col-form-label">{{ $admin->email }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Created At</h4>                                        
                                        <label class="col-form-label">{{ $admin->created_at }}</label>
                                    </div>
                                    <div class="form-group col-6">
                                        <h4>Updated At</h4>
                                        <label class="col-form-label">{{ $admin->updated_at }}</label>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('editprofile', $admin->id) }}" class="btn green radius-xl outline">Edit</a>       
                                        <a href="{{ route('dashboard') }}" class="btn-secondry">Cancel</a>
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