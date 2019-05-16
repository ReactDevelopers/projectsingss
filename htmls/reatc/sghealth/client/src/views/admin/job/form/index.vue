<template>
	 <el-form  auto-complete="on" label-position="top">
	 	 <lq-el-select 
            id="institute_id"
            label="Institution"
            :request="getInstituteList"
            :input-width="50"
            :filterable="true"
            :remote="true"
            remote-response-path="data.data"
            @change="updateBranchList"
            :options="$helper.getProp(formValues, 'institute', [])"
	        />
	   <lq-el-select 
            id="branch_id"
            label="Branch"
            :filterable="true"  
            :options="branchOptions"
        />
	    <lq-el-input id="title" label="Job Title" />
	    <lq-el-input id="description" label="Job Description" type="textarea" />
	    <lq-el-input id="cost" label="Cost" />
        <el-button  type="primary" @click="addNewTiming" icon="el-icon-plus" circle></el-button>
        <el-row v-for="(timing, index) in getElement('assignment_timings', {})" :key="`assignment_timing${index}`">
            <el-col :span="9">
                <lq-el-date-picker :id="`assignment_timings.${index}.date`" label="Select Date" value-format="yyyy-MM-dd" format="yyyy-MM-dd" />
            </el-col>
            <el-col :span="9">
                <lq-el-time-picker :id="`assignment_timings.${index}.times`" :is-range="true" label="Select Time" value-format="HH:mm:00" format="hh:mm A"/>
            </el-col>
            <el-col :span="6">
                <el-button type="danger" @click="remove(`assignment_timings.${index}`)" icon="el-icon-delete" circle></el-button>
            </el-col>
        </el-row>

	    <el-form-item>
			<lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
		</el-form-item>
	 </el-form>
</template>
<script type="text/javascript">
	import {lqForm} from 'vuex-lq-form';
	import {list as instituteListApi} from '@/api/institute';
    import {list as branchListApi} from '@/api/branch';

	export default {
		name: 'job-form',
        mixins:[lqForm],
        computed : {
            /**
             * Taking branches from the selected institutes.
             */
            branchOptions: function () {

                const institutes =  this.$helper.getProp(this.$store.state, ['form', this.formName, 'fields', 'institute_id', 'selected'], []);
                let branches = [];

                institutes ? institutes.map((institue) => {
                    
                    institue.branches.map((branch) => {
                        branches.push(branch)
                    })
                }) : null;

                return branches.length ? branches : null;
            },
        },
		methods:{

			/**
             * To get the institute list from server.
             */
            getInstituteList: function(query) {
                
                return instituteListApi({search: query})
            },

            /**
             * To get the branch list from server.
             */
            getBranchList: function(query) {
                if(this.formValues.institute_id ) {
                    return branchListApi({search: query, institute_id: this.formValues.institute_id});
                }
                return undefined;               
            },
            /**
             * update branch fields
             */
            updateBranchList: function(data) {

                this.$lqForm.setElementVal(this.formName, 'branch_id', null)
                this.$lqForm.setElementVal(this.formName, 'branch', [])
                    
                this.$refs.branchElement ?  this.$refs.branchElement.clearRemoteOptions() : null;
            },

            addNewTiming:function(){
                
                const value = this.$helper.getProp(this.formValues, 'assignment_timings',[])
                
                if(value.length < 50){
                    this.push('assignment_timings', {})

                    return 
                }

                this.$message.error('You can not select more than 50 rows')
            }
		}
	}
</script>