@include('front.partials.head')

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">

      @include('front.partials.topbar')

       @include('front.partials.searchbar')

    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                @include('front.partials.menu-vertical')
            </div>
            <div class="col-lg-9">
               @include('front.partials.menu-orizontal')
            </div>
        </div>
    </div>
    <!-- Navbar End -->


@yield('content')


    <!-- Footer Start -->
   @include('front.partials.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


  @include('front.partials.scripts')
</body>

</html>
