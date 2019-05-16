<template>
    <lq-select v-bind="$attrs" 
        :remote="true" 
        ref="slt"
        :request="fetchPlaces"
        label-key="formatted_address"
        value-key="place_id"
        remote-response-path="json.results"
        value-format="object"
        filterable
        remote
    >

    </lq-select>

</template>

<script>


import LqSelect from './Select';

const googleMapsClient = require('@google/maps');

export default {
    name: 'lq-element-place',
    components: {LqSelect},
    props: {
        apiKey: {
            type: String,
            required: true
        }
    },
    methods: {

        /**
         * To fetch the places from google api.
         */
        fetchPlaces: function (address) {            
            
            if(!address) {
                return
            }
            const api = googleMapsClient.createClient({
              key: this.apiKey,
            });

            return new Promise ( (reslove, reject) => {

                api.geocode({
                  address: address
                },  (err, response) => {

                    if (err) {
                        reject(err);
                    }

                    reslove(response);
                });
            })
        }        
    }
}
</script>
