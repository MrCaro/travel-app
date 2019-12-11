@extends ('layouts.default')

@section ('content')
    {{--  Banner Hero --}}
    <div class="home-banner text-center">
        <img id="home-banner-img-responsive" src="{{url('/images/nyc-banner-bg.png')}}" alt="" style="width: 100vw; height: 100vh;">
        <div id="destinations-banner-blur-responsive-nyc">
        </div>
        {{-- title --}}
        <div id="destinations-banner-text-responsive" style="">
            <h1 class="text-uppercase font-size-70">
                new york<br>usa
            </h1>
            <hr class="destinations-banner-title-separator">
        </div>
        {{-- price --}}
        <div id="destination-banner-price-responsive">
            <p class="destinations-price-banner">
                starting from $800
            </p>
        </div>
        {{-- promo --}}
        <div id="destination-banner-promo-responsive">
            <p class="destinations-promo-banner">
                use promo code
            </p>
        </div>
        <div id="destination-banner-promo-responsive">
            <p class="destinations-promo-banner font-size-70">
                NY20
            </p>
        </div>
        {{-- tag line --}}
        <div id="destination-banner-tagline-responsive">
            <p class="destinations-tagline-banner">
                Explore the city that never sleeps
            </p>
        </div>
        <div class="home-box">
            <p class="gray-home-sub-heading text-uppercase text-left">our destinations for 2020</p>
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
