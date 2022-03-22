<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <img src="{{ asset(\App\Base::$logo) }}" class="w-50" alt="">
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>

            <x-menu-spacer></x-menu-spacer>

{{--home--}}
            <x-menu-item link="{{ route('home') }}" class="feather-home" name="Home"></x-menu-item>

{{--item management--}}
            <x-menu-title title="Item Management"></x-menu-title>

            <x-menu-item class="feather-plus-circle" name="Create New Item"></x-menu-item>

            <x-menu-item class="feather-list" name="Item List" counter="50"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>
{{--category management--}}
            <x-menu-title title="Article Manager"></x-menu-title>

            <x-menu-item class="feather-layers" link="{{ route('category.index') }}" name="Manage Category"></x-menu-item>

            <x-menu-item class="feather-plus-circle" link="{{ route('article.create') }}" name="Create Article"></x-menu-item>

            <x-menu-item class="feather-list" link="{{ route('article.index') }}" name="Article List"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>

{{--user profile--}}
            <x-menu-title title="User Profile"></x-menu-title>

            <x-menu-item class="feather-user" name="Your Profile"></x-menu-item>

            <x-menu-item link="{{ route('profile.change') }}" class="feather-refresh-cw" name="Change Password"></x-menu-item>

            <x-menu-item class="feather-message-circle" name="Update Name & Email"></x-menu-item>

            <x-menu-item link="{{ route('profile.edit') }}" class="feather-image" name="Update Photo"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>

            <x-logout-tag></x-logout-tag>
        </ul>
    </div>
</div>
