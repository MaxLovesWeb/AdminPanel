<ul class="navbar-nav ml-auto
    @if(config('template.layout_topnav') || View::getSection('layout_topnav'))order-1 order-md-3 navbar-no-expand @endif">

    <li class="nav-item dropdown">

        <a id="dropdownSettings" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ __('Settings') }}</a>

        @yield('settings_dropdown')


    </li>


    @yield('content_top_nav_right')

    @if(config('template.right_sidebar'))
        @include('template::page.right-sidebar')
    @endif
</ul>
