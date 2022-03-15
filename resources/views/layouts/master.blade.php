<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    @include('layouts.head')
    <style>
        #datatable_paginate{
            display: none !important;
        }
        .boxShadowCustom {
            width: 250px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }

        #datatable_filter{
            display: none;
        }

        .button_custom{

           background-image: linear-gradient(#0dccea, #0d70ea);
           border: 0;
           border-radius: 4px;
           box-shadow: rgba(0, 0, 0, .3) 0 5px 15px;
           box-sizing: border-box;
           color: #fff;
           cursor: pointer;
           font-family: Montserrat,sans-serif;
           font-size: .9em;
           margin: 5px;
           padding: 10px 15px;
           text-align: center;
           user-select: none;
           -webkit-user-select: none;
           touch-action: manipulation;
        }

        .trusted_color{
            background-color: rgba(133, 186, 64 , 0.4);
        }
        .dataTables_length{
            display:none;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{asset('assets/images_front/pre-loader/loader-01.svg')}}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
