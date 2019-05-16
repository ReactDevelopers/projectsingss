<template>
	<institute-form :form-name="formName" :request="updateApi" @submited-success="success" />
</template>
<script type="text/javascript">
	import instituteForm from './form/institute-form';
	import {get as getInstituteApi,update} from '@/api/institute';


	export default {
		name: 'institute-edit-page',
		components:{
			instituteForm
		},
		data: function () {

            return {
                formName: 'institute_form'
            }
        },
        created(){
        	getInstituteApi(this.$route.params.id).then((response) => {
                const formData = {
                	name : response.data.institute.name,
                	registration_no : response.data.institute.registration_no,
                	institute_logo : response.data.institute.logo,
                	institute_category_id : response.data.institute.institute_category_id,
                    branches: response.data.institute.branches,
                    logo: response.data.institute.logo,
                    enable_roster: response.data.institute.enable_roster
                }

                this.$lqForm.initializeValues(this.formName, formData)
                this.$lqForm.setPermission(this.formName, response.current_permission)
            })
        },
        methods: {

            updateApi: function (data) {
                return update(this.$route.params.id, data).then((data) => {
                   
                });
            },
            success: function (resposne) {
                
                this.$router.push('/institute', () => {
                    this.$message.success('Institute has been updated.');
                })
                
            }
            
        }
	}
</script>