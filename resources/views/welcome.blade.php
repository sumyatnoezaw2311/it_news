@extends('blog.master')
@section('title') Home @endsection
@section('content')

    <div class="card">

        @forelse($articles as $article)
        <div class="card-body mb-3">
            <div class="title">
                <h5 class="text-primary">
                    <a href="{{ route('detail',$article->slug) }}" class="fw-bold text-decoration-none">
                        {{ \Illuminate\Support\Str::words($article->title,10) }}
                    </a>
                </h5>
                <a class="badge rounded-pill bg-secondary text-dark text-decoration-none" href="{{ route('baseOnCategory',$article->category->slug) }}">{{ $article->category->title  }}</a>
            </div>
            <div class="body my-4">
                <p class="text-black-50">
                    {{ \Illuminate\Support\Str::words($article->description,15) }}
                </p>
            </div>
            <div class="foot d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    @if($article->user->photo)
                        <div class="adminImg" style=" background-image: url({{asset('storage/profile/'.$article->user->photo)}}"></div>
                    @else
                        <div class="adminImg" style=" background-image: url({{asset('storage/user.png')}}"></div>
                    @endif
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <small class="mb-0 text-nowrap">{{ $article->user->name }}</small>
                        <small>{{ $article->created_at->format('d M Y') }}</small>
                    </div>
                </div>
                <div class="">
                    <a href="{{ route('detail',$article->slug) }}" class="btn btn-outline-primary btn-sm rounded-pill text-nowrap">Read More</a>
                </div>
            </div>
        </div>

        @empty
            <div class="card-body">
                <div class="mb-4 pb-4">
                    <div class="py-5 my-5 text-center text-lg-start">
                        <p class="fw-bold text-primary">Dear Viewer</p>
                        <h1 class="fw-bold">
                            There is no article 😔 ...
                        </h1>
                        <p>Please go back to Home Page</p>
                        <a class="btn btn-outline-primary rounded-pill px-3" href="{{ route('index') }}">
                            <i class="feather-home"></i>
                            Blog Home
                        </a>

                    </div>
                </div>
            </div>

        @endforelse
            <div class="d-block d-lg-none" id="pagination">
                {{ $articles->appends(request()->all())->onEachSide(1)->links() }}
            </div>
    </div>


@endsection
@section('pagination')
    <div class="d-none d-lg-block" id="pagination">
        {{ $articles->appends(request()->all())->onEachSide(1)->links() }}
    </div>
@endsection
