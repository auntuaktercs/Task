@extends('frontend.master')
@section('content')
<br>
<h4 style="color: #fff; font-weight:600;">
<center>App Controlling API Management System</center>
</h4>
<br><br><br><br>
<div class="container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="{{ asset('/') }}images/ogroni_logo.png" class="brand_logo" alt="Logo">
                </div>
            </div>

            <div class="d-flex justify-content-center form_container">
                <form action="{{ route('admin.login') }}" method="post">
                    @csrf
                    <!-- message-alart-box start -->
                    @if(Session::has('success'))
                        <div class="alert alert-success text-center">{{ Session::get('success') }}</div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
                    @endif
                    <!-- message-alart-box end -->
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control input_user" name="email" required autofocus pattern="[a-z A-Z.-@0-9]{6,50}" placeholder="Your Registered Email">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control input_user" name="password" required autofocus pattern="[a-z A-Z.-@_0-9]{8,50}" class="form-control input_pass" placeholder="Password">
                    </div>
                    {{-- <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                        </div>
                    </div> --}}
                    <br>
                        <div class="d-flex justify-content-center mt-3 login_container">
                <button type="submit" name="button" class="btn login_btn">Login</button>
                </div>
                </form>
            </div>

            {{-- <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Don't have an account? <a href="#" class="ml-2">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center links">
                    <a href="#">Forgot your password?</a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<br>
<span style="color: #f9f9f9;">
    <center>Copyright © Dhaka Bus Rapid Transit Company Limited (Dhaka BRT) 2021<br><span>Powered by <a href="https://ogroni.com" target="_blank"><u>Ogroni Informatix Limited</u></a></span></br></p>
</span>
@endsection
