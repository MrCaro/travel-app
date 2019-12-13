<template>
    <div class="col-md-12">
        <div class="row">
            <div v-for="destination in destinationsInfo"  class="col-md-12 mb-5">
                <div v-if="destination.city === displayCityInfo">
                    <!-- destination title and description -->
                    <div class="col-md-12 text-center mb-5">
                        <h2 id="explore-heading" class="text-uppercase mt-4 mb-5">
                            {{destination.title}}
                        </h2>
                        <p class="destination-description">
                            {{destination.description}}
                        </p>
                    </div>
                    <!-- destination itinerary -->
                    <div class="row mt-5">
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
                            <img class="d-none d-sm-block" :src="destination.map" :alt="`map of ${displayCityInfo}`">
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #7070707a !important;">
                    <!-- explore more destinations -->
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import json_info from '../../json/destinations-details.json';

    export default {
        data() {
            return{
                destinationsInfo: json_info,
                displayCityInfo: this.$route.query.destination
            }
        },

        mounted() {
            console.log(this.displayCityInfo + ' Page loaded successfully!');
        }
    }
</script>
