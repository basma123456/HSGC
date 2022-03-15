
@extends('layouts_front.master')



@section('content')



    <!-- start Header -->
    <section class="header news-header position-relative">
        <div class="uk-position-relative carousel-news">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    {{$i = 1}}
                    @foreach($carousels_attributes as $carousels_attribute)
                        {{$i++}}
                    <div class="carousel-item @if($i ===2) active @endif">
                        <img src="{{asset('assets/images_front/projects_page/')}}/{{$carousels_attribute->carousel_image}}" class="d-block w-100  main-imgCarousel">
                        <div class="uk-position-center bg-second text-center text-white p-4 w-75 m-auto">
                            <h5 class="text-white ">{{$carousels_attribute->carousel_title}}</h5>
                            <p>{{$carousels_attribute->carousel_summary}}.</p>
                        </div>
                        <div class="uk-position-bottom-center bg-second text-white px-2 w-100">
                            <div class="row justify-content-between carousel-footer w-100 fix-max-height">
                                <div class="col-3 floatLeftOrRight">
                                    <p>Whats's new</p>
                                    <p class="w-100">{{$carousels_attribute->text1}}</p>
                                </div>
                                <div class="col-3 floatLeftOrRight">
                                    <p class="w-100">{{$carousels_attribute->text2}}</p>
                                </div>
                                <div class="col-3 floatLeftOrRight">
                                    <img  class="w-50 fixedHeightImgSmall" src="{{asset('assets/images_front/projects_page/')}}/{{$carousels_attribute->carousel_image2}}" class="m-auto d-block" alt="">
                                </div>
                                <div class="col-3">{{$carousels_attribute->text3}}</div>
                            </div>
                        </div>
                    </div>
                        @endforeach
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
            <div class="uk-position-top">

                @include('layouts_front.nav')

            </div>
        </div>
    </section>
    <!-- End Header -->
    <!-- Start main -->
    <section class="main py-4">
        <div class="container">
            <div class="news-filter uk-position-relative uk-visible-toggle uk-light py-5" tabindex="-2" uk-slider>
                <ul class="uk-slider-items uk-subnav uk-subnav-pill uk-child-width-1-1 uk-grid">

                    @foreach($newss as $group)

                    <div uk-filter="target: .js-filter" class="row">
                        <div class="b col-8 col-md-4 order-md-0 order-1 py-3 m-auto">
                            <ul class="js-filter" uk-grid>
                                @foreach($group->newss as $oneNew)
                                <li data-project="a{{$oneNew->id}}" class="text-white m-4">
                                    <p class="text-center"> {{$oneNew->summary}}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="a col-12 col-md-8">
{{--                            @for($i=1; $i <=2; $i++)--}}
                            <ul class="filter-img d-flex @if(App::getLocale() === 'en') justify-content-end float-right @elseif(App::getLocale() === 'ar')   justify-content-start float-left  @endif row" style="width: 100%;  overflow-wrap: break-word !important;">
                                @foreach($group->newss as $oneNew)
                                <li class="uk-active  mx-4 my-2 m-1 col-3 col-sm-6" style="height: fit-content; width: fit-content" uk-filter-control="[data-project='a{{$oneNew->id}}']">
                                    <a  href="#"><img  style="object-fit: cover;  height: 5em;" src="{{asset('assets/images_front/news_images/')}}/{{$oneNew->image}}" alt=""></a>
                                </li>
                                @endforeach

                            </ul>
{{--                            @endfor--}}
{{--                            <ul class="filter-img d-flex justify-content-around ">--}}
{{--                                <li uk-filter-control="[data-project='e']">--}}
{{--                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>--}}
{{--                                </li>--}}
{{--                                <li uk-filter-control="[data-project='f']">--}}
{{--                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>--}}
{{--                                </li>--}}
{{--                                <li uk-filter-control="[data-project='g']">--}}
{{--                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>--}}
{{--                                </li>--}}
{{--                                <li uk-filter-control="[data-project='h']">--}}
{{--                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}
                        </div>
                    </div>
                    @endforeach


                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>

    </section>
    <!-- End main -->
@endsection
