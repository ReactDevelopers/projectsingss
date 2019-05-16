<template>
    
    <el-form ref="loginForm" autocomplete="off">   
        <el-card shadow="always">
            <h3 style="text-align:center">Register As Manager</h3>    

            <lq-el-input id="name" placeholder="Name" :rules="rules.name" autocomplete="off"/>        
            <lq-el-input id="password" type="password" :rules="rules.password" placeholder="Password" autocomplete="off"/>        
            <el-row align="centre" justify="end">
                <el-col :span="12" >
                    <lq-el-submit label="Register" @click="submit" />
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
                password: {
                    presence: {
                        allowEmpty: false,
                        message: 'Password field is required'
                    }
                },
                name: {
                    presence: {
                        allowEmpty: false,
                        message: 'Name field is required'
                    }
                }
            }
        }
    }    
}
</script>
<style lang="sass">
    
</style>

