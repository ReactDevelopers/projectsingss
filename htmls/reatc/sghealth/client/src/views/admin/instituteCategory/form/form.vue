<template>
    <el-form>
        <lq-el-input id="name" label="Name" />
        <lq-el-image 
            id="icon" 
            label="Icon" 
            :storage-url="$root.storage_url"
            :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[40, 40]}}" 
            :thumbs="[{width: 200, height: 200}]"
            :update-original="true"
        />
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    
    export default {
        name: 'institue_category_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
        }
    }
</script>