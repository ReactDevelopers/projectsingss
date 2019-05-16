<template>
    <freelancer-create-form form-name="freelancer_create" :request="createApi" @submited-success="success" />
</template>
<script>

import FreelancerCreateForm from './form/FreelancerCreateForm'
import {createFreelancer} from '@/api/users';


export default {
    name: 'employee-create-page',
    components: {FreelancerCreateForm},
    methods: {

        createApi: function (data) {
            data.role = 'freelancer'
            return createFreelancer( data);
        },
        success: function (resposne) {
            this.$router.push('/users', () => {
                this.$message.success('Freelancer has been added.');
            })
        }
    }
}
</script>

