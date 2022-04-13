@extends('backend.master')
@section('content')
@section('title', 'Update Password')
    <div class="page-heading">
        <ul class="breadcrumb">
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li>Update Password</li>
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
                            <h3>Update Password</h3>
                        </div>
                    </div>
                <div class="ibox-body">
                    <form action="{{ url('/update-password') }}" method="post" role="form">
                        @csrf
                        <p class="text-danger">* marked fields are mandatory</p>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Updating Password For</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" value="{{ $user->designation }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Your Current Password</label><strong class="text-danger">*</strong>
                                <input type="password" class="form-control" id="current_pwd" name="current_password"
                                    pattern="[0-9_A-Za-z@]{8,16}" placeholder="minimum 8 characters" required autofocus>
                                <span id="check_pwd"></span>
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>New Password</label><strong class="text-danger">*</strong>
                                <input type="password" class="form-control" id="new_pwd" name="new_password" required autofocus
                                pattern="[0-9_A-Za-z@]{8,16}" placeholder="minimum 8 characters">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label>Confirm New Password</label><strong class="text-danger">*</strong>
                                <input type="password" class="form-control" id="confirm_pwd" name="confirm_password" required autofocus
                                pattern="[0-9_A-Za-z@]{8,16}" placeholder="minimum 8 characters">
                                <span id="show_error"></span>
                            </div>
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
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
