@extends('layouts.app1')
@section('title', 'Admin Index')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <a href="{{ url('/admin/addAdmin') }}" class="btn btn-outline-info">Add Admin</a>
                            <a href="{{ url('/admin/showLecturer') }}" class="btn btn-outline-info">Add Lecturer</a>
                            <a href="{{ url('/admin/showSession') }}" class="btn btn-outline-info">Add Session</a>
                            <a href="{{ url('/admin/showTerm') }}" class="btn btn-outline-info">Add Term</a>
                            <a href="{{ url('/admin/showAll') }}" class="btn btn-outline-info">View All PKM</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
