<li class="menu-item">
    <a class="btn btn-outline-primary w-100 py-2" href="#" onclick="
    event.preventDefault();
    document.getElementById('logout-form').submit();
    ">
        Log Out
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
        @csrf
    </form>
</li>
