<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name" sortable="custom" />
        <el-table-column  prop="registration_no" label="Registration No" sortable="custom" />
        <el-table-column  prop="category.name" label="Institute Category" sortable="custom" />
        <el-table-column label="Branches">
            <template slot-scope="scope">
                <el-tag  type="success" size="small"  v-for="(branch) in $helper.getProp(scope, 'row.branches', [])" :key="`${scope.row.id}.branch.${branch.id}`" :title="branch.name" >{{branch.name ? branch.name : '-'}}</el-tag>
            </template>
        </el-table-column>
        <lq-table-action-column 
            viewRoute="institute/:id/edit" 
            :forTrashed="forTrashed" 
            :deleteRequest="deleteInstitute" 
            :confirmMessage="deleteMessage" 
            :restoreRequest="restoreInstitute" 
            :restoreMessage="restoreMessage" 
            editPermission="institute.store" 
            deletePermission="institute.destroy" 
            restorePermission="restore-institute"
        />

        <!-- <el-table-column label="Action" v-if="$root.can(['institute.destroy', 'institute.update'])">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>

            <template slot-scope="scope">
                <el-button
                v-if="$root.can('institute.update')"
                icon="el-icon-edit" 
                type="primary"
                :circle="true"
                @click="$router.push('institute/'+scope.row.id+'/edit')"/>
                <el-button
                v-if="$root.can('institute.destroy')"
                icon="el-icon-delete" 
                type="danger"
                :circle="true"/>
            </template>
         </el-table-column> -->
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteInstitute as deleteInstituteApi,restoreInstitute as restoreInstituteApi} from '@/api/institute';

export default {
    name: 'institute-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName: `institute${this.forTrashed? '_0': '_1'}`,
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this institute?' : 'Are you sure you want to  delete this institute?',
            restoreMessage : 'Are you sure you want to restore this institute ?'
            
        }
    },
    methods: {
        request: function (data) {
            if(this.forTrashed){
                data.deleted_at = 1;
            }
            
            return listApi(data)
        },
        restoreInstitute : function(data){   
            restoreInstituteApi(data.id).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('institute_0')
                this.$lqTable.refresh('institute_1')
            });
            
        },
        deleteInstitute : function(data){
            let formData = {}
            deleteInstituteApi(data.id,formData).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('institute_0')
                this.$lqTable.refresh('institute_1')
            });
        }
    }
}
</script>