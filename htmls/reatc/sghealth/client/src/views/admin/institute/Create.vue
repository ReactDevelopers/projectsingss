<template>
    <institute-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
import instituteForm from './form/institute-form';
import { create } from '@/api/institute';

export default {

    name: 'institute-create-page',
    components:{
        instituteForm
    },
    data: function () {

        return {
            formName: 'institute_form'
        }
    },
    methods: {

        createApi: function (data) {

            return create(data);
        },
        success: function (resposne) {

            this.$router.push('/institute', () => {

                this.$message.success('Institute has been Created.');
            })
        }
    }
}
</script>

<style>

</style>
