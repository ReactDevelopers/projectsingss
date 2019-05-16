<template>
    <div>
        <el-row :gutter="12">
            <el-col :span="24">
                <register-form 
                    :form-name="formName" 
                    @submited-error="submitedError" 
                    @submited-success="submitedSuccess" 
                    :request="registerApi"
                    />
            </el-col>
            
        </el-row>
    </div>
</template>

<script>

import registerForm from './form/registerManager';
import  {createManager} from '@/api/registerManager';

export default {
    name: 'Login',
    components: {
        registerForm
    },
    data: function () {

        return {
        formName: 'login',
        loggedInUsers: [],
        showLogin: true
        }
    },
    created: function () {
    },
    methods: {

        registerApi: function(data){
            data.email = this.$route.params.email;
            data.role = 'event-manager'
            return createManager(data);
        },

        /**
         * When login Success then store token and refresh token in cookie.
         */
        submitedSuccess: function (response) {

            this.$message.success(response.message);
        },
    
    }
}
</script>

