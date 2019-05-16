<template>
	<job-form formName="job" :request="createApi" @submited-success="success" />
</template>
<script type="text/javascript">
	
	import JobForm from './form';
	import {create} from '@/api/job'

	export default {
		name:'job-create-page',
		components: { JobForm },

		methods: {

	        createApi: function (data) {

	            return create(data);
	        },
	        success: function (resposne) {

	            this.$router.push('/job', () => {

	                this.$message.success('Job has been Created.');
	            })
	        }
	    }
	}
</script>