<template>
    <el-form aria-autocomplete="off">
        <el-row :gutter="10">
            <el-col :span="14">
                <lq-el-input id="title" label="Title" />
                <rich-editor id="description" label="Description" />
            </el-col>
            <el-col :span="10" align="center">
                <lq-el-image 
                    id="image" 
                    label="Image" 
                    :storage-url="$root.storage_url"
                    value-key="thumbnails.0.path"
                    :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[1000, 300]}}" 
                    :thumbs="[{width: 200, height: 200}]"
                />
            </el-col>
        </el-row>
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
        
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';

    export default {
        name: 'advertisement_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: []
            }
        },
    }
</script>