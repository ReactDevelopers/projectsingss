<template>
	<profession-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import professionForm from './form/form';
	import {get as getProfessionApi,update} from '@/api/profession';
export default {
    name: 'profession_edit_page',
    components:{
        professionForm
    },
    data: function () {

        return {
            formName: 'profession_form'
        }
    },
    created(){
        getProfessionApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName, response.data.profession)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    beforeDestroy(){
        this.$lqTable.deletePagesData('profession_category_list')
        this.$lqTable.deletePagesData('profession_list')
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/profession', () => {
                    this.$message.success('Profession has been updated.');
                })
            }
        }

}
</script>
