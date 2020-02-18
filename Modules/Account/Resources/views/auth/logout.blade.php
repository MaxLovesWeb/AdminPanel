@auth
    <li class="nav-item">
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-fw fa-power-off"></i> {{ __('account::auth.log_out') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @if(config('template.logout_method'))
                {{ method_field(config('template.logout_method')) }}
            @endif
            {{ csrf_field() }}
        </form>
    </li>
@endauth
