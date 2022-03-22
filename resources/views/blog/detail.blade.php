@extends('blog.master')
@section('title') Home @endsection
@section('content')

    <div class="card">
        <div class="card-body border-bottom">
                <a href="{{ route('baseOnCategory',$article->category->id) }}" class="badge text-decoration-none rounded-pill bg-secondary text-dark">{{ $article->category->title  }}</a>
                <div class="title my-3">
                    <h5 class="text-primary fw-bold">
                        {{ $article->title }}
                    </h5>
                    <div class="foot d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex">
                            @if($article->user->photo)
                                <div class="adminImg" style=" background-image: url({{asset('storage/profile/'.$article->user->photo)}}"></div>
                            @else
                                <div class="adminImg" style=" background-image: url({{asset('storage/user.png')}}"></div>
                            @endif
                            <div class="d-flex flex-column justify-content-center align-items-start">
                                <a href="{{ route('baseOnUser',$article->user->id) }}" class="mb-0 text-decoration-none text-nowrap text-primary">{{ $article->user->name }}</a>
                            </div>
                        </div>
                        <div class="text-primary">
                            <i class="feather-calendar me-1"></i>
{{--                            {{ $dateTime = date('Y-m-d H:i:s',$article->created_at) }}--}}
                            <a href="{{ route('baseOnDateTime',$article->created_at->format('Y-m-d')) }}" class="text-decoration-none">
                                <small>{{ $article->created_at->format('d F Y') }}</small> /
                                <small>{{ $article->created_at->format('h:i A') }}</small>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="body my-4">
                    <p class="">
                        {{ $article->description }}
                    </p>
                </div>

            </div>
        @php
            $prevArticle = \App\Article::where('id','<',$article->id)->latest('id')->first();
            $nextArticle = \App\Article::where('id','>',$article->id)->first();
        @endphp
        <div class="card-body d-flex justify-content-between">
            <a class="btn btn-outline-primary rounded-pill @empty($prevArticle) disabled text-black border-dark @endempty" href="{{ isset($prevArticle) ? route('detail',$prevArticle) : '#' }}">
                <i class="feather-chevron-left"></i>
            </a>
            <a class="btn btn-outline-primary rounded-pill" href="{{ route('index') }}">Read All</a>
            <a class="btn btn-outline-primary rounded-pill @empty($nextArticle) disabled text-black border-dark @endempty" href="{{ isset($nextArticle) ? route('detail',$nextArticle) : '#' }}">
                <i class="feather-chevron-right"></i>
            </a>

        </div>
    </div>

@endsection

