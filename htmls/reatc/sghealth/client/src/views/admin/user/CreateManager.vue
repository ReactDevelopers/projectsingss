<template>
    <manager-create-form form-name="manager_create" :request="createApi" @submited-success="success" />
</template>
<script>

import ManagerCreateForm from './form/ManagerCreateForm'
import {createManager} from '@/api/users';


export default {
    name: 'Manager-create-page',
    components: {ManagerCreateForm},
    methods: {

        createApi: function (data) {
            data.role = 'manager'
            return createManager( data);
        },
        success: function (resposne) {
            this.$router.push('/users', () => {
                this.$message.success('Manager has been added.');
            })
        }
    }
}
</script>

