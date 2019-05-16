<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column   label="Institue Name" sortable="custom" prop="institute.name"  />
            
        <!-- <el-table-column   label="Branch Name" sortable="custom"  >
            <template slot-scope="scope">
                
            </template>
        </el-table-column> -->
        <el-table-column  prop="title" label="Title" sortable="custom"  />
        <el-table-column  prop="description" label="Description" sortable="custom"  />
        <el-table-column  prop="cost" label="Cost" sortable="custom"  />
        
        <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                    v-if="$root.can('assignment.index')"
                    icon="el-icon-view" 
                    type="primary"
                    :circle="true"
                    @click="$router.push('job/:id/view'.replace(':id', $helper.getProp(scope, 'row.id', null)))"/>
                <el-button
                    v-if="$root.can('assignment.update')"
                    icon="el-icon-edit" 
                    type="primary"
                    :circle="true"
                    @click="$router.push('job/:id/edit'.replace(':id', $helper.getProp(scope, 'row.id', null)))"/>
                <el-button
                    v-if="$root.can('assignment.destroy')"
                    @click="deleteJobRequest(scope.row)"
                    icon="el-icon-delete" 
                    type="danger"
                    :circle="true"/>
            </template>
        </el-table-column>
        
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteJob as deleteJobApi} from '@/api/job';

export default {
    name: 'job-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName:'job',
            deleteMessage : 'Are you sure you want to permanently delete this job? ',
            
        }
    },
    methods: {
        /**
         * APi to get the Job list
         */
        request: function (data) {
            return listApi(data)
        },

        /**
         * APi to delete the Selected job.
         */
        deleteJobRequest : function(data){
            this.$confirm(this.deleteMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                let formData = {}
                deleteJobApi(data.id,formData).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('job')
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