<template>
    <div class="event-container">
        <lq-el-table :name="tableName" :request="request">
            <lq-el-table-index />
            
            <el-table-column  prop="name" label="Name"  />
            <el-table-column  prop="email" label="Email"  />
            <el-table-column  prop="attendance" label="Attendance"   />
            <el-table-column  prop="member_status" label="Status"   />
            
            <el-table-column label="Action">
                <template slot="header">
                    <lq-table-form>
                        <lq-el-input id="search" placeholder="Search" :inside-form-element="false" size="mini" />
                    </lq-table-form>
                </template>
                <template slot-scope="scope" v-if="$root.can('event-member-change-status')">
                    <el-button
                    v-if="scope.row.member_status !== 'reject'"
                        @click="changeStatus(scope.row,'reject')"
                        icon="el-icon-error" 
                        type="danger"
                        :circle="true"/>
                    <el-button
                        v-if="scope.row.member_status !== 'confirm'"
                        @click="changeStatus(scope.row,'confirm')"
                        icon="el-icon-success" 
                        type="success"
                        :circle="true"/>
                </template>
            </el-table-column>
            
        </lq-el-table>
    </div>
</template>
<script>
import {list as listApi,getAllMembers,changeStatus as changeStatusApi} from '@/api/event';

export default {
    name: 'event-member-list',
    props: {
        status: {
            type:  String,
            default: null
        }
    },
    data: function () {
        return {
            tableName: `event_member_${this.status}`,
        }
    },
    methods: {
        request: function (data) {
            if(this.status){
                data.status = this.status;
            }
            return getAllMembers(this.$route.params.id,data)
        },
        changeStatus : function(data,status){
            var confirmMessage = ''
            if(status === 'confirm'){
                confirmMessage = 'Are you sure ? You want to approve this request.'
            }else if(status === 'reject'){
                confirmMessage = 'Are you sure ? You want to reject this request.'
            }
            this.$confirm(confirmMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                let formData = {'status':status}
                changeStatusApi(data.application_event_id,formData).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('event_member_confirm')
                    this.$lqTable.refresh('event_member_awaiting-payment')
                    this.$lqTable.refresh('event_member_waiting-list')
                    this.$lqTable.refresh('event_member_reject')
                });
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Delete canceled'
                });       
            });
        }
    }
}
</script>