@extends ('layouts.default')
@section ('content')
    <div class="home-banner text-center">
        <img id="home-banner-img-responsive" src="{{url('/images/welcome-banner-bg.png')}}" alt="" style="width: 100vw; height: 100vh;">
        <div id="home-banner-text-responsive" style="">
            <h1 class="text-uppercase font-size-90">
                thank you
            </h1>
            <p class="text-uppercase" style="font-weight: 700;">
                below is your confirmation details
            </p>
        </div>
    </div>
    <div class="text-center col-md-6 mt-5 mb-2" style="margin: auto">
        <div class="alert alert-info" role="alert">
            {{$destination ?? 'No destination selected'}}
        </div>
    </div>
    <div class="col-md-6 mb-5" style="margin: auto">
        <img src="{{url('/images/stamp-egypt.png')}}" alt="" style="position: absolute; z-index: 1; left: -20rem; top: -4rem; transform: rotate(-23deg)">
        <img src="{{url('/images/stamp-paris.png')}}" alt="" style="position: absolute; z-index: -1; left: -13rem; top: 14rem; transform: rotate(75deg)">
        <img src="{{url('/images/stamp-nyc.png')}}" alt="" style="position: absolute; z-index: -1; right: -27rem; top: -11rem; transform: rotate(52deg)">
        <img src="{{url('/images/stamp-london.png')}}" alt="" style="position: absolute; z-index: 1; right: -15rem; top: 2rem; transform: rotate(-11deg)">
        <div class="card mb-3">
{{--            <img class="d-none d-sm-block" src="{{url('/images/boarding-pass.png')}}" alt="Card image cap" style="width: 17rem; position: absolute; right: -7rem; top: -1rem;">--}}
            <div class="card-body">
                <p class="font-weight-light">Thank you for booking your trip to {{$destination ?? 'No destination selected'}}</p>
                <p class="font-weight-light">
                    Dates: {{$dates ?? 'No date selected'}}, {{$month ?? 'No date selected'}} 2020<br>
                    Number of tickets: {{$numberOfTickets ?? '0 tickets'}}
                </p>
                <p class="text-left" style="font-size: 1.5rem">
                    {{$price ?? 'Total: $0.00'}}
                </p>
                <hr>
                <p class="card-text text-center home-icon"><small class="text-muted"><a href="/">Go back to home page</a></small></p>
            </div>
        </div>
    </div>
@stop
