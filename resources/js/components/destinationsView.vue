<template>
    <div class="col-md-12">
        <div class="row">
            <div v-for="destination in destinationsInfo"  class="col-md-12 mb-5">
                <div v-if="destination.city === test" class="col-md-12 text-center mb-5">
                    <h2 id="explore-heading" class="text-uppercase mt-4 mb-4">
                        {{destination.title}}
                    </h2>
                    <p class="destination-description">
                        {{destination.description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import json_info from '../../json/destinations-details.json';

    export default {
        props: {
            query: {
                type: String,
                default: '',
            }
        },

        data() {
            return{
                destinationsInfo: json_info,
                test: this.$route.query.destination
            }
        },

        mounted() {
            console.log('Destination Info Compiled!');
            console.log(this.test);
        }
    }
</script>
