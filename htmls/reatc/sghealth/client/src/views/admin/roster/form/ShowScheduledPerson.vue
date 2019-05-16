<template>
	<div>
		<el-tag
			class="grey-bg c-white-text"
		  v-for="workSchedule in workSchedules"
		  :key="`workScheduled_user_${workSchedule.id}`"
		  closable
		  :title="` Time: ${timeFormat(workSchedule.start_time)} - ${timeFormat(workSchedule.end_time)}`"
		  @close="deleteSchedule(workSchedule)"
		  type="success">
		  {{workSchedule.user.name}}
		</el-tag>
		<div v-if="autoWorkSchedules.length">
			<br />
			<el-tag
			class="grey-bg c-white-text"
			v-for="workSchedule in autoWorkSchedules"
			:key="`work_auto_Scheduled_user_${workSchedule.id}`"
			closable
			@close="deleteAutoSchedule(workSchedule)"
			type="info">
			{{workSchedule.user.name}}
			</el-tag>
		</div>
	</div>
</template>
<script type="text/javascript">
	import {destroy as destroyScheduleApi, destroyAutoSchedule} from '@/api/roster';
	import moment from 'moment';

	export default {
		name: 'show-scheduled-person',
		props: {
			workSchedules: Array,
			autoWorkSchedules: Array,
		},

		methods: {
			
			deleteSchedule: function (workSchedule) {
				
				this.$confirm('This will permanently delete. Continue?', 'Warning', {
		          confirmButtonText: 'OK',
		          cancelButtonText: 'Cancel',
		          type: 'warning'
		          
		        }).then(() => {
		        	
		        	const loading = this.$loading({
			          lock: true,
			          text: 'Deleting...',
			        });

		        	destroyScheduleApi(workSchedule.id)
						.then(() => {
							
							this.$emit('deletedSchedule', workSchedule);
							loading.close();

						}).catch(() => {

							loading.close()
						})
		        })
				
			},

			timeFormat: function (time) {
				return moment('2019-01-01 '+time).format('hh:mm A');
			},
			deleteAutoSchedule: function (schedule) {
				
				//destroyAutoSchedule
				this.$confirm('This will permanently delete. Continue?', 'Warning', {
		          confirmButtonText: 'OK',
		          cancelButtonText: 'Cancel',
		          type: 'warning'
		          
		        }).then(() => {
		        	
		        	const loading = this.$loading({
			          lock: true,
			          text: 'Deleting...',
			        });

		        	destroyAutoSchedule(schedule.id)
						.then(() => {
							
							this.$emit('deleted-auto-schedule', schedule);
							loading.close();

						}).catch(() => {

							loading.close()
						})
		        })
			},
		}
	}
</script>