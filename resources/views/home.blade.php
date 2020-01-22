<!DOCTYPE html>
<html lang="en">

@include('layouts.partials._head')
    <body class="nav-md"> 
        <div class="container body"> 
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('/home')}}" class="site_title"><span>visual dashboard ppbnusantara</span></a>
                        </div>
                        
                        <div class="clearfix"></div>
                        @include('layouts.partials._profile')
                        <br />
                        @include('layouts.partials._sidebar')
                        @include('layouts.partials._footer')
                    </div>
                </div>
                 
                @include('layouts.partials._top-nav')

                <!-- page content --> 
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    @include('layouts.pages.statis')
                    @yield('content')

                    <div align="center">
                        <!-- <h1 align="center">Grafik Bakoel Nusantara</h1> -->
                        <img src="assets\images\pn.png" alt="">
                    </div>
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        grafik - bakoel Nusantara by <a href="https://colorlib.com">Admin</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        @include('layouts.partials._scripts')
        
<script src="https://code.highcharts.com/highcharts.js"></script>

    </body>
</html>
