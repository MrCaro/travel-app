<template>
    <div class="col-md-10 text-left">
        <div class="row">
            <div v-for="destination in destinationsThumbnail" class="col-md-5 mb-5">
                <destinations-cards v-bind:showCard = destination></destinations-cards>
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
            console.log('Home Page loaded successfully!');
        },
    }
</script>
