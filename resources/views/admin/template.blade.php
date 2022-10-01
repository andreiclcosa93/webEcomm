@include('admin.partials.head')

    <body class="sb-nav-fixed">

      @include('admin.partials.navbar')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

                @include('admin.partials.sidenav')

            </div>
            <div id="layoutSidenav_content">

              @yield('content')

              @include('admin.partials.footer')

            </div>
        </div>

@include('admin.partials.scripts')
