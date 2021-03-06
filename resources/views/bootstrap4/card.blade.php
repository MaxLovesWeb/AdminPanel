<div class="card {{ $type }}">
    @isset($header)
        <div class="card-header">
            <h3 class="card-title">{!! $header !!}</h3>
        </div>
    @endisset

    <div class="card-body">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="card-footer">
            {!! $footer !!}
        </div>
    @endisset
</div>