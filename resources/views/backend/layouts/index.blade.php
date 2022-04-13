@extends('backend.master')
@section('title', 'Dashboard')
@section('content')
    <!-- START PAGE CONTENT-->
    <div class="page-content fade-in-up">
        {{-- <div class="ibox">
            <div class="hand-cash">
                <h4 class="text-center">Total Cash in Hand = {{ $total_deposit - $total_withdraw }}</h4>
            </div>
        </div>
        <br> --}}
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="ibox-shadow bg-light color-white widget-stat">
                    <div class="ibox-body">
                        <a href="{{ route('users.index') }}">
                            <h4 class="m-b-5">Users</h4>
                            <div class="m-b-6"><h6>({{ count($users) }})</h6></div>
                            <i class="fa fa-money widget-stat-icon"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
