<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',\App\Base::$name)</title>
    <link rel="icon" href="{{ \App\Base::$fav }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/vendor/feather-icons-web/feather.css') }}"></link>
    @yield('head')
</head>
<body>
<div class="container-fluid" id="parent">
    <div class="row navBar">
        <div class="col-12 border-bottom">
            <div class="container">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid" style="flex-wrap: nowrap">
                            <a class="navbar-brand" href="{{ route('index') }}">
                                <img class="w-25" src="{{ asset(\App\Base::$logo) }}" alt="">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse justify-content-end" style="padding: 5px 24px;" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->url() == route('index') ? 'active': '' }}" aria-current="page" href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->url() == route('about') ? 'active': '' }}" href="{{ route('about') }}">About</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Pages
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-nowrap" href="#">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="container">
                <div class="row bodyDiv">
                    <div class="col-12 col-lg-8">
                        @yield('content')
                    </div>
                    <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                        <div class="card categoryMenu w-100">
                            <h4 class="card-header fw-bold">Category List</h4>
                            <div class="card-body">
                                <div class="sidebar">
                                    <div id="search" class="mb-5">
                                        <form action="">
                                            <div class="d-flex search-box">
                                                <input type="text" class="form-control flex-shrink-1 me-2 search-input" placeholder="Search Anything">
                                                <button class="btn btn-primary search-btn">
                                                    <i class="feather-search d-block d-xl-none"></i>
                                                    <span class="d-none d-xl-block">Search</span>
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <div class="list-group border-0 mb-3">
                                    @foreach($categories as $category)

                                        <a href="{{ route('baseOnCategory',$category->id) }}" class="my-1 border list-group-item list-group-item-action rounded-pill {{ request()->url() == route('baseOnCategory',$category->id) ? 'list-group-item-dark' : '' }}" aria-current="true">
                                            {{ $category->title }}
                                        </a>
                                    @endforeach
                                </div>

                                @yield('pagination')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <p class="mb-0">Copyright © {{ date('Y') }} {{ \App\Base::$name }}</p>
                        <a href="#parent" class="btn btn-primary"><i class="feather-chevron-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('foot')
<script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
