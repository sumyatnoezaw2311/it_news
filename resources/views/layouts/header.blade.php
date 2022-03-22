<div class="row header mb-4">
    <div class="col-12">
        <div class="p-2 bg-primary d-flex justify-content-between align-items-center rounded">
            <button class="show-sidebar-btn btn btn-primary d-block d-lg-none">
                <i class="feather-menu text-light" style="font-size: 2em;"></i>
            </button>
            <form action="" method="post" class="d-none d-md-block">
                <div class="form-inline">
                    <input type="text" class="form-control mr-2" placeholder="Search Everything">
                    <button class="btn btn-light">
                        <i class="feather-search text-primary"></i>
                    </button>
                </div>
            </form>
            <div class="dropdown">
                <button class="btn btn-light d-flex align-items-center" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if( \Illuminate\Support\Facades\Auth::user()->photo == null)
                        <div style="background-image: url({{ asset('dashboard/img/user.png') }})" class="user-img" alt=""></div>
                    @else
                        <div style="background-image: url({{ asset('storage/profile/'.\Illuminate\Support\Facades\Auth::user()->photo) }})" class="user-img" alt=""></div>
                    @endif
                    <div class="d-none d-md-block pl-2">{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                </div>
            </div>
        </div>
    </div>
</div>
