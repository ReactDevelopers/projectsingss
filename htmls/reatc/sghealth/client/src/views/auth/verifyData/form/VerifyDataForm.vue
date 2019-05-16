<template>
    <el-form ref="loginForm" auto-complete="on">
        <el-row :style="{marginBottom: '10px', height: '100px'}">
             <el-col :span="24" align="center">
                <img :src="`${$root.storage_url}${$helper.getProp(configs,'LOGO_HIGHLIGHT.data.path')}`" v-if="$helper.getProp(configs,'LOGO_HIGHLIGHT.data.path')" height="100" />
             </el-col>
         </el-row>
    </el-form>
</template>
<script>

    import { verifyToken } from '@/api/auth'
    export default {
        name: 'verify-data-form',
        created () {

            if(!this.$route.query.token) {

                this.$router.push('/', ()=> {
                    this.$message.error('Token not found.');
                });
            }
            else {

               const loading = this.$loading({
                    lock: true,
                    text: 'Verifying...',
                });         

                verifyToken({
                    token: this.$route.query.token
                }).then((response) => {

                    loading.close();
                    this.$router.push('/', ()=> {
                        this.$message.success('Email/Mobile no. has been verified successfully.');
                    });                    

                }).catch(() => {

                    loading.close();
                    this.$router.push('/', ()=> {
                        this.$message.error('Invalid Token/OTP');
                    });                    
                   
                })
            }            
        }
    }
</script>
