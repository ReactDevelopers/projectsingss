<template>
    <el-form>
        <lq-el-input id="subject" label="Subject" />
        <rich-editor id="question" label="Question"  :height="200" />
        <rich-editor id="answer" label="Answer" :height="200"  />
        
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    
    export default {
        name: 'faq_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
        }
    }
</script>