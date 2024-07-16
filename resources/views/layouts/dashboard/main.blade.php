{{-- head  --}}
@include('layouts.dashboard.head')
    {{-- header  --}}
    @include('layouts.dashboard.header')
        {{-- sidebar  --}}
@include('layouts.dashboard.sidebar')
     
@yield('content')
   {{-- footer  --}}
   @include('layouts.dashboard.footer')