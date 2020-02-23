
@if(config('template.layout_topnav') || View::getSection('layout_topnav'))
    <div class="container">
        @endif

        <div class="content-header">
            <div class="{{config('template.classes_content_header', 'container-fluid')}}">
                @yield('content_header')
            </div>
        </div>

        <div class="content">
            <div class="{{config('template.classes_content', 'container-fluid')}}">
                {{ Breadcrumbs::render() }}
                @include('template::partials.session-errors')
                @include('flash::message')
                @yield('content')
            </div>
        </div>

        @if(config('template.layout_topnav') || View::getSection('layout_topnav'))
    </div>
@endif
