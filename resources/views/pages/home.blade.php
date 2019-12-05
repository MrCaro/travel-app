@extends ('layouts.default')

@section ('content')
    {{--  Banner Hero --}}
    <div class="home-banner text-center">
        <img id="home-banner-img-responsive" src="{{url('/images/travel-bg.png')}}" alt="" style="width: 100%; height: 100vh;">
        <div id="home-banner-text-responsive" style="">
            <h1 class="text-uppercase font-size-90">
                welcome
            </h1>
            <p class="text-uppercase" style="font-weight: 700;">
                BRINGING BREATH TAKING DESTINATIONS FOR YOU
            </p>
        </div>
        <div class="home-box">
            <p class="gray-home-sub-heading text-uppercase text-left">our destinations for 2020</p>
        </div>
    </div>
    {{--  Content  --}}
    <div class="container" id="app">
        <div class="row">
            <div class="col-md-10 text-left mb-5">
                <h2 id="explore-heading" class="text-lowercase">explore</h2>
            </div>
            {{-- List of destinations --}}
            <example></example>
            <div class="col-md-2 text-center d-none d-md-block" style="position: relative;">
                <div id="home-2020">
                    <p>2</p><br><p>0</p><br><p>2</p><br><p>0</p>
                </div>
            </div>
        </div>
    </div>
@stop
