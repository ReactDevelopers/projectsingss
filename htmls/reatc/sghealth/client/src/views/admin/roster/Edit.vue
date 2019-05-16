<template>
	<roster :default-institute="institute_id" :default-month="month" />
</template>
<script type="text/javascript">

	import roster from './form';
    import {list as instituteListApi, get as getInstituteApi, employeeList} from '@/api/institute';

	export default {
		name: 'create-roster-page',
		components:{
			roster,
        },
        
        data: function (){
			return {
				institute_id: null,
				month: null,
			}
		},
		created: function () {

            this.institute_id = parseInt(this.$route.params.institute_id);
            this.month = this.$route.params.month
		}
	}
</script>