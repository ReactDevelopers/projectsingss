<template>
    <div class="event-detail">
		<el-row>
			<el-col :span="24">
        		<event-detail :event-detail="eventData ? eventData : null"/>
			</el-col>
			<el-col :span="24">
		        
				<lq-el-tabs ref="event_members_tab" name="event_members" active-tab="confirm">
					<el-tab-pane label="Confirm" name="confirm">
						<member-list status="confirm" />
					</el-tab-pane>
					<el-tab-pane label="Awaiting Payment" name="awaiting-payment">
						<member-list  status="awaiting-payment" />
					</el-tab-pane>
					<el-tab-pane label="Waiting List" name="waiting-list">
						<member-list  status="waiting-list" />
					</el-tab-pane>
					<el-tab-pane label="Rejected" name="reject">
						<member-list  status="reject" />
					</el-tab-pane>
				</lq-el-tabs>
			</el-col>
		</el-row>
    </div>
</template>
<script>
    import {get as getEventDetail} from '@/api/event';
    import eventDetail from './detail/index';
    import memberList from './detail/memberList';


export default {
    name: 'event_view_page',
    components: {eventDetail,memberList},
    data : function(){
      return {
        eventData : undefined
      }
    },
    created(){
        getEventDetail(this.$route.params.id).then((response) => {
            this.eventData = response.data.event
        });
    },
}
</script>
<style>
  .el-carousel__item h3 {
    color: #475669;
    font-size: 18px;
    opacity: 0.75;
    line-height: 300px;
    margin: 0;
  }

  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }

  .el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
  }
</style>