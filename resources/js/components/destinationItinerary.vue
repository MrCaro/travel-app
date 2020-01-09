<template>
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
            <div v-for="viewDestination in destination.itineraries" v-if="selected === viewDestination.label" class="row">
                <div v-for="travel in viewDestination.itinerary"  id="itinerary" class="col-md-4 text-left mb-5">
                    <h3 class="destinations-details-gray-headings mt-4 mb-4">
                        {{travel.date}}
                    </h3>
                    <p class="destination-description">
                        {{travel.activity}}
                    </p>
                </div>
                <div class="col-md-8 text-left mb-5" >
                    <div id="map" style="width: 100%; height: 100%;"></div>
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid #7070707a !important;">
        <!-- explore more destinations -->
        <div class="col-md-12 text-left mb-5">
            <h2 class="heading-view mt-4 mb-5">
                explore
            </h2>
        </div>
    </div>
</template>
<script>
    export default {
        name: "destinationItinerary",
        props: ['destination', 'selected'],

        data(){
            return {
                displayCityInfo: this.$route.query.destination,
            }
        },

        mounted() {
            console.log("Date range selected: " + this.selected);
        },

        watch: {
            selected: function (val) {
                console.log("Date range selected: " + this.selected);
                var vm = this;
                setTimeout(function () {
                    vm.initMap();
                }, 1000);
            }
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
                        customZoom = 9.5;
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
    }
</script>
