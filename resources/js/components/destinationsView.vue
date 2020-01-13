<template>
    <div>
        <div v-for="destination in destinationsInfo" v-if="destination.city === displayCityInfo">
            <form action="/" method="post">
                <div class="home-box">
                    <div class="row">
                        <div class="col-md-4" style="margin: auto">
                            <label class="sr-only" for="staticEmail2">Name</label>
                            <input type="text" readonly class="form-control-plaintext book-now" id="staticEmail2" :value="destination.from">
                        </div>
                        <div class="col-md-4" style="margin: auto">
                            <label class="sr-only" for="staticEmail3">Dates</label>
                            <select v-model="selected" id="staticEmail3" class="form-control input-responsive" style="width: 70%;">
                                <option disabled value="">{{destination.month}} dates</option>
                                <option v-for="option in destination.itineraries" :value="option.label">{{option.label}}</option>
                            </select>
                        </div>
                        <div class="col-md-4 text-left">
                            <label for="formGroupExampleInput" class="book-now">Enter number of tickets</label>
                            <input type="number" class="form-control input-responsive" id="formGroupExampleInput" v-model="numberOfTickets"  placeholder="0" style="display: inline-block; width: 20%;">
                            <p>Total: ${{800 * numberOfTickets}}</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-uppercase" style="">
                        book now
                    </button>
                </div>
            </form>
            <div class="container">
                <div class="">
                    <div class="row">
                        <div  class="col-md-12 mb-5">
                            <destination-itinerary v-bind:destination = "destination" v-bind:selected = "selected"></destination-itinerary>
                            <div class="text-left">
                                <div class="row">
                                    <div v-for="showCard in destinationsCards" v-if="showCard.code !== displayCityInfo" class="col-md-4 mb-5">
                                        <destinations-cards v-bind:showCard = showCard></destinations-cards>
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
                displayCityInfo: this.$route.query.destination,
                selected: "",
                numberOfTickets: "1",
                total: "800"
            }
        },

        mounted() {
            console.log('Page loaded successfully! ' + this.displayCityInfo);
        },

        methods: {

        }//end method
    }//end default
</script>
