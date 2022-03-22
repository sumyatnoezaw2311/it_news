@extends('layouts.app')
@section('title') {{ $article->title }} @endsection
@section('head')
    <style>
        .description{
            white-space: pre-line;
        }
    </style>
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 col-lg-8 ">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-detail mr-2"></i>
                        {{ $article->title }}
                    </h4>
                    <div class="my-3 d-flex justify-content-between">
                        <div class="">
                            <i class="text-secondary feather-layers"></i>
                            <small class="text-capitalize">{{ $article->category->title }}</small>
                            <i class="ml-2 text-secondary feather-users"></i>
                            <small class="text-capitalize">{{ $article->user->name }}</small>
                            <i class="ml-2 feather-calendar text-secondary"></i>
                            <small>{{ $article->created_at->format('d-m-Y') }}</small>
                            <i class="ml-2 feather-clock text-secondary"></i>
                            <small>{{ $article->created_at->format('h:i A') }}</small>
                        </div>
                        <div class="">
                            <small class="text-secondary">{{ $article->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                    <hr>
                    <p class="text-justify text-black-50 description">{{ $article->description }}</p>
                    <div class="float-right mt-2">
                        <a href="{{ route('article.edit',$article->id) }}" class="btn btn-sm btn-outline-secondary">edit</a>
                        <form action="{{ route('article.destroy',$article->id) }}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete this Article?')">Delete</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
