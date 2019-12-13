@extends ('layouts.default')

@section ('content')
    {{--  Banner Hero --}}
    <div class="home-banner text-center">
        <img id="home-banner-img-responsive" src="{{url('/images/nyc-banner-bg.png')}}" alt="" style="width: 100vw; height: 100vh;">
        <div id="destinations-banner-blur-responsive-nyc" class="d-none d-sm-block">
        </div>
        {{-- desktop --}}
        {{-- title --}}
        <div id="destinations-banner-text-responsive" style="">
            <h1 class="text-uppercase font-size-70 d-none d-sm-block">
                new york<br>usa
            </h1>
            <hr class="destinations-banner-title-separator d-none d-sm-block">
        </div>
        {{-- price --}}
        <div id="destination-banner-price-responsive">
            <p class="destinations-price-banner d-none d-sm-block">
                starting from $800
            </p>
        </div>
        {{-- promo --}}
        <div id="destination-banner-promo-responsive">
            <p class="destinations-promo-banner d-none d-sm-block">
                use promo code
            </p>
        </div>
        <div id="destination-banner-promo-responsive">
            <p class="destinations-promo-banner font-size-70 d-none d-sm-block">
                NY20
            </p>
        </div>
        {{-- tag line --}}
        <div id="destination-banner-tagline-responsive">
            <p class="destinations-tagline-banner d-none d-sm-block">
                Explore the city that never sleeps
            </p>
        </div>
        <div class="home-box">
            <p class="gray-home-sub-heading text-uppercase text-left">our destinations for 2020</p>
        </div>
        {{-- mobile --}}
        <div id="" class="text-center d-block d-sm-none" style="position: absolute; top: 15vh; width: 100%;">
            <h1 class="text-uppercase font-size-70">
                new york<br>usa
            </h1>
        </div>
    </div>
    {{--  Content  --}}
    <div class="container" id="app">
        <div class="row">
            {{--  new york info --}}
            <destinations-info></destinations-info>
            {{-- List of destinations --}}
        </div>
    </div>
@stop
