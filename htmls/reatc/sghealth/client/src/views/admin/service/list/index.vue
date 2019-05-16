<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name" sortable="custom" />
        <el-table-column  prop="short_name" label="Short Name" sortable="custom" />

        <lq-table-action-column 
            viewRoute="service/:id/edit" 
            :forTrashed="forTrashed" 
            :deleteRequest="deleteService" 
            :confirmMessage="deleteMessage" 
            :restoreRequest="restoreService" 
            :restoreMessage="restoreMessage"
            editPermission="service.store" 
            deletePermission="service.destroy" 
            restorePermission="restore-service"
        />

    </lq-el-table>
</template>
<script>
import {list as listApi,deleteService as deleteServiceApi,restoreService as restoreServiceApi} from '@/api/service';

export default {
    name: 'service_list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName: `service${this.forTrashed? '_0': '_1'}`,
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this service ?' : 'Are you sure you want to  delete this service ?',
            restoreMessage : 'Are you sure you want to restore this service ?'
            
        }
    },
    methods: {
        request: function (data) {
            if(this.forTrashed){
                data.deleted_at = 1;
            }
            
            return listApi(data)
        },
        restoreService : function(data){   
            restoreServiceApi(data.id).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('service_0')
                this.$lqTable.refresh('service_1')
            });
            
        },
        deleteService : function(data){
            let formData = {}
            deleteServiceApi(data.id,formData).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('service_0')
                this.$lqTable.refresh('service_1')
            });
        }
    }
}
</script>