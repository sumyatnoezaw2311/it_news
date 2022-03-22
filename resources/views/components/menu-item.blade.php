<li class="menu-item w-100">
    <a href="{{ $link }}" class="menu-item-link @if($link == Request::url()) active @endif">
         <div class="d-flex justify-content-center align-items-center text-capitalize">
             <i class="mr-2 {{ $class }}"></i>
             <p class="mb-0 text-nowrap">{{ $name }}</p>
         </div>
        @if($counter >= 0)
            <span class="badge badge-pill bg-white shadow-sm text-primary">{{ $counter }}</span>
        @endif
    </a>
</li>
