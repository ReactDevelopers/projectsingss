<template>
    <banner-form :form-name="formName" :request="request" @submited-success="success" />
</template>
<script>
    import bannerForm from './form/BannerForm';
    import {create as createApi} from '@/api/banner';

    export default {
        name: 'banner-create-page',
        components: {
            bannerForm
        },
        data: function () {

            return {
                formName: 'banner_form_create'
            }
        },
        methods: {

            request: function (data) {
                return createApi( data);
            },
            success: function (resposne) {
                this.$router.push('/banner', () => {

                    this.$message.success('Banner has been Created.');
                })
            }
        }
    }
</script>
