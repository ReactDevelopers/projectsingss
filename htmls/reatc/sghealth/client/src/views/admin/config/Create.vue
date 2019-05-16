<template>
	<certificate-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import certificateForm from './form/Certificate';
	import {create} from '@/api/certificate';
export default {
    name: 'certificate-add-page',
    components:{
        certificateForm
    },
    data: function () {

        return {
            formName: 'certificate_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/certificate', () => {
                    this.$message.success('Certificate has been updated.');
                })
            }
        }

}
</script>
