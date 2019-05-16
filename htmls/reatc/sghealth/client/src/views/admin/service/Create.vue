<template>
	<service-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import serviceForm from './form/Service';
	import {create} from '@/api/service';
export default {
    name: 'service_add_page',
    components:{
        serviceForm
    },
    data: function () {

        return {
            formName: 'service_form'
        }
    },
    methods: {

        createApi: function (data) {
            return create( data);
        },
        success: function (resposne) {
            this.$router.push('/service', () => {
                this.$message.success('Service has been added.');
            })
        }
    }

}
</script>
