<template>
	<certificate-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import certificateForm from './form/Certificate';
	import {get as getCertificateApi,update} from '@/api/certificate';
export default {
    name: 'certificate_edit_page',
    components:{
        certificateForm
    },
    data: function () {

        return {
            formName: 'certificate_form'
        }
    },
    created(){
        getCertificateApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName, response.data.certificate)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/certificate', () => {
                    this.$message.success('Certificate has been added.');
                })
            }
        }

}
</script>
