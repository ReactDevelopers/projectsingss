<template>    
    <el-form ref="loginForm" auto-complete="on">
         <el-card shadow="always">
            <lq-el-input id="token" :disabled="(getToken()? true: false)" :rules="rules.password" placeholder="OTP/Token"/>
            <lq-el-input id="password" type="password" :rules="rules.password" placeholder="Password"/>
            <lq-el-input id="password_confirmation" type="password" :rules="rules.password" placeholder="Confirm Password"/>
            <lq-el-submit label="Submit" @click="submit" />
         </el-card>
    </el-form>
</template>
<script>

import {lqForm} from 'vuex-lq-form';

export default {
    name: 'login-form',
    mixins:[ lqForm ],
    data: function(){

        return {
            rules: {
                password: {
                    // email: true,
                    presence: {
                        allowEmpty: false,
                        message: 'Required!'
                    }
                }
            }
        }
    },
    created: function () {
        const token = this.getToken();
        if(token) {
            this.$lqForm.setElementVal(this.formName, 'token', token);
        }
    },
    methods: {
        getToken: function () {

            return this.$helper.getProp(this.$route, 'query.token', null);
        }
    }
}
</script>