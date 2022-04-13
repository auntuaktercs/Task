@extends('backend.master')
@section('content')
@section('title', 'Update Individual User Information')
    <div class="page-heading">
        <ul class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>Individual User Information Update</li>
        </ul>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox ibox-card">
                    <div class="ibox-head">
                        <div class="ibox-title">
                            <h3>Edit User Information</h3>
                        </div>
                    </div>
                <div class="ibox-body">
                    <form action="{{ route('users.update', $user->id) }}" method="post" role="form" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <p class="text-danger">* marked fields are mandatory</p>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Name</label><strong class="text-danger">*</strong>
                                @if(auth()->user()->id == $user->id)
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" readonly>
                                @else
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" autofocus required>
                                @endif
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Email</label><strong class="text-danger">*</strong>
                                <input class="form-control" type="text" autofocus required value="{{ $user->email }}" readonly>
                            </div>
                            @if(auth()->user()->id!=$user->id)
                                <div class="col-sm-4 form-group">
                                    <label>Designation</label><strong class="text-danger">*</strong>
                                    <input class="form-control" name="designation" type="text" value="{{ $user->designation }}">
                                </div>
                            @else
                            <div class="col-sm-4 form-group">
                                <label>Designation</label><strong class="text-danger">*</strong>
                                <input class="form-control" name="designation" type="text" readonly value="{{ $user->designation }}">
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" autofocus name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Mobile</label><strong class="text-danger">*</strong>
                                <input class="form-control" type="text" autofocus name="mobile" value="{{ $user->mobile }}">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Profile Picture</label>
                                <input class="form-control" type="file" autofocus name="image">
                            </div>
                            @if(auth()->user()->id!=$user->id)
                                <div class="col-sm-4 form-group">
                                    <label>Role</label><strong class="text-danger">*</strong>
                                    <select id="" name="role" class="form-control" required>
                                        <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                        {{-- <option value="Super Admin">Super Admin</option> --}}
                                        <option value="Admin">Admin</option>
                                        <option value="Viewer">Viewer</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 form-group"><strong class="text-danger">*</strong>
                                    <label>Status</label><strong class="text-danger">*</strong>
                                    <select id="" name="status" class="form-control" required>
                                        <option value="{{ $user->status }}" selected>{{ $user->status }}</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="role" value="{{ $user->role }}">
                                <input type="hidden" name="status" value="{{ $user->status }}">
                            @endif
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
