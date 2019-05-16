<template>
    <lq-el-tabs name="profile" active-tab="personal_info">
         <el-tab-pane label="Personal Info" name="personal_info">
            <personal-info :form-name="formName" :request="updateApi" @submited-success="success" />
         </el-tab-pane>
         <el-tab-pane label="Change Password" name="change_pass">
            <reset-password-form :form-name="change_pass" :request="resetPassword" @submited-success="successResetPassword"/>
         </el-tab-pane>
         <el-tab-pane label="Certificates" name="certs">
            <!-- <permission-list /> -->
            <user-certificates-form :form-name="certificate_form" :user-id="$route.params.id" />
         </el-tab-pane>
    </lq-el-tabs>
</template>
<script>
    /***
     * import components required
     */
    import personalInfo from './form';
    import resetPasswordForm from './form/ChangePassword';
    import UserCertificatesForm from './form/UserCertificatesForm';
    
    /***
     * import api's required
     */
    import {get as getUserApi,update,resetPassword as resetPasswordApi} from '@/api/users';

export default {
    name: 'user_detail_page',
    components:{
        personalInfo,
        resetPasswordForm,
        UserCertificatesForm
    },
    data: function () {

        return {
            formName: 'personal_info',
            change_pass:'change_pass',
            certificate_form: 'user_certificates',
            user: null,

            
        }
    },
    created(){
        getUserApi(this.$route.params.id).then((response) => {
            let user = response.data.user;
            user.service_ids = user.services.map(function(v){
                return v.id;
            });
            user.branch_ids = user.can_work_at.map(function(v){
                return v.id;
            });

            user.institute_ids = user.institute.map(function(v){
                return v.id;
            });

            this.user = user;
            this.$lqForm.initializeValues(this.formName, user);            
            const certificates = {certificates: user.certificates};
            this.$lqForm.initializeValues(this.certificate_form, certificates);
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/users', () => {
                    this.$message.success('User has been updated successfully.');
                })
            },
            successResetPassword: function (resposne) {
                this.$router.push('/users', () => {
                    this.$message.success('Password has been updated successfully.');
                })
            },
            resetPassword :function(data){
                return resetPasswordApi(this.$route.params.id,data)
            }
            
        }

}
</script>
