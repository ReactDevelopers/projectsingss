<template>
	<certificate-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import certificateForm from './form/Service';
	import {get as getCertificateApi,update} from '@/api/service';
export default {
    name: 'service_edit_form',
    components:{
        certificateForm
    },
    data: function () {

        return {
            formName: 'service_form'
        }
    },
    created(){
        getCertificateApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName, response.data.service)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/service', () => {
                    this.$message.success('Service has been added.');
                })
            }
        }

}
</script>
