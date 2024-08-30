@extends('layouts.backend')

@section('content')

<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Admins</h4>
				<ul class="db-breadcrumb-list">
                    <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Dashboard</a></li>
					<li>Registered Admins</li>
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
            @foreach($otheradmins as $otheradmin)
            <div class="col-lg-12 m-b30">
                <div class="card-courses-list admin-courses">
                    <div class="card-courses-full-dec">
                        <div class="card-courses-title">
                            <h4>{{ $otheradmin->id }}. {{ $otheradmin->username }}</h4>
                        </div>
                        <div class="card-courses-list-bx">
                            <ul class="card-courses-view">
                                <li class="card-courses-user">
                                    <div class="card-courses-user-info">
                                        <h5>Name</h5>
                                        <h4>{{ $otheradmin->name }}</h4>
                                    </div>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Email</h5>
                                    <h4>{{ $otheradmin->email }}</h4>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Created At</h5>
                                    <h4>{{ $otheradmin->created_at }}</h4>
                                </li>
                                <li class="card-courses-categories">
                                    <h5>Updated At</h5>
                                    <h4>{{ $otheradmin->updated_at }}</h4>
                                </li>
                            </ul>
                        </div>
                        <div class="row card-courses-dec">
                            <div class="col-md-12">
								<a href="{{ route('editadmin', $otheradmin->id) }}" class="btn green radius-xl outline">Edit</a>
                                <form action="{{ route('destroyadmin', $otheradmin->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn red outline radius-xl" onclick="return confirm('Are you sure you want to delete this admin?')">Delete</button>
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