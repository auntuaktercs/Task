@extends('backend.master')
@section('content')
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
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">
                            <h3>Update Password</h3>
                        </div>
                    </div>
                <div class="ibox-body">
                    <form action="{{ url('/update-password') }}" method="post" role="form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <p class="single-form-row">
                                    <label>Current Password</label>
                                    <input type="password" id="current_pwd" name="current_password"
                                    required autofocus pattern="[0-9_A-Za-z@]{8,16}" placeholder="At least 8 characters">
                                    <span id="check_pwd"></span>
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <p class="single-form-row">
                                    <label>New Password</label>
                                    <input type="password" id="new_pwd" name="new_password" required autofocus
                                    pattern="[0-9_A-Za-z@]{8,16}" placeholder="At least 8 characters">
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <p class="single-form-row">
                                    <label>Confirm Password</label>
                                    <input type="password" id="confirm_pwd" name="confirm_password" required autofocus
                                    pattern="[0-9_A-Za-z@]{8,16}" placeholder="At least 8 characters">
                                    <span id="show_error"></span>
                                </p>
                            </div>
                        </div>
                        <div class="button-box">
                            <button class="btn default-btn" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
