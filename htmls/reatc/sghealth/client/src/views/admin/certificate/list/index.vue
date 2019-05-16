<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="title" label="Title" sortable="custom"  />

        <el-table-column  label="Document Required" >
            <template slot-scope="scope">
                {{(scope.row.upload_document == 'false') ? 'No' : 'Yes'}}
            </template>
        </el-table-column>
        
        <lq-table-action-column 
            viewRoute="certificate/:id/edit" 
            :forTrashed="forTrashed" 
            :deleteRequest="deleteCertificate" 
            :confirmMessage="deleteMessage" 
            :restoreRequest="restoreCertificate" 
            :restoreMessage="restoreMessage"
            editPermission="certificate.show" 
            deletePermission="certificate.destroy" 
            restorePermission="restore-certificate"
        />
        
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteCertificate as deleteCertificateApi,restoreCertificate as restoreCertificateApi} from '@/api/certificate';

export default {
    name: 'certificate-list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName: `certificate${this.forTrashed? '_0': '_1'}`,
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this certificate?' : 'Are you sure you want to  delete this certificate?',
            restoreMessage : 'Are you sure you want to restore this certificate ?'
            
        }
    },
    methods: {
        request: function (data) {

            if(this.forTrashed){
                data.deleted_at = 1;
            }
            return listApi(data)
        },
        restoreCertificate : function(data){   
            restoreCertificateApi(data.id).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('certificate_0')
                this.$lqTable.refresh('certificate_1')
            });
            
        },
        deleteCertificate : function(data){
            let formData = {}
            deleteCertificateApi(data.id,formData).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('certificate_0')
                this.$lqTable.refresh('certificate_1')
            });
        }
    }
}
</script>