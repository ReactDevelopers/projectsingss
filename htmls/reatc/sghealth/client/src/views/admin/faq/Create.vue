<template>
	<faq-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import faqForm from './form/faq';
	import {create} from '@/api/faq';
export default {
    name: 'faq_add_page',
    components:{
        faqForm
    },
    data: function () {

        return {
            formName: 'faq_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/config', () => {
                    this.$message.success('Faq has been added.');
                })
            }
        }

}
</script>
