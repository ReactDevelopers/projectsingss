<template>
	<profession-category-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import professionCategoryForm from './form/form';
	import {get as getProfessionCategoryApi,update} from '@/api/professionCategory';
export default {
    name: 'profession_category_edit_page',
    components:{
        professionCategoryForm
    },
    data: function () {

        return {
            formName: 'profession_category_form'
        }
    },
    created(){
        getProfessionCategoryApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName, response.data.profession_category)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/profession-category', () => {
                    this.$message.success('Profession category has been updated.');
                })
            }
        }

}
</script>
