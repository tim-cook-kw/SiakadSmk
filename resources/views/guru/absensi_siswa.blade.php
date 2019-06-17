@include('guru.layout.sidebar')

    <div id="right-panel" class="right-panel">
        @include('guru.layout.header')
        @yield('content')
        @include('guru.layout.footer')
    </div>