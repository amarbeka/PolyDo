@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><h3 class="text-center">{{ __('PolyDo App') }}</h3></div>

                <div class="card-body">
                   <img class="rounded mx-auto d-block"  src="{{ asset('images/polydo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
