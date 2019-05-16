<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name" sortable="custom"  />

        <lq-table-action-column 
            viewRoute="profession-category/:id/edit" 
            :forTrashed="forTrashed" 
            :deleteRequest="deleteProfession" 
            :confirmMessage="deleteMessage" 
            :restoreRequest="restore" 
            :restoreMessage="restoreMessage"
            editPermission="profession-category.show" 
            deletePermission="profession-category.destroy" 
            restorePermission="restore-profession-category"
        />
        
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteProfessionCategory as deleteApi,restore as restoreApi} from '@/api/professionCategory';

export default {
    name: 'profession-category-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName: `profession_category${this.forTrashed? '_0': '_1'}`,
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this profession category?' : 'Are you sure you want to  delete this profession category?',
            restoreMessage : 'Are you sure you want to restore this profession category ?'
            
        }
    },
    methods: {
        request: function (data) {

            if(this.forTrashed){
                data.deleted_at = 1;
            }
            return listApi(data)
        },
        restore : function(data){   
            restoreApi(data.id).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('profession_category_0')
                this.$lqTable.refresh('profession_category_1')
            });
            
        },
        deleteProfession : function(data){
            let formData = {}
            deleteApi(data.id,formData).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('profession_category_0')
                this.$lqTable.refresh('profession_category_1')
            });
        }
    }
}
</script>