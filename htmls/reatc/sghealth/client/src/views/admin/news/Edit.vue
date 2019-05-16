<template>
	<news-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import newsForm from './form';
	import {get as getNewsApi,update} from '@/api/news';
export default {
    name: 'news_edit_page',
    components:{
        newsForm
    },
    data: function () {

        return {
            formName: 'news_form'
        }
    },
    created(){
        getNewsApi(this.$route.params.id).then((response) => {
            this.$lqForm.initializeValues(this.formName,response.data)
            this.$lqForm.setPermission(this.formName, response.current_permission)
        })
    },
    methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/news', () => {
                    this.$message.success('News has been updated.');
                })
            }
        }

}
</script>
