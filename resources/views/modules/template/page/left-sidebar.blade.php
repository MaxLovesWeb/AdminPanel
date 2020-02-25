<nav class="main-header navbar
    {{config('template.classes_topnav_nav', 'navbar-expand-md')}}
    {{config('template.classes_topnav', 'navbar-white navbar-light')}}">

    @include('template::page.left-navbar')
    @include('template::page.right-navbar')
</nav>

<aside class="main-sidebar {{config('template.classes_sidebar', 'sidebar-dark-primary elevation-4')}}">
    @if(config('template.logo_img_xl'))
        <a href="{{ $dashboard_url }}" class="brand-link logo-switch">
            <img src="{{ asset(config('template.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
                 alt="{{config('template.logo_img_alt', 'AdminLTE')}}"
                 class="{{config('template.logo_img_class', 'brand-image-xl')}} logo-xs">
            <img src="{{ asset(config('template.logo_img_xl')) }}"
                 alt="{{config('template.logo_img_alt', 'AdminLTE')}}"
                 class="{{config('template.logo_img_xl_class', 'brand-image-xs')}} logo-xl">
        </a>
    @else
        <a href="{{ $dashboard_url }}" class="brand-link {{ config('template.classes_brand') }}">
            <img src="{{ asset(config('template.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
                 alt="{{config('template.logo_img_alt', 'AdminLTE')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light {{ config('template.classes_brand_text') }}">
                {!! config('template.logo', '<b>Admin</b>LTE') !!}
            </span>
        </a>
    @endif


        @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('default-profile.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>
        @endauth

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{config('template.classes_sidebar_nav', '')}}"
                data-widget="treeview" role="menu"
                @if(config('template.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{config('template.sidebar_nav_animation_speed')}}"
                @endif
                @if(!config('template.sidebar_nav_accordion')) data-accordion="false" @endif>

                @each('adminlte::partials.menu-item', $adminlte->menu(), 'item')

            </ul>
        </nav>
    </div>
</aside>
