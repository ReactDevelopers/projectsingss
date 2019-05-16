<template>
	<license-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import licenseForm from './form/License';
	import {get as getLicenseApi,update} from '@/api/license';
export default {
    name: 'license_edit_page',
    components:{
        licenseForm
    },
    data: function () {

        return { 
            formName: 'license_form'
        }
    },
    created(){
        getLicenseApi(this.$route.params.id).then((response) => {
            let license = response.data.licenses;
            // license.certificate_ids = license.certificate.map(function(v){
            //     return v.id;
            // });

            this.$lqForm.initializeValues(this.formName, license)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/license', () => {
                    this.$message.success('License has been updated.');
                })
            }
        }

}
</script>
