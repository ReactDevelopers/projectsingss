<template>
	<notification-template-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import notificationTemplateForm from './form/notification-form';
    import {get as getNotificationTemplate, create} from '@/api/notificationTemplate';

    export default{
        name : 'notification-template-add-page',
        components:{
            notificationTemplateForm
        },
        data: function () {

            return {
                formName: 'notification_template_form'
            }
        },
        methods : {
            createApi:function(data){
                return create(data);
            },
            success : function(response){
                this.$router.push('/config', () => {
                    this.$message.success('Template has been added.');
                })
            }
        }
    }

</script>