@extends('layouts.app')

@section('content')

    <div class="row m-5">
        @include('components.documentacao')

        <div class="col-6">
            @include('components.create-shipping-quote')
        </div>

        <div class="col-6">
            @include('components.simulate-quotes')
        </div>
    </div>

    <div class="row m-5">
        <div class="col-12">
            @include('components.list-shipping-quotes')
        </div>
    </div>

@endsection
