<nav class="navbar navbar-expand-lg navbar-dark bg-white">
    <div class="container">
        <img src="{{URL::asset('assets/images_front/logo-dark.png')}}" alt="">
        <button class="navbar-toggler text-dark uk-text-bold " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link px-5 text-dark uk-text-bold " aria-current="page" href="{{url('main')}}">{{trans('main_trans.home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link px-5 txt-col-second uk-text-bold" href="{{url('about-company')}}">{{trans('main_trans.about')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5 text-dark uk-text-bold " href="{{url('project')}}">{{trans('main_trans.projects')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-5 text-dark uk-text-bold " href="{{url('news')}}">{{trans('main_trans.news')}}</a>
                </li>


            </ul>
            <ul style="height: 1em;" class="btn btn-light mt-0">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="d-inline-block mx-1">
                        <small><a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                        </small>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</nav>
