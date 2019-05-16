<template>
	<news-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import newsForm from './form';
	import {create} from '@/api/news';
export default {
    name: 'news_add_page',
    components:{
        newsForm
    },
    data: function () {

        return {
            formName: 'news_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/news', () => {
                    this.$message.success('News has been added succefully.');
                })
            }
        }

}
</script>
