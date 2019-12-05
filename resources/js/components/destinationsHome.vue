<template>
    <div class="col-md-10 text-left">
        <div class="row">
            <div v-for="destination in destinationsThumbnail" class="col-md-5 mb-5">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" v-bind:src="destination.image" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title pb-2">{{destination.title}}</h5>
                        <p class="card-text">New York City comprises 5 boroughs sitting where the Hudson River meets the Atlantic Ocean</p>
                        <hr>
                        <a id="destinations-details-cta" href="#" class="btn btn-primary text-uppercase">destinations details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import json from '../../json/destinations-card.json'

    export default {
        data() {
            return{
                destinationsThumbnail: json
            }
        },

        mounted() {
            console.log('Destination List Compiled!')
        }
    }
</script>
