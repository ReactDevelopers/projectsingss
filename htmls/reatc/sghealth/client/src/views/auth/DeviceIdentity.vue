<template>
    <div>
        <h3>Identifying the Device... {{no_of_loaded}}</h3>
        <img v-for="(portal) in portals" :src="portal" :key="portal" :style="{display: 'none'}" @load="loadImageToSetCookie" />
    </div>
</template>

<script>
import {guidGenerator} from '@/utils';

export default {
    name: 'device-identify-page',
    data: function () {

        return {
            portals:[],
            no_of_loaded: 0,
        }
    },
    created: function () {

        const device_id = guidGenerator();
        const auth_url = process.env.VUE_APP_AUTH_URL+'/device-id';
        const admin_url = process.env.VUE_APP_ADMIN_URL+'/device-id';

        this.portals.push(auth_url);
        this.portals.push(admin_url);
    },
    methods: {

        /**
         * Function will execute after set the cookie on given domain.
         */
        loadImageToSetCookie: function() {
            no_of_loaded++;
        },
    }
}
</script>