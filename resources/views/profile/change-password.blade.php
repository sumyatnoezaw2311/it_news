@extends('layouts.app')
@section('title') Change Password @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="#">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ asset(route('profile.change-password')) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">
                                <i class="feather-lock text-primary mr-1"></i>
                                Current Password</label>
                            <input name="current_password" id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" value="{{ old('current_password') }}">
                            @error('current_password')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">
                                <i class="feather-refresh-cw text-primary mr-1"></i>
                                New Password</label>
                            <input name="new_password" id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" value="{{ old('new_password') }}">
                            @error('new_password')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">
                                <i class="feather-check-circle text-primary mr-1"></i>
                                Confirm Password</label>
                            <input name="confirm_password" id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" value="{{ old('confirm_password') }}">
                            @error('confirm_password')
                            <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="custom-control custom-switch">
                            <input name="check" type="checkbox" class="custom-control-input @error('check') is-invalid @enderror" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Are you sure to change your password?</label>
                        </div>
                        @error('check')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                        <button class="btn btn-primary float-right mt-4">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
