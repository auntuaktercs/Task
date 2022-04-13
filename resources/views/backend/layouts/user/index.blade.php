@extends('backend.master')
@section('content')
@section('title', 'All User Information')
    <div class="page-heading">
        <ul class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>All Registered Users</li>
        </ul>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox table-card">
                    <div class="ibox-head">
                        <div class="ibox-title">
                            <h3>Information of All Users</h3>
                        </div>
                        <div class="col-lg-offset-6">
                            @if(auth()->user()->role=='Admin')
                                <div class="btn-group">
                                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i> Actions <i class="fa fa-angle-down"></i></button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('users.create') }}"><i class="fa fa-plus-circle"></i> Add New</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="page-content fade-in-up">
                        <div class="ibox">
                            <div class="ibox-body">
                                <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Edit</th>
                                            <th>Sl.</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Designation</th>
                                            <th>Mobile</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key=>$user)
                                            <tr>
                                                <td style="min-width: 10%">
                                                    <a href="{{ route('users.edit', $user->id) }}">
                                                        <button class="btn bg-warning btn-sm" data-toggle="tooltip" data-original-title="Edit Info"><i class="fa fa-pencil font-14"></i></button>
                                                    </a>
                                                    <a href="{{ route('user.password', $user->id) }}">
                                                        <button class="btn bg-primary btn-sm" data-toggle="tooltip" data-original-title="Update Password"><i class="fa fa-key font-14"></i></button>
                                                    </a>
                                                </td>
                                                <td>{{ $key+1 }}</td>
                                                <td>
                                                    @if($user->image!=null)
                                                        <img src="{{ asset('user/profile/'.$user->image) }}" class="rounded-circle" width="100px" alt="user Image"/>
                                                    @else
                                                        <img src="{{asset('/')}}backend/user/img/admin-avatar.png"/>
                                                    @endif
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->designation }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
