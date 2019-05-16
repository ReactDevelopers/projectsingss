<template>
    <banner-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script>
    import bannerForm from './form/BannerForm';
    
    import {get as getBannerApi, update} from '@/api/banner';

    export default {
        name: 'banner-edit-page',
        components: {
            bannerForm
        },
        data: function () {

            return {
                formName: 'banner_form'
            }
        },
        created() {

            getBannerApi(this.$route.params.id).then((response) => {
                const formData = {
                    banner_category_id:  response.data.banner.banner_category_id,
                    image:  response.data.banner.image,
                }

                this.$lqForm.initializeValues(this.formName, formData)
            })
        },
        methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                
                this.$router.push('/banner', () => {

                    this.$message.success('Banner has been updated.');
                })
            }
        }
    }
</script>
