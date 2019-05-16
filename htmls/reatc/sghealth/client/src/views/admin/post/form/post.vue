<template>
    <el-form>
        <lq-el-select 
            id="post_type_id"
            store-key="table.post_type.data"
            :disabled="formInitialvalues ? true:false"
         />
        <lq-el-input id="name" label="Name" :disabled="formInitialvalues ? true:false" />
        <lq-el-input id="title" label="Title"/>
        <rich-editor id="content" label="Content"/>
        
        <lq-el-select 
            id="options.meta_name" 
            label="Meta Name"
            :filterable="true"
            :multiple="true"
            :allow-create="true"/>

         <lq-el-select 
            id="options.meta_content" 
            label="Meta Content"
            :filterable="true"
            :multiple="true"
            :allow-create="true"/>
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    import {list as postTypeListApi} from '@/api/postType';

    export default {
        name: 'post_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
        },
        created(){
            this.$lqTable.fetchListData('post_type', postTypeListApi,{
                data_key: 'data.post_type.data',
            })
        }
    }
</script>