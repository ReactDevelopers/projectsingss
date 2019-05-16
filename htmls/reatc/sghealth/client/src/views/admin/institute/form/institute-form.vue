<template>
	<el-form  auto-complete="off" label-width="300px" label-position="top">
		<el-row :gutter="5">
			<el-col :span="10" >
				<lq-el-select 
				id="institute_category_id" 
				label="Institute Category"
				:request="getInstituteCategory"
				:filterable="true"
				:remote="true"
				remote-response-path="data.data"
				/>
				<lq-el-input id="name" label="Institute Name" />
				<lq-el-input id="registration_no" label="Registration No" />
				
			</el-col>
			<el-col :span="8" :offset="6" >
				<lq-el-radio-group id="enable_roster"
                    :button="true"
                    label="Enable Roster?"
                    :options="[{value: 'Yes', label: 'Yes'}, {value: 'No', label: 'No'}]" 
                />
				<lq-el-image 
					id="logo" 
					label="Institute Logo" 
					:storage-url="$root.storage_url"
					:rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[200, 200]}}" 
					:thumbs="[{width: 200, height: 200}]"
					:update-original="true"
				/>		
					
			</el-col>
		</el-row>
			
		<el-row :gutter="10" class="branch-row" >
			<el-col :span="24">
				<el-col :span="24" >
					<h4>Branches
						<el-button type="primary"  icon="el-icon-plus" circle @click="push('branches', {})" ></el-button>	
					</h4>
				  	
				</el-col>
			</el-col>
			<el-col  :span="12" v-for="(branch, branch_index) in getElement(`branches`, {})" :key="`branch_row${branch_index}`" class="branch-container">
				<el-card shadow="always">
					<el-col :span="24" align="right">
						<el-button type="danger" @click="remove(`branches.${branch_index}`)" icon="el-icon-delete" circle></el-button>
					</el-col>
					<el-col :span="24">
						<el-row :gutter="10">
							<el-col :span="12">
								<lq-el-input :id="`branches.${branch_index}.branch_code`" label="Branch Code" />
							</el-col>
							<el-col :span="12">
								<lq-el-input :id="`branches.${branch_index}.name`" label="Branch Name" />
							</el-col>
						</el-row>
						<el-row>
							<el-col :span="24">
								<lq-el-input :id="`branches.${branch_index}.address`" label="Branch Address" />
							</el-col>
						</el-row>

						<el-row>
							<el-col :span="24">
								<lq-el-select  
									:multiple="true"
									:id="`branches.${branch_index}.service_ids`"
									label="Services List"
									:filterable="true"
									:multiple-limit="20"
									:options="branch.services"
									store-key="table.service_list_drop_down.data"
								/>
							</el-col>
						</el-row>
						<el-row :gutter="10">
							<el-col :span="12">
								<lq-el-time-picker  
									format="hh:mm A" 
									:is-range="true" 
									
									:id="`branches.${branch_index}.mon_fri_timing`" 
									label="Mon-Fri Timing" 
									value-format="HH:mm:00" />
							</el-col>
							<el-col :span="12">
								<lq-el-time-picker format="hh:mm A" :is-range="true" :id="`branches.${branch_index}.saturday_timing`" label="Saturday Timing" value-format="HH:mm:00" />
							</el-col>
						</el-row>
						<el-row :gutter="10"	>
							<el-col :span="12">
								<lq-el-time-picker format="hh:mm A" :is-range="true" :id="`branches.${branch_index}.sunday_timing`" label="Sunday Timing" value-format="HH:mm:00"  />
							</el-col>
							<el-col :span="12">
								<lq-el-time-picker format="hh:mm A" :is-range="true" :id="`branches.${branch_index}.ph_timing`" label="Public Holiday Timing" value-format="HH:mm:00"  />
							</el-col>
						</el-row>
					
					</el-col>
				</el-card>			
					
			</el-col>
		

		</el-row>
	 
		<el-form-item>
			<lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
		</el-form-item>
	</el-form>
</template>
<script>

import {lqForm} from 'vuex-lq-form';
import {list as instituteCategoryListApi} from '@/api/instituteCategory';
import {list as serviceListApi} from '@/api/service';

export default {
	name: 'edit-institute-form',
	mixins:[lqForm],
	data: function () {

		return {
			excludeInput: ['created_at', 'updated_at', 'id', 'branches.*.services', 'branches.*.updated_at']
		}
	},
	created() {
		/**
		 * To get the service list from server.
		 */
		this.$lqTable.fetchListData('service_list_drop_down', serviceListApi,{
                data_key: 'data.data',
            })
	},
	methods: {
		/**
		 * To get the service list from server.
		 */
		getServiceList: function(query) {

			return serviceListApi({search: query})
		},
		getInstituteCategory : function(query){
			return instituteCategoryListApi({search: query,page:'-1'})
		}
	}
}
</script>
<style>
.branch-row{
	padding: 20px;
}
.branch-row .el-date-editor.el-input, .el-date-editor.el-input__inner {
	max-width: 220px !important;
}
</style>