<template>
	<job-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import jobForm from './form';
	import {get as getJobApi,update} from '@/api/job';
export default {
    name: 'job_edit_page',
    components:{
        jobForm
    },
    data: function () {

        return { 
            formName: 'job_form'
        }
    },
    created(){
        getJobApi(this.$route.params.id).then((response) => {
            let job = response.data.assignment;
            // job.certificate_ids = job.certificate.map(function(v){
            //     return v.id;
            // });

            this.$lqForm.initializeValues(this.formName, job)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/job', () => {
                    this.$message.success('Job has been updated.');
                })
            }
        }

}
</script>
