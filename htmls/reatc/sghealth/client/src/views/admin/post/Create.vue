<template>
	<post-form :form-name="formName" :request="createApi" @submited-success="success" />
</template>
<script>
    import postForm from './form/post';
	import {create} from '@/api/post';
export default {
    name: 'post_add_page',
    components:{
        postForm
    },
    data: function () {

        return {
            formName: 'post_form'
        }
    },
    methods: {

            createApi: function (data) {
                return create( data);
            },
            success: function (resposne) {
                this.$router.push('/config', () => {
                    this.$message.success('Page has been added.');
                })
            }
        }

}
</script>
