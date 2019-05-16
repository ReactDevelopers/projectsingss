<template>
    <lq-el-table :name="tableName" :request="request" >
        
        <lq-el-table-index />
        <el-table-column  v-if="shownColumns.name" prop="name" label="Name" sortable="custom"  />
        <el-table-column  v-if="shownColumns.email" prop="email" label="Email" sortable="custom" />
        <el-table-column  v-if="shownColumns.branch_name"  prop="branch.name" label="Branch Name" :sortable="false" />
        <el-table-column  v-if="shownColumns.institute_name" label="Institute Name"  >
            <template slot-scope="scope">
                <el-tag type="success" min="mini" v-for="(institute) in $helper.getProp(scope, 'row.institute', [])" 
                :key="`${$helper.getProp(scope, 'row.id', null)}.institute.${institute.id}`" :title="institute.name">
                    {{institute.name}}
                </el-tag>
            </template>
        </el-table-column>
        <el-table-column  v-if="shownColumns.profession_name" prop="profession.name" label="Profession Name" :sortable="false" />
        <el-table-column  v-if="shownColumns.service_name" label="Services">
            <template slot-scope="scope">
                <el-tag type="success" min="mini" v-for="(service) in $helper.getProp(scope, 'row.services', [])" 
                :key="`${$helper.getProp(scope, 'row.id', null)}.service.${service.id}`" :title="service.name">
                    {{service.name}}
                </el-tag>
            </template>
        </el-table-column>
        <el-table-column  v-if="shownColumns.mobile_no" prop="mobile_no" label="Mobile Number" sortable="custom" width="130"/>
        <lq-table-action-column 
            v-if="shownColumns.action" 
            viewRoute="users/:id/show" 
            :forTrashed="forTrashed" 
            :deleteRequest="deleteUser" 
            :confirmMessage="deleteMessage" 
            :restoreRequest="restoreUser" 
            :restoreMessage="restoreMessage" 
            editPermission="users.show" 
            deletePermission="users.destroy" 
            restorePermission="users.restore"
        />
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteUser as deleteUserApi,restoreUser as restoreUserApi} from '@/api/users';


export default {
    name: 'user-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        },
        shownColumns : {
            type : Object,
            default : function() {return {} }
        }
    },
    data: function () {

        return {
            tableName: `users${this.forTrashed? '_0': '_1'}`,
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this user?' : 'Are you sure you want to  delete this user?',
            restoreMessage : 'Are you sure you wan to restore this user ?',      
        }
    },
    methods: {
        request: function (data) {
            if(this.forTrashed){
                data.deleted_at = 1;
            }
            return listApi(data)
        },
        /* deleteUser:function(data){
            let formData = {}
            let message = ''
            if(this.forTrashed){
                message = "Are you sure you want to permanently delete this user?"
            }else{
                message = "Are you sure you want to  delete this user?"
            }
            
            this.$confirm(message, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                let formData = {}
                deleteUserApi(data.id,formData).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('users_0')
                    this.$lqTable.refresh('users_1')
                });
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Delete canceled'
                });       
            });
        }, */
        restoreUser : function(data){
                                
            restoreUserApi(data.id).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('users_0')
                this.$lqTable.refresh('users_1')
            });
            
        },
        deleteUser : function(data){
            let formData = {}
            deleteUserApi(data.id,formData).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('users_0')
                this.$lqTable.refresh('users_1')
            });
        }
    }
    
}
</script>

