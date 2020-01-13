{!! Form::open(['url' => $url ?? '', 'method' => $method ?? 'get' ]) !!}

{!! $slot !!}

{!! Form::close() !!}
