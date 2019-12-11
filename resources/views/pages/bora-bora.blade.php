@extends ('layouts.default')

@section ('content')
    {{--  Banner Hero --}}
    <div class="home-banner text-center">
        <img id="home-banner-img-responsive" src="{{url('/images/bora-bora-banner-bg.png')}}" alt="" style="width: 100vw; height: 100vh;">
        <div id="destinations-banner-blur-responsive-bora-bora">
        </div>
        {{-- title --}}
        <div id="destinations-banner-text-responsive" style="">
            <h1 class="text-uppercase font-size-70">
                bora bora<br>tahiti
            </h1>
            <hr class="destinations-banner-title-separator">
        </div>
        {{-- price --}}
        <div id="destination-banner-price-responsive">
            <p class="destinations-price-banner">
                starting from $1200
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
                BB20
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
            {{--  bora bora info --}}
            <destinations-info></destinations-info>
            {{-- List of destinations --}}
        </div>
    </div>
@stop
