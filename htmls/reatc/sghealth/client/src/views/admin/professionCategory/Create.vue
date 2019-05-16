<template>
	<profession-category-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import professionCategoryForm from './form/form';
	import {create} from '@/api/professionCategory';
export default {
    name: 'profession_category_add_page',
    components:{
        professionCategoryForm
    },
    data: function () {

        return {
            formName: 'profession_category_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/profession-category', () => {
                    this.$message.success('Profession category has been added.');
                })
            }
        }

}
</script>
