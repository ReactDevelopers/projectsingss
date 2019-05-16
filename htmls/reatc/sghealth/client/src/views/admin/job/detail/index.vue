<template>
    <div border="solid">
        
        <el-row  >
            <el-col :span="10" align="">
                <h3>Title - {{$helper.getProp(jobData ,'title' ,'-')}}</h3>
                <p>Description - {{$helper.getProp(jobData ,'description' ,'-')}}</p>
                <h3>Institute - {{$helper.getProp(jobData ,'institute.name' ,'-')}}</h3>
                <p>Cost - S${{$helper.getProp(jobData ,'cost' ,'-')}}</p>
            </el-col>
            <el-col :span="14" align="center">
                <el-row>
                    <h3>Job Duration</h3>
                    <el-col :span="12"  v-for="(job,index) in $helper.getProp(jobData ,'assignment_timings',{}) " :key="`job_timing${index}`">
                        <el-tag size="default"  >
                            Date : {{job.date}}
                            Time : {{job.start_time}} - {{job.end_time}}
                        </el-tag>
                    </el-col>
                </el-row>
            </el-col>
        </el-row>
        <el-card class="box-card" v-if="$root.can('assignment-application.show')">
            <lq-el-table :name="tableName" :request="request">
                <lq-el-table-index />
                
                <el-table-column  prop="user.name" label="Name"  />
                <el-table-column  prop="user.email" label="Email"  />
                <el-table-column  prop="user.profession.name" label="Profession"  />
                <el-table-column  prop="status" label="Status"  />
                
                <el-table-column label="Action">
                    <template slot="header">
                        <lq-table-form>
                            <lq-el-input id="search" placeholder="Search" :inside-form-element="false" size="mini" />
                        </lq-table-form>
                    </template>
                    <template slot-scope="scope">
                        <el-button
                            v-if="$root.can('assignment-application.update') && scope.row.status !== 'Rejected'"
                            @click="changeStatus(scope.row,'Rejected')"
                            icon="el-icon-error" 
                            type="danger"
                            :circle="true"/>
                        <el-button
                            v-if="$root.can('assignment-application.update') && scope.row.status !== 'Approved'"
                            @click="changeStatus(scope.row,'Approved')"
                            icon="el-icon-success" 
                            type="success"
                            :circle="true"/>
                    </template>
                </el-table-column>
                
            </lq-el-table>
        </el-card>

    </div>
</template>
<script>
import {get as getJobApi,getAllApplication,changeApplicationStatus} from '@/api/job';

export default {
    name: 'job_view_page',
    components : {},
    data(){
        return {
            tableName : 'job_user_list',
            dialogVisible : false,
            jobData : undefined
        }
    },
    created(){
        getJobApi(this.$route.params.id).then((response) => {
            let job = response.data.assignment;
            this.jobData = job
        })
    },
    methods : {
        request:function(data){
            data.assignment_id  = this.$route.params.id;
            return getAllApplication(data)
        },
        changeStatus : function(data,status){
            var confirmMessage = ''
            if(status === 'Approved'){
                confirmMessage = 'Are you sure ? You want to approve this request.'
            }else if(status === 'Rejected'){
                confirmMessage = 'Are you sure ? You want to reject this request.'
            }
            this.$confirm(confirmMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                changeApplicationStatus(data.id,{'status':status}).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('job_user_list')
                });
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Delete canceled'
                });       
            });
        }
       
    },
    
    
}
</script>
