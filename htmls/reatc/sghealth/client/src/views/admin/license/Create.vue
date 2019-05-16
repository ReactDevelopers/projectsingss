<template>
	<license-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import licenseForm from './form/License';
	import {create} from '@/api/license';
export default {
    name: 'license-add-page',
    components:{
       licenseForm
    },
    data: function () {

        return {
            formName: 'license_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/license', () => {
                    this.$message.success('License has been updated.');
                })
            }
        }

}
</script>
