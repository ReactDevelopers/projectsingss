<template>
    <el-form>
        <lq-el-input id="subject" label="Subject" :readonly="true" />
        <lq-el-input id="email" label="Email" :readonly="true" />
        <lq-el-input id="body" label="Query" :readonly="true" type="textarea" />
        <rich-editor id="replied"   v-if="formInitialvalues && formInitialvalues.replied === null"/>
        <lq-el-input id="replied"   v-else label="Reply" :readonly="true" type="textarea" />

        <el-form-item>
            <lq-el-submit label="Update" @click="submit"  v-if="formInitialvalues && formInitialvalues.replied === null"/>
            <lq-el-submit label="Back" v-else @click="$router.push('/contact-us')" />
        </el-form-item>
    </el-form>
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    
    export default {
        name: 'contact_us_reply_form',
        mixins:[lqForm],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
        }
    }
</script>