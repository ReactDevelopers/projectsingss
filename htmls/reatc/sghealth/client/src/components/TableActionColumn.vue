<template>
    <el-table-column label="Action" align="right">
        <template slot="header">
            <lq-table-form>
                <lq-el-input id="search" placeholder="Search" :inside-form-element="false" size="mini" />
            </lq-table-form>
        </template>
        <template slot-scope="scope">
            <el-button
            v-if="$root.can(restorePermission) && (forTrashed || scope.row.deleted_at)  "
            @click="restoreRecord(scope.row)"
            icon="el-icon-refresh" 
            type="success"
            :circle="true"/>
            <el-button
            v-else-if="$root.can(editPermission)"
            icon="el-icon-edit" 
            type="primary"
            :circle="true"
            @click="$router.push(viewRoute.replace(':id', $helper.getProp(scope, 'row.id', null)))"/>
            <el-button
            v-if="$root.can(deletePermission)"
            @click="deleteRecord(scope.row)"
            icon="el-icon-delete" 
            type="danger"
            :circle="true"/>
        </template>
    </el-table-column>
</template>
<script>
export default {
    name : 'lq-el-table-action',
    props: {
        deleteRequest : {
            type:  Function,
        },
        confirmMessage:{
            type : String
        },
        forTrashed : {
            type :Boolean,  
            default : function (){return false}
        },
        viewRoute:{
            type: String
        },
        restoreRequest :{
            type : Function
        },
        restoreMessage : {
            type : String
        },
        viewPermission : {
            type : String
        },
        editPermission  : {
            type : String
        },
        deletePermission : {
            type : String
        },
        restorePermission : {
            type : String
        }

    },
    methods : {
        
        deleteRecord:function(data){
            
            this.$confirm(this.confirmMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                this.deleteRequest(data)
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Delete canceled'
                });       
            });
        },
        restoreRecord:function(data){
            
            this.$confirm(this.restoreMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                this.restoreRequest(data)
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Restore canceled'
                });       
            });
        },
    }
}
</script>
