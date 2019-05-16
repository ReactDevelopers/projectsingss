<template>
	<job-detail formName="job" :request="createApi" @submited-success="success" />
</template>
<script type="text/javascript">
	
	import JobDetail from './detail';
	import {create} from '@/api/job'

	export default {
		name:'job-view-page',
		components: { JobDetail },

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