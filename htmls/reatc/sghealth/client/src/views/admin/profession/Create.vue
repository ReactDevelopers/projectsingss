<template>
	<profession-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import professionForm from './form/form';
	import {create} from '@/api/profession';
export default {
    name: 'profession_add_page',
    components:{
        professionForm
    },
    data: function () {

        return {
            formName: 'profession_form'
        }
    },
    beforeDestroy(){
        this.$lqTable.deletePagesData('profession_category_list')
        this.$lqTable.deletePagesData('profession_list')
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/profession', () => {
                    this.$message.success('Profession has been added.');
                })
            }
        }

}
</script>
