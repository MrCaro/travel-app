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
                            <img class="d-none d-sm-block" :src="destination.map" :alt="`map of ${displayCityInfo}`" style="width: 100%; object-fit: cover">
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
        }
    }
</script>
