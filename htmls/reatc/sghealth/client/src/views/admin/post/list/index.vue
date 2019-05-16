<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name" sortable="custom" />
        <el-table-column  prop="title" label="Title" sortable="custom" />
        <el-table-column  label="Post Type" sortable="custom" >
            <template slot-scope="scope">
                {{$helper.getProp(scope,'row.post_type.name','-')}}
            </template>
        </el-table-column>

        <lq-table-action-column 
            viewRoute="post/:id/edit" 
            :forTrashed="forTrashed" 
            :deleteRequest="deleteContent" 
            :confirmMessage="deleteMessage" 
            :restoreRequest="restoreContent" 
            :restoreMessage="restoreMessage"
            editPermission="post.store" 
            deletePermission="post.destroy" 
            restorePermission="restore-post"
        />
        <!-- <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                icon="el-icon-edit" 
                type="primary"
                :circle="true"
                @click="$router.push('post/'+scope.row.id+'/edit')"/>
                <el-button
                icon="el-icon-delete" 
                type="danger"
                :circle="true"/>
            </template>
         </el-table-column> -->
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteContent as deleteContentApi,restoreContent as restoreContentApi} from '@/api/post';

export default {
    name: 'post_list',
    props: {
        forTrashed: {
            type:  Boolean,
            default: function (){return false}
        }
    },
    data: function () {

        return {
            tableName: `content${this.forTrashed? '_0': '_1'}`,
            deleteMessage : this.forTrashed ? 'Are you sure you want to permanently delete this certificate?' : 'Are you sure you want to  delete this content?',
            restoreMessage : 'Are you sure you want to restore this content ?'
            
        }
    },
    methods: {
        request: function (data) {

            if(this.forTrashed){
                data.deleted_at = 1;
            }
            return listApi(data)
        },
        restoreContent : function(data){   
            restoreContentApi(data.id).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('content_0')
                this.$lqTable.refresh('content_1')
            });
            
        },
        deleteContent : function(data){
            let formData = {}
            deleteContentApi(data.id,formData).then((response)=>{
                this.$message({
                    type: 'success',
                    message: response.message
                });
                this.$lqTable.refresh('content_0')
                this.$lqTable.refresh('content_1')
            });
        }
    }
}

</script>