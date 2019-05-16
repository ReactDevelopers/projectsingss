<template>
	<advertisement-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import advertisementForm from './form';
	import {get as getAdvertisementApi,update} from '@/api/advertisement';
export default {
    name: 'advertisement_edit_page',
    components:{
        advertisementForm
    },
    data: function () {

        return {
            formName: 'advertisement_form'
        }
    },
    created(){
        getAdvertisementApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName,response.data)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/advertisement', () => {
                    this.$message.success('Advertisement has been updated.');
                })
            }
        }

}
</script>
