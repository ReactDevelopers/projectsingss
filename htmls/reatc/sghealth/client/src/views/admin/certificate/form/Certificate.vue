<template>
    <el-form>
        <lq-el-input id="title" label="Title" />
        <lq-el-radio-group id="upload_document"
                :button="true"
                label="Attach Certificate"
                :options="[{value: 'true', label: 'Yes'}, {value: 'false', label: 'No'}]" 
            />
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
        
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    
    export default {
        name: 'certificate_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
        }
    }
</script>