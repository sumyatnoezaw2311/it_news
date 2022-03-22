@extends('layouts.app')
@section('title') Category Manager @endsection
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 ">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers mr-2"></i>
                        Category List
                    </h4>
                    <br>
                    <div class="">
                        <form action="{{ route('category.store') }}" id="cat-form" method="post">
                            @csrf
                        </form>
                        <div class="form-inline">
                            <input type="text" form="cat-form" name="title" class="mr-2 form-control @error('title') is-invalid @enderror" placeholder="Category Title" value="{{ old('title') }}" autofocus>
                            <button class="btn btn-primary mt-3 mt-md-0" form="cat-form">Add Category</button>
                        </div>
                        @error('title')
                        <small class="text-danger font-weight-bold">{{ $message }}</small>
                        @enderror
                    </div>
                    <br>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection
@if(session('addedCategoryStatus'))
@section('foot')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('addedCategoryStatus') }}')
        </script>
@endsection
@endif

@if(session('updatedCategoryStatus'))
    @section('foot')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            toastr.success('{{ \Illuminate\Support\Facades\Session::get('updatedCategoryStatus') }}')
        </script>
    @endsection
@endif

@if(session('deletedCategoryStatus'))
@section('foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.success('{{ \Illuminate\Support\Facades\Session::get('deletedCategoryStatus') }}')
    </script>
@endsection
@endif
