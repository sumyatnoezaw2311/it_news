@extends('layouts.app')
@section('title') Article List @endsection
@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-crumb>
    <div class="row">
        <div class="col-12 ">
            <div class="card shadow">
                <div class="card-body">
                        <h4 class="mb-3">
                            <i class="feather-list mr-2"></i>
                            Article List
                        </h4>
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-12 col-md-6 d-flex justify-content-between justify-content-md-start align-items-center">
                            <a href="{{ route('article.create') }}" class="btn btn-outline-primary text-nowrap mr-md-2"><i class="feather-plus"></i> Create Article</a>
                            <a href="{{ route('article.index') }}" class="btn btn-outline-dark"><i class="feather-list"></i> All Articles</a>
                        </div>
                        <div class="col-12 col-md-6 d-md-flex justify-content-md-end mt-3 mt-md-0">
                            <form action="{{ route('article.index') }}" method="get">
                                <div class="d-flex align-items-center">
                                    <input type="text" name="search" class="mr-2 form-control" placeholder="Search" value="{{ request()->search }}" autofocus>
                                    <button class="btn btn-primary"><i class="feather-search"></i></button>
                                </div>
                                @error('title')
                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                @enderror
                            </form>
                        </div>
                        <div class="col-12 col-md-6">
                            @isset(request()->search)
                                <h5 class="font-weight-bold text-nowrap mt-3 mt-md-0">Search By : "{{" ". request()->search ." "}}"</h5>
                            @endisset
                        </div>

                    </div>
                    <br>
                    <table class="table table-responsive-sm table-responsive-md table-responsive-lg table-hover table-bordered">
                        <thead class="text-center">
                        <th>#</th>
                        <th>Article</th>
                        <th>Category</th>
                        <th>Owner</th>
                        <th>Controls</th>
                        <th>Created_at</th>
                        </thead>
                        <tbody class="text-center">
                        @php
                            $articles =\App\Article::when(isset(request()->search),function ($q){
                                $search = request()->search;
                                return $q->where("title","like","%$search%")->orwhere("description","like","%$search%");
                            })->with(['user','category'])->latest("id")->paginate(5);
                        @endphp
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td class="text-capitalize text-left text-nowrap">
                                    <p class="mb-0 font-weight-bold ">{{ \Illuminate\Support\Str::words($article->title,5) }}</p>
                                    <small>{{ substr($article->description,0,50)." ..." }}
                                        <a class="text-secondary font-weight-bold text-nowrap text-lowercase" href="{{ route('article.show',$article->id) }}">see more</a>
                                    </small>
                                </td>
                                <td class="text-capitalize">{{ $article->category->title }}</td>
                                <td class="text-capitalize text-nowrap">{{ $article->user->name }}</td>
                                <td class="text-nowrap">
                                    <a href="{{ route('article.edit',$article->id) }}" class="btn btn-sm btn-outline-info">edit</a>
                                    <form action="{{ route('article.destroy',[$article->id,'page'=>request()->page]) }}" class="d-inline-block" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete this Article?')">Delete</button>
                                    </form>
                                </td>
                                <td class="text-nowrap">
                                    <i class="feather-calendar"></i>
                                    <span>{{ $article->created_at->format('d-m-Y') }}</span>
                                    <br>
                                    <i class="feather-clock"></i>
                                    <span>{{ $article->created_at->format('h:i A') }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">There is no result.</td>
                            </tr>
                        @endforelse

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <div class="d-flex justify-content-between align-items-center flex-md-row">
                                        <div class="">
                                            {{ $articles->appends(request()->all())->links() }}
                                        </div>
                                        <p class="mb-0">Total Articles : <span class="font-weight-bold">{{ $articles->total() }}</span></p>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@if(session('articleAddedStatus'))
@section('foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.success('{{ \Illuminate\Support\Facades\Session::get('articleAddedStatus') }}')
    </script>
@endsection
@endif
@if(session('articleUpdatedStatus'))
@section('foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.success('{{ \Illuminate\Support\Facades\Session::get('articleUpdatedStatus') }}')
    </script>
@endsection
@endif
@if(session('articleDeletedStatus'))
@section('foot')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.success('{{ \Illuminate\Support\Facades\Session::get('articleDeletedStatus') }}')
    </script>
@endsection
@endif
