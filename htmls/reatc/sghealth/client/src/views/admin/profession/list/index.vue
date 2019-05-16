<template>
    <el-table name="profession" 
        :data="data.filter(d => !search || d.name.toLowerCase().includes(search.toLowerCase()) || d.description.toLowerCase().includes(search.toLowerCase()) )"
        :row-class-name="tableRowClassName" >
 
        <el-table-column  prop="name" label="Name"  :sortable="true" />
        <el-table-column  prop="description" label="Description" :sortable="true"  />

    
        <el-table-column label="Action">
           <template slot="header" slot-scope="scope">
                <el-input
                v-model="search"
                size="mini"
                placeholder="Type to search"/>
            </template>
            <template slot-scope="scope">
                <el-button
                v-if="$root.can('retosre-profession') && scope.row.deleted_at"
                @click="restoreRecord(scope.row)"
                icon="el-icon-refresh" 
                type="success"
                :circle="true"/>
                <el-button
                v-else-if="$root.can('profession.update')"
                icon="el-icon-edit" 
                type="primary"
                :circle="true"
                @click="$router.push('profession/:id/edit'.replace(':id', $helper.getProp(scope, 'row.id', null)))"/>

                <el-button
                v-if="$root.can('profession.destroy')"
                @click="deleteRecord(scope.row)"
                icon="el-icon-delete" 
                type="danger"
                :circle="true"/>
            </template>
        </el-table-column>

        <!-- <lq-table-action-column viewRoute="profession/:id/edit" :forTrashed="forTrashed" :deleteRequest="deleteProfession" :confirmMessage="deleteMessage" :restoreRequest="restore" :restoreMessage="restoreMessage"/> -->
        
    </el-table>
</template>

<style>
  .el-table .warning-row {
    background: rgb(255, 189, 187);
  }

  .el-table .success-row {
    background: #f0f9eb;
  }
</style>

<script>
import {list as listApi,deleteProfession as deleteProfessionApi,restore as restoreProfessionApi} from '@/api/profession';

export default {
    name: 'certificate-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        },
        data : {
            type : Array,
            default : function(){return []}
        }
    },
    data: function () {

        return {
            
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this profession?' : 'Are you sure you want to  delete this profession?',
            restoreMessage : 'Are you sure you want to restore this profession ?',
            search: ''
        }
    },
    
    methods: {

        /**
         * To add a diffrent class for profession which has been soft deleted
         */
        tableRowClassName({row, rowIndex}) {
            if (row.deleted_at) {
                return 'warning-row';
            } 
        },

        /**
         * To Delete the Proferssion  
         */
        deleteRecord:function(data){

            var deleteMessage = data.deleted_at ? 'Are you sure you want to permanently delete this profession?' : 'Are you sure you want to  delete this profession?';

            this.$confirm(deleteMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                let formData = {}
                deleteProfessionApi(data.id,formData).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('profession_list')
                });
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Delete canceled'
                });       
            });
        },

        /**
         * To restore the deleted profession.
         */
        restoreRecord:function(data){
            
            this.$confirm(this.restoreMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                restoreProfessionApi(data.id).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('profession_list')
                });
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Restore canceled'
                });       
            });
        }
    }
}
</script>