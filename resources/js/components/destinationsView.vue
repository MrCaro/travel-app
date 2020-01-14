<template>
    <div>
        <div v-for="destination in destinationsInfo" v-if="destination.city === displayCityInfo">
            <form action="/send-mail" method="post">
                <div class="destinations-box">
                    <div class="row">
                        <div class="col-md-4" style="margin: auto">
                            <label class="sr-only" for="destinationBook">Name</label>
                            <input name="destination" type="text" readonly class="form-control-plaintext book-now" id="destinationBook" :value="destination.from">
                            <label class="sr-only" for="monthBook">Month</label>
                            <input name="month" type="text" readonly class="form-control-plaintext book-now" id="monthBook" :value="destination.month">
                        </div>
                        <div class="col-md-4" style="margin: auto">
                            <label class="sr-only" for="dateBook">Dates</label>
                            <select name="dates" v-model="selected" id="dateBook" class="form-control input-responsive" style="width: 70%;">
                                <option disabled value="">{{destination.month}} dates</option>
                                <option v-for="option in destination.itineraries" :value="option.label">{{option.label}}</option>
                            </select>
                        </div>
                        <div class="col-md-4 text-left">
                            <label for="ticketsBook" class="book-now">Enter number of tickets</label>
                            <input name="numberOfTickets" type="number" class="form-control input-responsive" id="ticketsBook" v-model="numberOfTickets"  placeholder="0" style="display: inline-block; width: 20%;">
                            <label class="sr-only" for="priceBook">Price</label>
                            <input name="price" type="text" readonly class="form-control-plaintext book-now" id="priceBook" :value="`Total: $${destination.price * numberOfTickets}`">
<!--                            <p>Total: ${{destination.price * numberOfTickets}}</p>-->
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
            }
        },

        mounted() {
            console.log('Page loaded successfully! ' + this.displayCityInfo);
        },

        methods: {

        }//end method
    }//end default
</script>
