@extends('layouts_front.master')


@section('content')
    <!-- Start Header -->
    <section class="header">
        @include('layouts_front.nav')

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <!--------------trick of indecators------------>
                @php $n=1; @endphp
                @foreach($carousel_attributes as $carousel_attribut)
                    @php $n++; @endphp
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$n-2}}"  @if($n-2 === 0)class="active" aria-current="true"@endif aria-label="Slide {{$n-1}}"></button>
                @endforeach
                <!--------------trick of indecators------------>

            </div>
            <div class="carousel-inner">

                @if($carousel_attributes)
                       {{ $i = 1}}
                    @foreach($carousel_attributes as $carousel_attribute)
                           {{ $i++}}
                        <div class="about-carousel-item carousel-item @if($i === 2) active @endif">
                            <img src="{{URL::asset('assets/images_front/projects_page/')}}/{{$carousel_attribute->carousel_image}}" class="d-block w-100">
                            <div class="carousel-caption uk-position-center w-75">
                                <h3 class="text-light">{{$carousel_attribute->carousel_title}}</h3>
                                <p class="text-light">{{$carousel_attribute->carousel_summary}}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
        </div>
    </section>
    <!-- End Header -->
    <!-- Start main -->
    <section class="main my-5">
        <!-- About -->
        <div class="about">
            <div class="container">
                <div class="about-header">
                    <h3 class="text-center">{{trans('main_trans.about')}}</h3>
                </div>
                <div class="d-flex justify-content-between py-5">
                    <div class="about-img row position-relative">
                        <div class="up-img">
                            <img src="{{URL::asset('assets/images_front/about_company/')}}/{{$all_data->left_first_image}}" class="h-100 w-100" alt="">
                        </div>
                        <div class="down-img position-absolute">
                            <img src="{{URL::asset('assets/images_front/about_company/')}}/{{$all_data->left_second_image}}" class="h-100 w-100" alt="">
                        </div>
                    </div>
                    <div class="about-body" style="text-align: center;">
                        <p>
                            {{$all_data->about_company_summary}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- vision -->
        <div class="vision mt-5">
            <div class="container-fluid">
                <div class=" bg-second py-5">
                    <h2 class="text-center text-white">{{trans('main_trans.our_vision')}}</h2>
                    <div class="text-vision d-flex justify-content-between">
                        <p class="p-4 text-white">
                            {{$all_data->our_vision_summary}}
                        </p>
                        <img src="{{URL::asset('assets/images_front/about_company/')}}/{{$all_data->our_vision_image}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- style -->
        <div class="style">
            <div class="d-flex justify-content-center">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- behind -->
        <div class="behind bg-second">
            <div class="container">
                <h3 class="text_center text-white">{{trans('main_trans.behind')}}</h3>
                <div class="behind-body p-4">
                    <ul class="uk-subnav uk-subnav-pill justify-content-center" uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                      @foreach($users as $user)
                        <li>
                            <a href="#" class="d-block text-center px-md-3">
                                <h3>{{$user->name}}</h3>
                                {{$user->title}}
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <ul class="uk-switcher uk-margin d-flex justify-content-center">
                        @foreach($users as $user)
                        <li>
                            <p class="text-white p-3">{{$user->summary}}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
        <!-- work -->
        <div class="work py-4">
            <div class="container">
                <h3 class="text-center uk-text-bold">{{trans('main_trans.work_with_us')}}</h3>
                <p class="text-center">{{$all_data->work_with_us_summary}}</p>
                <a href="{{url('apply')}}" class="btn bg-main text-white d-block w-25 my-5 mx-auto rounded-pill py-3 text-decoration-none">Apply</a>
            </div>
        </div>
    </section>
    <!-- End main -->
@endsection
