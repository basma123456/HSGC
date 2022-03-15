
@extends('layouts_front.master')



@section('content')


    <h2 class="bg bg-warning">

    @if($newss)
        @foreach($newss as $new)
{{--            {{$new->newss }} <br>--}}

            @foreach($new->newss as $one)
                {{$one-> image}}<br>
                @endforeach
        @endforeach
    @endif
    </h2>

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
                        <div class="uk-position-bottom-center bg-second text-white px-2">
                            <div class="row justify-content-between carousel-footer">
                                <div class="col-3">
                                    <p>Whats's new</p>
                                    <p>{{$carousels_attribute->text1}}</p>
                                </div>
                                <div class="col-3">
                                    <p>{{$carousels_attribute->text2}}</p>
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('assets/images_front/projects_page/')}}/{{$carousels_attribute->carousel_image2}}" class="m-auto d-block" alt="">
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
                    <div uk-filter="target: .js-filter" class="row">
                        <div class="b col-8 col-md-4 order-md-0 order-1 py-3 m-auto">
                            <ul class="js-filter" uk-grid>
                                <li data-project="a" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto sapiente dicta, cum magni soluta natus earum ducimus illum alias quae quam architecto optio dolores neque in voluptatem. Earum, quidem qui?</p>
                                </li>
                                <li data-project="b" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi,sdam libero unde quam quidem praesentium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="c" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quam quidem praesentium? Sapiente corporis cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="d" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. quidem praesentium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="e" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. E quidem praesentium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="f" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quam quidem praesentium? Sapiente eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="g" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quntium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="h" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quam quidem praeseneaque cupiditate numquam qui, alias unde!</p>
                                </li>
                            </ul>
                        </div>
                        <div class="a col-12 col-md-8 ">
                            <ul class="filter-img d-flex justify-content-around ">
                                <li class="uk-active" uk-filter-control="[data-project='a']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='b']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='c']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='d']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>

                            </ul>
                            <ul class="filter-img d-flex justify-content-around ">
                                <li uk-filter-control="[data-project='e']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='f']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='g']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='h']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div uk-filter="target: .js-filter" class="row">
                        <div class="b col-4 m-auto">
                            <ul class="js-filter" uk-grid>
                                <li data-project="a" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iusto sapiente dicta, cum magni soluta natus earum ducimus illum alias quae quam architecto optio dolores neque in voluptatem. Earum, quidem qui?</p>
                                </li>
                                <li data-project="b" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi,sdam libero unde quam quidem praesentium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="c" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quam quidem praesentium? Sapiente corporis cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="d" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. quidem praesentium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="e" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. E quidem praesentium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="f" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quam quidem praesentium? Sapiente eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="g" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quntium? Sapiente corporis explicabo saepe eaque cupiditate numquam qui, alias unde!</p>
                                </li>
                                <li data-project="h" class="text-white">
                                    <p class="text-center">Lorem ipsum dolor sitexplicabo omnis. Eum ex minus quibusdam libero unde quam quidem praeseneaque cupiditate numquam qui, alias unde!</p>
                                </li>
                            </ul>
                        </div>
                        <div class="a col-8">
                            <ul class="filter-img d-flex justify-content-around ">
                                <li class="uk-active" uk-filter-control="[data-project='a']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='b']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='c']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='d']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>

                            </ul>
                            <ul class="filter-img d-flex justify-content-around ">
                                <li uk-filter-control="[data-project='e']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='f']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='g']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>
                                <li uk-filter-control="[data-project='h']">
                                    <a href="#"><img src="{{asset('assets/images_front/pexels-anamul-rezwan-1216589.jpg')}}" alt=""></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>

    </section>
    <!-- End main -->
@endsection
