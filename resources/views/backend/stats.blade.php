<!-- resources/views/backend/stats.blade.php -->

@extends('layouts.backend')

@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Statistics</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i>Dashboard</a></li>
                <li>Statistics</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Total Students</h4>
                    </div>
                    <div class="widget-inner">
                        <h2>{{ $studentCount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Total Courses</h4>
                    </div>
                    <div class="widget-inner">
                        <h2>{{ $courseCount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Total Admins</h4>
                    </div>
                    <div class="widget-inner">
                        <h2>{{ $adminCount }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Total Visits</h4>
                    </div>
                    <div class="widget-inner">
                        <h2>{{ $visitCount }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
