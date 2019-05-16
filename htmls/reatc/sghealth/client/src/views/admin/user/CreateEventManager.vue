<template>
    <event-manager-create-form form-name="event_manager_create" :request="createApi" @submited-success="success" />
</template>
<script>

import EventManagerCreateForm from './form/EventManagerCreateForm'
import {createEventManager} from '@/api/users';


export default {
    name: 'employee-create-page',
    components: {EventManagerCreateForm},
    methods: {

        createApi: function (data) {
            data.role = 'event-manager'
            return createEventManager( data);
        },
        success: function (resposne) {
            this.$router.push('/users', () => {
                this.$message.success('Employee has been added.');
            })
        }
    }
}
</script>

