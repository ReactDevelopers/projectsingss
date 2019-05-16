<template>
	<faq-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import faqForm from './form/faq';
	import {get as getFaqApi,update} from '@/api/faq';
export default {
    name: 'faq_edit_page',
    components:{
        faqForm
    },
    data: function () {

        return {
            formName: 'faq_form'
        }
    },
    created(){
        getFaqApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName, response.data.faq)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/config', () => {
                    this.$message.success('Faq has been added.');
                })
            }
        }

}
</script>
