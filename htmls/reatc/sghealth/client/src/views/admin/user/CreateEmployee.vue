<template>
    <employee-create-form form-name="emp_create" :request="createApi" @submited-success="success" />
</template>
<script>

import EmployeeCreateForm from './form/EmployeeCreateForm'
import {createEmployee} from '@/api/users';


export default {
    name: 'employee-create-page',
    components: {EmployeeCreateForm},
    methods: {

        createApi: function (data) {
            data.role = 'employee'
            return createEmployee( data);
        },
        success: function (resposne) {
            this.$router.push('/users', () => {
                this.$message.success('Employee has been added.');
            })
        }
    }
}
</script>

