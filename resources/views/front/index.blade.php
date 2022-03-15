@extends('layouts_front.master')


@section('content')
    <!-- Start Header -->
    <section class="header position-relative">
        <div class="uk-position-relative">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <!--------------trick of indecators------------>
                    @php $n=1; @endphp
                    @foreach($attrs as $carousel_attribut)
                        @php $n++; @endphp
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$n-2}}"  @if($n-2 === 0)class="active" aria-current="true"@endif aria-label="Slide {{$n-1}}"></button>
                @endforeach
                <!--------------trick of indecators------------>
                </div>
                <div class="carousel-inner">
                    {{$i = 1}}

                    @foreach($attrs as $attr)
                        {{$i++}}
                    <div class="carousel-item @if($i === 2) active @endif">


                        @if(isset($attr->carousel_image) && $attr->carousel_image !== '0')
                        <video class="d-block w-100 img-lg" width="320" height="240"  autoplay muted>

                            <source class="boxShadowCustom" type="video/mp4" src="{{asset('assets/images_front/projects_page/')}}/{{ $attr->carousel_image }}" >
                        </video>
                        @else
                            <img style="height: 100vh; width: 100vw;" height="240" src="{{asset('assets/images_front/projects_page/')}}/{{$attr->carousel_image2}}" />
                        @endif


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
    @endsection
