<template>
    <forget-password-form
        form-name="forget_password"
        @submited-success="submitted"
        :request="request"
    />
</template>
<script>
import ForgetPasswordForm from './form/ForgetPasswordForm';
import { forgetPassword } from '@/api/auth'

export default {
    name: 'forget-password-page',
    components: {
        ForgetPasswordForm
    },
    methods: {

        submitted: function (resposne){

            this.$router.push('/reset-password');
        }
    },
    data: function () {

        return {
            request: null,
        }
    },
    created() {

        this.request = forgetPassword;
    }
}
</script>

