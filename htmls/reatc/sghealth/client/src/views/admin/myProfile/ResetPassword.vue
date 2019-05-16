<template>
    <reset-password-form :form-name="formName" :request="request" @submited-success="success" />    
</template>
<script>

import ResetPasswordForm from './form/ResetPasswordForm';
import {resetPassword as resetPasswordApi} from '@/api/myProfile';

export default {
    name: 'reset-password-page',
    components:{
        ResetPasswordForm
    },
    data: function () {
        return  {
            formName: 'rseset_password_form'
        }
    },
    methods: {

        request: function (data) {
            
            return resetPasswordApi(data)
        },
        success : function(response){
                this.$lqForm.setElementVal(this.formName, 'old_password', null);
                this.$lqForm.setElementVal(this.formName, 'password', null);
                this.$lqForm.setElementVal(this.formName, 'confirm_password', null);
                this.$message.success('Password has been change successfully..');
        }
    }
}
</script>

