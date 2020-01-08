<template>
    <div class="col-md-12">
        <div class="row">
            <div v-for="destination in destinationsInfo" v-if="destination.city === displayCityInfo" class="col-md-12 mb-5">
                <div>
                    <!-- destination title and description -->
                    <div class="col-md-12 text-center mb-5">
                        <h2 class="heading-view text-uppercase mt-4 mb-5">
                            {{destination.title}}
                        </h2>
                        <p class="destination-description">
                            {{destination.description}}
                        </p>
                    </div>
                    <!-- destination itinerary -->
                    <div class="row mt-5 container" style="margin: auto">
                        <div class="col-md-12 text-center">
                            <h3 class="destinations-details-gray-headings mt-4 mb-4">
                                itinerary November
                            </h3>
                        </div>
                        <!-- days and activities loop -->
                        <div id="itinerary" v-for="days in destination.itinerary" class="col-md-4 text-left mb-5">
                            <h3 class="destinations-details-gray-headings mt-4 mb-4">
                                {{days.date}}
                            </h3>
                            <p class="destination-description">
                                {{days.activity}}
                            </p>
                        </div>
                        <div class="col-md-8 text-left mb-5">
<!--                            <img class="d-none d-sm-block" :src="destination.map" :alt="`map of ${displayCityInfo}`" style="width: 100%; object-fit: cover">-->
                            <div id="map" style="width: 100%; height: 100%;"></div>
<!--                            <object type="image/svg+xml" data="images/dropped-pin.svg">-->
<!--                                Your browser does not support SVG-->
<!--                            </object>-->
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #7070707a !important;">
                    <!-- explore more destinations -->
                    <div class="col-md-12 text-left mb-5">
                        <h2 class="heading-view mt-4 mb-5">
                            explore
                        </h2>
                    </div>
                    <div class="col-md-12 text-left">
                        <div class="row">
                            <div v-for="showCard in destinationsCards" v-if="showCard.code !== displayCityInfo" class="col-md-4 mb-5">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" v-bind:src="showCard.image" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title pb-2">{{showCard.title}}</h5>
                                        <p class="card-text">{{showCard.description}}</p>
                                        <hr>
                                        <div class="row mb-4">
                                            <!-- loop rating -->
                                            <div v-for="i in 5" class="col-md-1 col-sm-1 col-xs-1" style="width: auto !important; padding-right: 0 !important;">
                                                <img v-if="i <= showCard.review" src="/images/golden-star.png" alt="">
                                                <img v-else-if="i > showCard.review" src="/images/empty-star.png" alt="">
                                            </div>
                                            <!-- price -->
                                            <div class="text-right col-md-7 col-sm-7 col-xs-7" style="width: auto">
                                                <p class="card-price" style="padding-top: 0.3rem">starting from ${{showCard.price}}</p>
                                            </div>
                                        </div>
                                        <a id="destinations-details-cta" :value="showCard.code" :href="`/view?destination=${showCard.code}`" class="btn btn-primary text-uppercase">
                                            destinations details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    import json_info from '../../json/destinations-details.json';
    import json_cards from '../../json/destinations-card.json';

    export default {
        data() {
            return{
                destinationsInfo: json_info,
                destinationsCards: json_cards,
                displayCityInfo: this.$route.query.destination
            }
        },

        mounted() {
            console.log(this.displayCityInfo + ' Page loaded successfully!');
            this.initMap();
        },

        methods: {
            initMap() {

                var mapCityUrl = this.displayCityInfo;
                var longitud;
                var latitud;
                var customZoom;
                var iconDay1;
                var longitudDay1;
                var latitudDay1;
                var iconDay2;
                var longitudDay2;
                var latitudDay2;

                switch (mapCityUrl) {
                    case 'new-york':
                        longitud = -73.935242;
                        latitud = 40.730610;
                        customZoom = 10;
                        iconDay1= 'town-hall';
                        longitudDay1 = -74.0145492;
                        latitudDay1 = 40.7115242;
                        iconDay2= 'castle';
                        longitudDay2 = -74.0466891 ;
                        latitudDay2 = 40.6892494;
                        break;
                    case 'bora-bora':
                        longitud =  -151.7377588;
                        latitud = -16.4957495;
                        customZoom = 12;
                        iconDay1= 'theatre';
                        break;
                }

                mapboxgl.accessToken = 'pk.eyJ1IjoiY2FybG9zY2FybzE5OTQiLCJhIjoiY2s0NGx6a3hsMDA0MDNlcnRsMnZkdnZ5OSJ9.LZ7CukT8uDmuqFKqzEko4g';
                var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: [longitud, latitud],
                    zoom: customZoom
                });


                map.on('load', function() {
// Add a layer showing the places.
                    map.addLayer({
                        'id': 'places',
                        'type': 'symbol',
                        'source': {
                            'type': 'geojson',
                            'data': {
                                'type': 'FeatureCollection',
                                'features': [
                                    {
                                        'type': 'Feature',
                                        'properties': {
                                            'description':
                                                '<strong>Saturday 10</strong>' +
                                                '<p>' +
                                                'Visit World Trade Center, Financial District, NY Stock ' +
                                                'Exchange, JP Morgan Building, The first Capitol, Trump Tower, Charging Bull' +
                                                '</p>',
                                            'icon': iconDay1,
                                            'title': 'SAT 10'
                                        },
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [longitudDay1, latitudDay1]
                                        }
                                    },
                                    {
                                        'type': 'Feature',
                                        'properties': {
                                            'description':
                                                '<strong>Sunday 11</strong>' +
                                                '<p> We will make our way to the Statue of Liberty. Designed by Frédéric Auguste ' +
                                                'Bartholdi, this iconic copper statue was built by Gustave Eiffel and was ' +
                                                'dedicated on October 28, 1886. ' +
                                                '</p>',
                                            'icon': iconDay2,
                                            'title': 'SUN 11'
                                        },
                                        'geometry': {
                                            'type': 'Point',
                                            'coordinates': [longitudDay2, latitudDay2]
                                        }
                                    },
                                ]
                            }
                        },
                        'layout': {
                            'icon-image': '{icon}-15',
                            'icon-allow-overlap': true,
                            'text-field': ['get', 'title'],
                            'text-offset': [0, 0.9],
                        }
                    });

                    // Create a popup, but don't add it to the map yet.
                    var popup = new mapboxgl.Popup({
                        closeButton: false,
                        closeOnClick: false
                    });

                    map.on('mouseenter', 'places', function(e) {
// Change the cursor style as a UI indicator.
                        map.getCanvas().style.cursor = 'pointer';

                        var coordinates = e.features[0].geometry.coordinates.slice();
                        var description = e.features[0].properties.description;

// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
                        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                        }

// Populate the popup and set its coordinates
// based on the feature found.
                        popup
                            .setLngLat(coordinates)
                            .setHTML(description)
                            .addTo(map);
                    });

                    map.on('mouseleave', 'places', function() {
                        map.getCanvas().style.cursor = '';
                        popup.remove();
                    });
                    });

            } //end initmap
        }//end method
    }//end default
</script>
