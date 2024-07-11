@extends('layouts.base')

@section('body')
    <x-navbar />
    <x-flash-message />
    {{-- <x-error-message /> --}}

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
