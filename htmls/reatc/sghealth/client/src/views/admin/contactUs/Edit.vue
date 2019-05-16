<template>
	<contact-us-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import contactUsForm from './form';
	import {get as getContactUsApi,update} from '@/api/contactUs';
export default {
    name: 'contact_us_edit_page',
    components:{
        contactUsForm
    },
    data: function () {

        return {
            formName: 'contact_us_form'
        }
    },
    created(){
        getContactUsApi(this.$route.params.id).then((response) => {
            let contact = response.data.contact;
            this.$lqForm.initializeValues(this.formName, contact)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/contact-us', () => {
                    this.$message.success('Reply has been sent successfully.');
                })
            }
        }

}
</script>
