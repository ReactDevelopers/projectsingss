<template>
    <lq-el-table :name="tableName"  :request="request">
        <lq-el-table-index />
        
        <el-table-column  prop="name" label="Name" sortable="custom"  />
        
        <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <!-- <el-button
                    @click="$router.push('license/:id/view'.replace(':id', $helper.getProp(scope, 'row.id', null)))"
                    icon="el-icon-view" 
                    type="primary"
                    :circle="true"/> -->
                <el-button
                    v-if="$root.can('license.update')"
                    icon="el-icon-edit" 
                    type="primary"
                    :circle="true"
                    @click="$router.push('license/:id/edit'.replace(':id', $helper.getProp(scope, 'row.id', null)))"/>
                <el-button
                    v-if="$root.can('license.destroy')"
                    @click="deleteLicense(scope.row)"
                    icon="el-icon-delete" 
                    type="danger"
                    :circle="true"/>
            </template>
        </el-table-column>
        
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteLicense as deleteLicenseApi} from '@/api/license';

export default {
    name: 'license-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName:'license',
            deleteMessage : 'Are you sure you want to permanently delete this license? ',
            
        }
    },
    methods: {
        request: function (data) {
            return listApi(data)
        },
        deleteLicense : function(data){
            this.$confirm(this.deleteMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                let formData = {}
                deleteLicenseApi(data.id,formData).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('license')
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