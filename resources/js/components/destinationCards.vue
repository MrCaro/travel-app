<template>
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
</template>

<script>
    export default {
        name: "destinationCards.vue",
        props: ['showCard'],
    }
</script>
