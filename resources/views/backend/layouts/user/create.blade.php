@extends('backend.master')
@section('content')
@section('title', 'Add New User')
    <div class="page-heading">
        <ul class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('users.index') }}">All Registered Users</a></li>
            <li>Add New User</li>
        </ul>
    </div>

    <!-- backend-validation-message-alart-box start -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="list-style: none;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- backend-validation-message-alart-box start -->

    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox ibox-card">
                    <div class="ibox-head">
                        <div class="ibox-title">
                            <h3>Add New User</h3>
                        </div>
                    </div>
                <div class="ibox-body">
                    <form action="{{ route('users.store') }}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <p class="text-danger">* marked fields are mandatory</p>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Name</label><strong class="text-danger">*</strong>
                                <input class="form-control" type="text" name="name" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Email</label><strong class="text-danger">*</strong>
                                <input class="form-control" type="email" name="email" autofocus required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Designation</label><strong class="text-danger">*</strong>
                                <input class="form-control" name="designation" type="text" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" autofocus name="phone">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Mobile</label><strong class="text-danger">*</strong>
                                <input class="form-control" type="text" autofocus name="mobile" required>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Profile Picture</label>
                                <input class="form-control" type="file" autofocus name="image">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Role</label><strong class="text-danger">*</strong>
                                <select id="" name="role" class="form-control" required>
                                    <option value="" selected>- Select -</option>
                                    {{-- <option value="Super Admin">Super Admin</option> --}}
                                    <option value="Admin">Admin</option>
                                    <option value="Viewer">Viewer</option>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Status</label><strong class="text-danger">*</strong>
                                <select id="" name="status" class="form-control" required>
                                    <option value="" selected>- Select -</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Password</label><strong class="text-danger">*</strong>
                                <input class="form-control" type="text" autofocus name="password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <button class="btn btn-info" type="submit">Submit</button>
                                <a href="{{ URL::previous() }}">
                                    <button class="btn btn-danger" type="button">Back</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
