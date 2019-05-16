<template>
	<post-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import postForm from './form/post';
	import {get as getPostApi,update} from '@/api/post';
export default {
    name: 'post_edit_page',
    components:{
        postForm
    },
    data: function () {

        return {
            formName: 'post_form'
        }
    },
    created(){
        getPostApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName, response.data)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/config', () => {
                    this.$message.success('Page has been updated.');
                })
            }
        }

}
</script>
