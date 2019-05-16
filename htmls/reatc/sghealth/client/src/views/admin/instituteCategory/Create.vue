<template>
	<institute-category-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import instituteCategoryForm from './form/form';
	import {create} from '@/api/instituteCategory';
export default {
    name: 'institute_category_add_page',
    components:{
        instituteCategoryForm
    },
    data: function () {

        return {
            formName: 'institute_category_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/institute-category', () => {
                    this.$message.success('Institute category has been updated.');
                })
            }
        }

}
</script>
