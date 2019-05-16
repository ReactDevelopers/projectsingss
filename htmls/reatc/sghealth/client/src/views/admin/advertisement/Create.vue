<template>
	<advertisement-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import advertisementForm from './form';
	import {create} from '@/api/advertisement';
export default {
    name: 'advertisement_add_page',
    components:{
        advertisementForm
    },
    data: function () {

        return {
            formName: 'advertisement_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/advertisement', () => {
                    this.$message.success('Advertisement has been added succefully.');
                })
            }
        }

}
</script>
