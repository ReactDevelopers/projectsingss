<template>
	<div class="dashboard-container">
		<el-row :gutter="40" class="panel-group">
			<el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
				<div class="card-panel">
					<div class="card-panel-icon-wrapper icon-people">
						<h1>{{dashborad.profession}}</h1>
					</div>
					<div class="card-panel-description">
						<div class="card-panel-text">Professional</div>
					</div>
				</div>
			</el-col> 
			<el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
				<div class="card-panel">
					<div class="card-panel-icon-wrapper icon-people">
						<h1>{{dashborad.institutes}}</h1>
					</div>
					<div class="card-panel-description">
						<div class="card-panel-text">Total Institutes</div>
						
						<!-- <count-to :start-val="0" :end-val="102400" :duration="2600" class="card-panel-num"/> -->
					</div>
				</div>
			</el-col>  
			
			<el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
				<div class="card-panel">
					<div class="card-panel-icon-wrapper icon-people">
						<h1>{{dashborad.events}}</h1>
					</div>
					<div class="card-panel-description">
						<div class="card-panel-text">Total Events</div>
						
					</div>
				</div>
			</el-col>  
			<el-col :xs="12" :sm="12" :lg="6" class="card-panel-col">
				<div class="card-panel">
					<div class="card-panel-icon-wrapper icon-people">
						<h1>{{dashborad.jobs}}</h1>
					</div>
					<div class="card-panel-description">
						<div class="card-panel-text">Total Jobs</div>
						
					</div>
				</div>
			</el-col>    
		</el-row>
	</div>
</template>

<script>
import { mapGetters } from 'vuex'
import {profile} from '@/api/auth';
import {detail as getDashboardDetail} from '@/api/dashboard';

export default {
  name: 'Dashboard',
	computed: {
		...mapGetters([
			'authProfile',
		])
	},
	data(){
		return {
			dashborad : {}
		}
	},
	created(){
		getDashboardDetail().then((response) => {
			this.dashborad = response.data
		})
	}
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.dashboard {
  &-container {
	margin: 30px;
  }
  &-text {
	font-size: 30px;
	line-height: 46px;
  }
}
</style>
<style rel="stylesheet/scss" lang="scss" scoped>
.panel-group {
  margin-top: 18px;
  .card-panel-col{
	margin-bottom: 32px;
  }
  .card-panel {
	height: 108px;
	cursor: pointer;
	font-size: 12px;
	position: relative;
	overflow: hidden;
	color: #666;
	background: #fff;
	box-shadow: 4px 4px 40px rgba(0, 0, 0, .05);
	border-color: rgba(0, 0, 0, .05);
	&:hover {
	  .card-panel-icon-wrapper {
		color: #fff;
	  }
	  .icon-people {
		 background: #40c9c6;
	  }
	  .icon-message {
		background: #36a3f7;
	  }
	  .icon-money {
		background: #f4516c;
	  }
	  .icon-shopping {
		background: #34bfa3
	  }
	}
	.icon-people {
	  color: #40c9c6;
	}
	.icon-message {
	  color: #36a3f7;
	}
	.icon-money {
	  color: #f4516c;
	}
	.icon-shopping {
	  color: #34bfa3
	}
	.card-panel-icon-wrapper {
	  float: left;
	  margin: 14px 0 0 14px;
	  padding: 16px;
	  transition: all 0.38s ease-out;
	  border-radius: 6px;
	}
	.card-panel-icon {
	  float: left;
	  font-size: 48px;
	}
	.card-panel-description {
	  float: right;
	  font-weight: bold;
	  margin: 26px;
	  margin-left: 0px;
	  .card-panel-text {
		line-height: 18px;
		color: rgba(0, 0, 0, 0.45);
		font-size: 16px;
		margin-bottom: 12px;
	  }
	  .card-panel-num {
		font-size: 20px;
	  }
	}
  }
}
</style>