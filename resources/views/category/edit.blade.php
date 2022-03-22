@extends('layouts.app')
@section('title') Category Manager @endsection
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 ">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-edit mr-2"></i>
                        Edit Category
                    </h4>
                    <br>
                    <div class="">
                        <form action="{{ route('category.update',$category->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-row">
                                <input type="text" name="title" class="w-25 mr-2 form-control @error('title') is-invalid @enderror" placeholder="Category Title" value="{{ old('title',$category->title) }}" autofocus onclick="this.select()">
                                <button class="btn btn-primary">Update</button>
                            </div>
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </form>
                    </div>
                    <br>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection
