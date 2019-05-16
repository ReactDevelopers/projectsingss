<template>
    <permission-form :form-name="formName" :request="updateApi" @submited-success="success" />    
</template>
<script>
    import permissionForm from './form/PermissionForm';
    import {get as getPermissionApi, update} from '@/api/permission';

    export default {
        name: 'permission-edit-page',
        components: {
            permissionForm
        },
        data: function () {

            return {
                formName: 'permission'
            }
        },
        created() {

            getPermissionApi(this.$route.params.id).then((response) => {
                this.$lqForm.initializeValues(this.formName, response.data.permission)
            })
        },
        methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data);
            },
            success: function (resposne) {
                this.$router.push('/role', () => {

                    this.$message.success('Permission has been updated.');
                })
            }
        }
    }
</script>
