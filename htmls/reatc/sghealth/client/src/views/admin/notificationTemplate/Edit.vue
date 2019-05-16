<template>
	<notification-template-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import notificationTemplateForm from './form/notification-form';
    import {get as getNotificationTemplate, update} from '@/api/notificationTemplate';

export default {
    name: 'notification-template-edit-page',
    components:{
        notificationTemplateForm
    },
    data: function () {

        return {
            formName: 'notification_template_form'
        }
    },
    created(){
        getNotificationTemplate(this.$route.params.id).then((response) => {
           
            this.$lqForm.initializeValues(this.formName, response.data.template)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods : {
        updateApi:function(data){
            return update(this.$route.params.id, data);
        },
        success : function(resposne){
            this.$router.push('/config', () => {
                this.$message.success('Template has been updated.');
            })
        }
    }

}
</script>
