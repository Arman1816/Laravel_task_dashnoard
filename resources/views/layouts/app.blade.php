@extends('layouts.base')

@section('body')
    @if(auth()->check())
        @include('layouts.navbar')
    @endif
    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
