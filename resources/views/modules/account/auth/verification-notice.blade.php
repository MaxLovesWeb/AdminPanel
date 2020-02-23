@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('account::auth.verify_email_sent') }}
    </div>
@endif

<div class="">
    {{ __('account::auth.verify_check_your_email') }}
    <br>
    {{ __('account::auth.verify_if_not_recieved') }},
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            {{ __('account::auth.verify_request_another') }}
        </button>.
    </form>

</div>
