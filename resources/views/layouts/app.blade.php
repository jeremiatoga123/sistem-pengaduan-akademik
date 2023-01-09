<!doctype html>
<html lang="en">
    
    <head>
    @include('layouts.partials.head')
    </head>

    <body data-sidebar="dark">

        <div class="loader d-flex justify-content-center">
            <img class="d-block my-auto" src="{{ asset('img/loader.gif') }}" width="250" height="auto" alt="">
        </div>
        <!-- ========== Loader ========== -->
        <!-- ========== End Loader ========== -->

        <div id="layout-wrapper" class="d-none">

            <!-- ========== Navbar Start ========== -->
            @include('layouts.partials.navbar')
            <!-- ========== End Navbar Start ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.partials.sidebar')
            <!-- ========== End Left Sidebar Start ========== -->

            <!-- ========== Content Start ========== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @yield('breadcumb')

                        @yield('content')
                        
                    </div>
                </div>

                @include('layouts.partials.footer')

            </div>
            <!-- ========== End Content Start ========== -->

        </div>
        <!-- END layout-wrapper -->


        @include('layouts.partials.foot')
    </body>
</html>
