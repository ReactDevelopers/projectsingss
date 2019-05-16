<template>
	<institute-category-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import instituteCategoryForm from './form/form';
	import {update,get as getInstituteCategory} from '@/api/instituteCategory';
export default {
    name: 'institute_category_edit_page',
    components:{
        instituteCategoryForm
    },
    data: function () {

        return {
            formName: 'institute_category_form'
        }
    },
    created(){
        getInstituteCategory(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName, response.data.institute_category)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/institute-category', () => {
                    this.$message.success('Institute Category has been updated.');
                })
            }
        }

}
</script>
