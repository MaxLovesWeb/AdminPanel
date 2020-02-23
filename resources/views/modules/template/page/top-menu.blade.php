<nav class="main-header navbar

    {{config('adminlte.classes_topnav_nav', 'navbar-expand-md')}}
    {{config('adminlte.topnav_color', 'navbar-white navbar-light')}}">

    <div class="{{config('adminlte.classes_topnav_container', 'container')}}">
        @if(config('adminlte.logo_img_xl'))
            <a href="{{ $dashboard_url }}" class="navbar-brand logo-switch">
                <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
                     alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}"
                     class="{{config('adminlte.logo_img_class', 'brand-image-xl')}} logo-xs">
                <img src="{{ asset(config('adminlte.logo_img_xl')) }}"
                     alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}"
                     class="{{config('adminlte.logo_img_xl_class', 'brand-image-xs')}} logo-xl">
            </a>
        @else
            <a href="{{ $dashboard_url }}" class="navbar-brand {{ config('adminlte.classes_brand') }}">
                <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
                     alt="{{config('adminlte.logo_img_alt', 'AdminLTE')}}"
                     class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
                                {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
                            </span>
            </a>
        @endif
    </div>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="nav navbar-nav">
            @each('adminlte::partials.menu-item-top-nav', $adminlte->menu(), 'item')
        </ul>
    </div>

    @include('template::page.right-navbar')

</nav>
