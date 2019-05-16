<template>
    <reset-password-form
        form-name="reset_password_form"
        @submited-success="submitted"
        @submited-error="submittedError"
        :request="request"
        :fixed-data="fixedData"
    />

</template>
<script>
import ResetPasswordForm from './form/ResetPasswordForm';
import { resetPassword } from '@/api/auth'

export default {
    name: 'forget-password-page',
    components: {
        ResetPasswordForm
    },
    methods: {

        submittedError: function (error) {
            
            if(error.response && error.response.data) {
                
                if(error.response.data.error_code === 'token_not_exist_or_may_be_expire') {
                    this.$message.error('Token has been expired. Please try again.');
                    this.$router.push('/forget-password');
                }
            }
        },
        submitted: function (resposne){
            
            this.$message({
                message: 'Pasword has been changed successfully. Please try to login.',
                type: 'success'
            });
            this.$router.push('/');
        }
    },
    data: function () {

        return {
            request: null,
            fixedData: null,
        }
    },
    created() {

        this.fixedData = this.$route.query;
        this.request = resetPassword;
    }
}
</script>

