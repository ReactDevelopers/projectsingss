<template>
    <el-form  auto-complete="on" label-width="300px">
        <lq-el-select 
            id="banner_category_id" 
            label="Banner Category"
            store-key="table.banner_categories_drop_down.data"
        />
        <lq-el-image 
            id="image" 
            label="Banner Image" 
            :storage-url="$root.storage_url"
            value-key="thumbnails.0.path"
            :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[1242, 2688]}}" 
            :thumbs="[{width: 207, height: 448}]"
        />
          <el-form-item>
            <lq-el-submit label="Update" @click="submit" />
          </el-form-item>
    </el-form>
</template>
<script>
    
    import {lqForm} from 'vuex-lq-form';
    import {list as bannerCategoryListApi} from '@/api/bannerCategory';

    export default {
        name: 'login-form',
        mixins:[lqForm],

        created() {
            
            this.$lqTable.fetchListData('banner_categories_drop_down', bannerCategoryListApi,{
                data_key: 'data.banner_categories',
            })
        }
    }
</script>

<style>
    .image-preview, .lq-cropper_wrapper {
        width: 207px;
    }
</style>
