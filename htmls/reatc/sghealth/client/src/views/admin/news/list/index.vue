<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        
        <el-table-column  prop="title" label="Title" sortable="custom"  />
        <el-table-column  label="Description" sortable="custom"  >
            <template slot-scope="scope">
                <p v-html="scope.row.description"></p>
            </template>
        </el-table-column>
        <el-table-column  prop="created_at" label="Posted On" sortable="custom"  />
        
        <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
               <!--  <el-button
                    @click="$router.push('news/:id/view'.replace(':id', $helper.getProp(scope, 'row.id', null)))"
                    icon="el-icon-view" 
                    type="primary"
                    :circle="true"/> -->
                <el-button
                    v-if="$root.can('news.update')"
                    icon="el-icon-edit" 
                    type="primary"
                    :circle="true"
                    @click="$router.push('news/:id/edit'.replace(':id', $helper.getProp(scope, 'row.id', null)))"/>
                <el-button
                    v-if="$root.can('news.destroy')"
                    @click="deleteNews(scope.row)"
                    icon="el-icon-delete" 
                    type="danger"
                    :circle="true"/>
            </template>
        </el-table-column>
        
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteNews as deleteNewsApi} from '@/api/news';

export default {
    name: 'news-list',
    data: function () {

        return {
            tableName: `news_list`,
            deleteMessage : 'Are you sure you want to permanently delete this news? ',
            
        }
    },
    methods: {
        request: function (data) {
            if(this.newsType){
                data.news_type = this.newsType;
            }

            return listApi(data)
        },
        deleteNews : function(data){
            this.$confirm(this.deleteMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                deleteNewsApi(data.id).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('news_list')
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