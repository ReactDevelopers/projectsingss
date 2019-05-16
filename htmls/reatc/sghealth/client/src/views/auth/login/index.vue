<template>
    <div>
      
      <el-row :gutter="12" v-if="loggedInUsers.length" :style="{marginBottom: '10px'}">
        
        <el-col :span="24">          
          <transition-group tag="div">
            <el-card  v-for="(user) in loggedInUsers" :class="{loggedOutUserList: (user.pivot.active !== 'Yes') }" :key="`${user.id}_logged_in_user`" :style="{marginBottom: '5px'}">
                <el-row>
                    <el-col :span="12" align="left">
                      <!-- <img :src="`${$root.storage_url}${user.profile_image.path}`"  :width="50" /> -->
                      <a @click="goLandingPage(user)">{{user.name}}</a>
                    </el-col>
                    <el-col :span="12" align="right">
                        <a v-if="user.pivot.active !== 'Yes'" >Logged Out | </a>
                        <a  @click="userRevoked(user)">Remove</a>
                    </el-col>
                </el-row>
            </el-card>
          </transition-group>
        </el-col>
        <el-col v-if="!showLogin" :span="24" align="right" :style="{marginTop: '10px'}">
            <a @click="displayLoginForm">Login with Different Account</a>
        </el-col>
      </el-row>

      <login-form 
        v-if="showLogin"
        :form-name="formName" 
        @submited-error="submitedError" 
        @submited-success="submitedSuccess" 
        :request="request"
      >    
      </login-form>
    </div>
</template>

<script>

import LoginForm from './form/LoginForm';
import {login as LoginApi, verificationLink, verifyToken, getDeviceLoginUser, deviceUserRevoked } from '@/api/auth'
import { setTokens } from '@/utils/auth';

export default {
  name: 'Login',
  components: {
    LoginForm
  },
  data: function () {

    return {
      formName: 'login',
      request: LoginApi,
      loggedInUsers: [],
      showLogin: true
    }
  },
  created: function () {

    getDeviceLoginUser().then((response) => {
        
        this.loggedInUsers = response.data.device_users
        
        if(this.loggedInUsers.length) {
            this.showLogin = false;
        }
    })

  },
  methods: {

    /**
     * To Remove the user for this device.
     */
    userRevoked: function (user) { 
      
      const loading = this.$loading({lock: true});
      deviceUserRevoked(user.id)
        .then((response) => {
            loading.close();
            //this.$message.success(response.message);

            this.loggedInUsers.map((u, index) => {
                
                if(u.id === user.id) {

                    this.$helper.deleteProp(this.loggedInUsers, (index).toString());
                    
                    this.$nextTick(function () {
                          if(this.loggedInUsers.length === 0) {
                            this.showLogin = true;
                          }
                    })
                }
            })
        }).catch(() => {

            loading.close();
        })
    },
    goLandingPage: function (user) {
      
      if(user.pivot.active === 'Yes') {

        let url = [ user.role.landing_page.replaceAll(/^\/|\/$/g, '') , 'u', user.pivot.login_index ].join('/').replaceAll(/^\/|\/$/g, '');
        
        const landing_uri = this.$helper.getProp(user, 'role.settings.landing_uri');
        if(landing_uri) {
            url = url+ '/'+landing_uri.replaceAll(/^\/|\/$/g, '');
        }
        window.location.href= url;
      }
      else {
                
        this.showLogin = true;
        this.$nextTick(() => {  
          this.$lqForm.setElementVal(this.formName, 'email', user.email);
        })
      }

    },

    logout: function ( user) {
      const url = [ user.role.landing_page.replaceAll(/^\/|\/$/g, '') , 'u', user.pivot.login_index ].join('/').replaceAll(/^\/|\/$/g, '');
      window.location.href= url + '/logout';
    },
    displayLoginForm: function () {

      this.showLogin = true
    },
    /**
     * When Form is not validated/
     */
    haveError: function () {},

    /**
     * When get error from the server.
     */
    submitedError: function (error) {
       
      const request_data = JSON.parse(error.config.data);

       if(error.response && error.response.data) {

          if(error.response.data.error_code === 'email_not_verified') {

               this.dataVerificationPrompt(request_data.email, 
                'Email Not Verified', 
                'Click on send button to get the verification link.',
                'Mail has been send on your email ('+request_data.email+').'
               )
          }
          else if(error.response.data.error_code === 'mobile_no_verified') {
            
            this.dataVerificationPrompt(request_data.email, 
              'Mobile Number Not Verified', 
              'Click on send button to get OTP.',
              'SMS has been send on Mobile ('+request_data.email+').'
            )
          }
       }
    },

    /**
     * When login Success then store token and refresh token in cookie.
     */
    submitedSuccess: function (response) {

        const {profile: {role}, device, token} = response.data;
        const landing_page  = new URL(role.landing_page);
        const pathname = [ landing_page.pathname , 'u', device.login_index ].join('/').replaceAll(/^\/|\/$/g, '');
        setTokens(token, '/'+ pathname.replaceAll(/^\/|\/$/g, ''))
        let url = [ role.landing_page.replaceAll(/^\/|\/$/g, '') , 'u', device.login_index ].join('/').replaceAll(/^\/|\/$/g, '');
        const landing_uri = this.$helper.getProp(role, 'settings.landing_uri');
        if(landing_uri) {
            url = url+ '/'+landing_uri.replaceAll(/^\/|\/$/g, '');
        }
        window.location.href = url;
    },
    /**
     * To display the Dataverification prompt.
     */
    dataVerificationPrompt: function (email, title, message, success_message) {
      
      this.$alert(message, title, {
          confirmButtonText: 'Send',
          showCancelButton: true,
          cancelButtonText: 'Cancel',
          beforeClose: (action, instance, done) => {
            
            if (action === 'confirm') {

              instance.confirmButtonLoading = true;
              instance.confirmButtonText = 'Loading...';
              verificationLink({email: email})
                .then(() => {
                  
                  instance.confirmButtonLoading = false;
                  instance.confirmButtonText = 'Send';
                  
                    done();                    
                    this.$message({
                      message: success_message,
                      type: 'sucess'
                    });
                })
                .catch(() => {

                    instance.confirmButtonLoading = false;
                    instance.confirmButtonText = 'Send';
                    done();
                })
            }
            else {
              done();
            }
          },
          callback:  (action) => {
              this.promptToVerifyToken();
          }
        });
    },
    
    /**
     * To enter the token.
     */
    promptToVerifyToken: function()  {
      

      this.$prompt('Please enter OTP/Token', 'Verify Email/Mobile', {
          confirmButtonText: 'OK',
          cancelButtonText: 'Cancel',
          beforeClose: (action, instance, done) => {
              var token = instance.getInputElement().value;

              if(action === 'confirm') {

                if(!token) {
                  this.$message.error('Please enter the token.');
                  return 
                }

                instance.confirmButtonLoading = true;
                instance.confirmButtonText = 'Loading...';
                verifyToken({token: token})
                  .then( (resposne) => {

                    instance.confirmButtonLoading = false;

                      done();
                      this.$message({
                        message: 'Verification has been completed. Please try to login again.',
                        type: 'sucess'
                      });

                  }).catch((error) => {
                      done();
                      instance.confirmButtonLoading = false;
                      this.$message.error(error.response.data.error);
                  })
              }
              else {
                done();
              }
          }
      })
    }
   
  }
}
</script>

<style>
  
  .loggedOutUserList {
    border: 0px;
  }

  .loggedOutUserList .el-card__body {
    background: #289b9c;
    color: #28bec0;
  }
</style>

