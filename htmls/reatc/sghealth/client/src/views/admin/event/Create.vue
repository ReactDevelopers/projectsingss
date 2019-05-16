<template>
	<event-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import eventForm from './form/event';
	import {create} from '@/api/event';
export default {
    name: 'event_add_page',
    components:{
        eventForm
    },
    data: function () {

        return {
            formName: 'event_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/event', () => {
                    this.$message.success('Event has been added succefully.');
                })
            }
        }

}
</script>
