<template>
	<event-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import eventForm from './form/event';
	import {get as getEventApi,update} from '@/api/event';
export default {
    name: 'event_edit_page',
    components:{
        eventForm
    },
    data: function () {

        return {
            formName: 'event_form'
        }
    },
    created(){
        getEventApi(this.$route.params.id).then((response) => {
            var event = response.data.event;
            
            event.branch_ids = event.event_branches.map(function(v){
                return v.branch_id;
            });

            event.branches = event.event_branches.map(function(v){
                return v.branch;
            });

            event.institute_ids = event.event_institutes.map(function(v){
                return v.institute_id;
            });

            event.institutes = event.event_institutes.map(function(v){
                return v.institute;
            });

            event.profession_ids = event.event_professions.map(function(v){
                return v.profession_cat_id;
            });

            event.professions = event.event_professions.map(function(v){
                return v.profession;
            });

            this.$lqForm.initializeValues(this.formName, event)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/event', () => {
                    this.$message.success('Event has been updated.');
                })
            }
        }

}
</script>
