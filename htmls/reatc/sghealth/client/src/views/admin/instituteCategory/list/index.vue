<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name" sortable="custom"  />
        
        <lq-table-action-column 
            viewRoute="institute-category/:id/edit" 
            :forTrashed="forTrashed" 
            :deleteRequest="deleteInstitute" 
            :confirmMessage="deleteMessage" 
            :restoreRequest="restoreInstituteCategory" 
            :restoreMessage="restoreMessage"
            editPermission="institute-category.show" 
            deletePermission="institute-category.destroy" 
            restorePermission="restore-institute-category"
        />
        
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteInstitute as deleteInstituteApi,restore as restoreInstituteCategoryApi} from '@/api/instituteCategory';

export default {
    name: 'institute-category-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName: `institute_category${this.forTrashed? '_0': '_1'}`,
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this institute category?' : 'Are you sure you want to  delete this institute category?',
            restoreMessage : 'Are you sure you want to restore this institute category ?'
            
        }
    },
    methods: {
        request: function (data) {

            if(this.forTrashed){
                data.deleted_at = 1;
            }
            return listApi(data)
        },
        restoreInstituteCategory : function(data){   
            restoreInstituteCategoryApi(data.id).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('institute_category_0')
                this.$lqTable.refresh('institute_category_1')
            });
            
        },
        deleteInstitute : function(data){
            let formData = {}
            deleteInstituteApi(data.id,formData).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('institute_category_0')
                this.$lqTable.refresh('institute_category_1')
            });
        }
    }
}
</script>