@extends('layouts.app')
@section('title') Sample Title @endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Article</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 ">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle mr-2"></i>
                        Create Article
                    </h4>
                    <form action="{{ route('article.store') }}" id="create-article" method="post">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card mt-2 shadow">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="category_id">Select Category</label>
                        <select name="category" form="create-article" id="category_id" type="select" class="custom-select custom-select-lg @error('category_id') is-invalid @enderror">
                            <option value="" selected>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card mt-2 shadow">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id">Article Title</label>
                        <input name="title" form="create-article" type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        @error('title')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="category_id">Description</label>
                        <textarea name="description" form="create-article" rows="13" class="form-control form-control-lg @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card mt-2 shadow">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button class="btn btn-lg btn-primary w-100" type="submit" form="create-article">Create Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
