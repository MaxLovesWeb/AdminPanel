@extends('addresses::layouts.master')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        {{ __('Show Address')}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card-body col-4">
                            {!! form($forms['address']) !!}
                            <div class="btn-toolbar justify-content-between" role="group">
                                <a class="btn btn-outline-primary" role="button" href="{{ route('addresses.edit', $address) }}" type="button">Edit</a>
                                @include('account::forms.destroy', ['url' => route('addresses.destroy', $address)])
                            </div>
                        </div>
                        <div class="card-body col-8">
                            @include('addresses::gmaps.map')
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->
        </div>
    </div>

@endsection
