@extends('layouts.app')
@section('title') Edit Profile @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="#">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    @if( \Illuminate\Support\Facades\Auth::user()->photo == null)
                        <div class="uploadedPhoto" style="background-image: url({{ asset('dashboard/img/user.png') }})"></div>
                    @else
                        <div class="uploadedPhoto" style="background-image: url({{ asset('storage/profile/'.\Illuminate\Support\Facades\Auth::user()->photo) }})"></div>
                    @endif
                    <form action="{{ route("profile.change-photo") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-5">
                            <label for="photo">
                                <i class="feather-image"></i>
                                Select New Photo
                            </label>
                            <input name="photo" type="file" class="form-control p-1 my-2 @error('photo') is-invalid @enderror">
                            @error('photo')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right my-2">Update Photo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
