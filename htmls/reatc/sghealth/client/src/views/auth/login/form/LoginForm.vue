<template>
    
    <el-form ref="loginForm"  auto-complete="off">       
        <el-card shadow="always">
            <user-input id="email" :rules="rules.email" placeholder="Email/Mobile No."/>
            <lq-el-input id="password" type="password" :rules="rules.password" placeholder="Password"/>        
            <el-row align="bottom" justify="end">
                <el-col :span="12" >
                    <lq-el-submit label="Login" @click="submit" />
                </el-col>
                <el-col :span="12" align="right">
                    <div :style="{paddingTop: '5px'}">
                        <router-link :to="{ path: '/forget-password'}" class="link">Forgot Password</router-link>
                    </div>
                </el-col>
            </el-row>
        </el-card>
    </el-form> 
       
</template>
<script>

import {lqForm} from 'vuex-lq-form';

export default {
    name: 'login-form',
    mixins:[lqForm],
    data: function(){

        return {
            rules: {
                email: {
                    presence: {
                        allowEmpty: false,
                        message: 'Email/Mobile no. field is required'
                    },
                    format:{
                      pattern: /(^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))|(^\+([0-9]){1,4}(\-)([0-9]){6,12}))/,
                      message: 'Please enter a valid email or mobile.'
                    }
                },
                password: {
                    presence: {
                        allowEmpty: false,
                        message: 'Password field is required'
                    }
                }
            }
        }
    }    
}
</script>
<style lang="sass">
    
</style>

