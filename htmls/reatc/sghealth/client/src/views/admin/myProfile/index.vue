<template>
    <my-profile :form-name="formName" ref="pf" :request="request" @submited-success="success" />
</template>
<script>

import myProfile from './form/MyProfileForm';
import {update as updateApi} from '@/api/myProfile';

export default {
    name: 'my-profile-page',
    components:{
        myProfile
    },
    computed: {

        profile: function (){
            return this.$helper.getProp(this.$store.state, 'profile.profile', {});
        }
    },
    data: function () {
        return  {
            formName: 'my_profile',
            excludeInput: ['service_ids',]
        }
    },
    created() {

        this.initializeFormValues();
    },

    methods: {

        request: function (data) {
            
            return updateApi(data)
        },

        initializeFormValues: function() {
            const formData = {
                
                name: this.profile.name,
                email: this.profile.email,
                mobile_no: this.profile.mobile_no,
                profile_image: {
                    file: null,
                    path: this.profile.profile_image.path,
                    id: this.profile.profile_image.id,
                }
            }
            this.$lqForm.initializeValues(this.formName, formData)
        },
        success: function (resposne) {
            this.$lqForm.setElementVal(this.formName, 'token', null);
            const isMobileChange = this.$helper.getProp(resposne, 'data.isMobileChange', false);
            
            if( isMobileChange ) {

                this.$prompt('Please enter OTP.', 'Verify Mobile no.', {
                    confirmButtonText: 'Verify',
                    cancelButtonText: 'Cancel',
                    beforeClose: (action, instance, done) => {
                
                        var token = instance.getInputElement().value;
                        let requesting = false;

                        if(action === 'confirm') {

                            this.$lqForm.setElementVal(this.formName, 'token', token);
                            this.$lqForm.removeError(this.formName, 'token');
                            let res = this.$refs.pf.submit(true);
                            
                            if(res) {
                                
                                if(requesting) {
                                    return;
                                }

                                instance.confirmButtonText = 'Requesting...';
                                requesting = true;
                                res.then((response) => {
                                    requesting = false;
                                    done();
                                    instance.confirmButtonText = 'Verify';
                                    this.$message.success('You profile has been updated.');

                                }).catch((res) => {

                                    requesting = false;
                                    const error_code = this.$helper.getProp(res, 'response.data.error_code');
                                    if(error_code === 'token_not_exist_or_may_be_expire') {
                                        
                                        this.$message.error('Invalid OTP')
                                        
                                    }
                                    else {

                                        this.$message.error('Invalid form data.');
                                        done();
                                    }

                                    instance.confirmButtonText = 'Verify';
                                })
                            }
                            else {
                                done();
                                instance.confirmButtonText = 'Verify';
                            }
                        }
                        else {

                            this.$lqForm.removeError(this.formName, 'token');
                            this.$lqForm.setElementVal(this.formName, 'token', null);
                            done();
                        }  
                                
                    }
                })
            }
            else {

                this.$message.success('You profile has been updated.');
            }
        }
    }
}
</script>

