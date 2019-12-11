<template>
    <div class="col-md-10 text-left">
        <div class="row">
            <div v-for="destination in destinationsThumbnail" class="col-md-5 mb-5">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" v-bind:src="destination.image" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title pb-2">{{destination.title}}</h5>
                        <p class="card-text">{{destination.description}}</p>
                        <hr>
                        <div class="row mb-4">
                            <!-- loop rating -->
                            <div v-for="i in 5" class="col-md-1 col-sm-1 col-xs-1" style="width: auto !important; padding-right: 0 !important;">
                                <img v-if="i <= destination.review" src="/images/golden-star.png" alt="">
                                <img v-else-if="i > destination.review" src="/images/empty-star.png" alt="">
                            </div>
                            <!-- price -->
                            <div class="text-right col-md-7 col-sm-7 col-xs-7" style="width: auto">
                                <p class="card-price" style="padding-top: 0.3rem">starting from ${{destination.price}}</p>
                            </div>
                        </div>
                        <a id="destinations-details-cta" :value="destination.code" :href="`/view?destination=${destination.code}`" class="btn btn-primary text-uppercase">
                            destinations details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import json from '../../json/destinations-card.json';

    export default {

        data() {
            return{
                destinationsThumbnail: json,
            }
        },

        mounted() {
            console.log('Destination List Compiled!');
            console.log(this.$route.path);
        },

    }
</script>
