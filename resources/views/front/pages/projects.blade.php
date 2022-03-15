@extends('layouts_front.master')



@section('content')

    <!-- Start Header -->
    <section class="header">
        @include('layouts_front.nav')
    </section>
    <!-- main -->
    <section class="main">
        <!-- landscape -->
        <div class="landscape my-5">
            <div class="container">
                <h2>{{trans('projects.Landscape')}}</h2>
                <div class="row">
                    <h3 class="col-12 col-md-6 order-1"> {{$landscapeFront->title}}.</h3>
                    <p class="col-12 col-md-6 order-2">
                        {{$landscapeFront->summary}}.
                        </p>
                    <img class="col-12 col-md-6 order-1" src="{{asset('assets/images_front/projects_page/')}}/{{$landscapeFront->image}}" alt="">
                </div>
            </div>
        </div>
        <!-- construcation -->
        <div class="constr my-5 ">
            <div class="container">
                <h2>{{trans('projects.Construction')}}</h2>
                <div class="uk-position-relative uk-visible-toggle uk-light w-75 mx-auto" tabindex="-1" uk-slider>

                    <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-4@m uk-child-width-1-3@s uk-grid">
                        @foreach($constructions as $construction)
                        <li>
                            <div class="uk-panel">
                                <img class="widthFixed" src="{{asset('assets/images_front/projects_page/')}}/{{$construction->image}}" alt="">

                            </div>
                        </li>
                            @endforeach
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                </div>
            </div>
        </div>
        <!-- Roads -->
        <div class="roads my-5">
            <div class="container">
                @if(isset($roads))

                <h2>{{trans('projects.Roads')}}</h2>

                <div class="uk-slider-container-offset w-75 m-auto" uk-slider>

                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-child-width-1-2@s uk-grid">
                            @foreach($roads as $road)
                            <li>
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img src="{{asset('assets/images_front/projects_page/')}}/{{$road->image}}" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <p>{{$road->summary}}.</p>
                                    </div>
                                </div>
                            </li>
                                @endforeach
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                    </div>

                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                </div>
                @endif
                <div uk-filter="target: .js-filter">

                    <ul class="uk-breadcrumb uk-subnav uk-subnav-pill justify-content-center">
                        <li class="uk-active" uk-filter-control><a href="#">All</a></li>
                        <li uk-filter-control="[data-color='Landscape']"><a href="#">Landscape</a></li>
                        <li uk-filter-control="[data-color='Elcrtic']"><a href="#">Elcrtic</a></li>
                        <li uk-filter-control="[data-color='Constraction']"><a href="#">Constraction</a></li>
                        <li uk-filter-control="[data-color='Roads']"><a href="#">Roads</a></li>
                    </ul>

                    <ul class="js-filter uk-child-width-1-2 uk-child-width-1-3@m uk-text-center" uk-grid>
                        @if(isset($landscapes))

                            @foreach($landscapes as $landscape)
                            <li data-color="Landscape">
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img class="heightFixedProjects" src="{{asset('assets/images_front/projects_page/')}}/{{$landscape->image}}" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <p>{{$landscape->summary}}.</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        @endif

                        @if(isset($electrics))
                                @foreach($electrics as $electric)
                                <li data-color="Elcrtic">
                                    <div class="uk-card uk-card-default">
                                        <div class="uk-card-media-top">
                                            <img class="heightFixedProjects" src="{{asset('assets/images_front/projects_page/')}}/{{$electric->image}}" alt="">
                                        </div>
                                        <div class="uk-card-body">
                                            <p>{{$electric->image}}.</p>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                        @endif

                            @if(isset($constructions))
                                @foreach($constructions as $construction)
                            <li data-color="Constraction">
                                <div class="uk-card uk-card-default">
                                    <div class="uk-card-media-top">
                                        <img class="heightFixedProjects" src="{{asset('assets/images_front/projects_page/')}}/{{$construction->image}}" alt="">
                                    </div>
                                    <div class="uk-card-body">
                                        <p>{{$construction->summary}}.</p>
                                    </div>
                                </div>
                            </li>
                                @endforeach
                            @endif

                            @if(isset($roads))
                                    @foreach($roads as $road)
                                        <li data-color="Roads">
                                            <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top">
                                                    <img src="{{asset('assets/images_front/projects_page/')}}/{{$road->image}}" alt="">
                                                </div>
                                                <div class="uk-card-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                @endif
                    </ul>

                </div>
            </div>
        </div>
        <!-- Clients -->
        <div class="clients my-3">
            <div class="container">
                <h2 class=" text-center">Our Trusted Clients</h2>
                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
                        @foreach($clients as $client)

                        <li>
                            <div class="uk-panel">
                                <img src="{{asset('assets/images_front/clients_images')}}/{{$client->image}}" alt="">
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                </div>
            </div>
        </div>
    </section>
@endsection
