<template>
    <el-form>
        <lq-el-input id="name" label="Name" />
        <lq-el-input id="short_name" label="Short Name" />
        
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    
    export default {
        name: 'service_form',
        mixins:[lqForm],
        data: function () {
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
	    },
    }
</script>