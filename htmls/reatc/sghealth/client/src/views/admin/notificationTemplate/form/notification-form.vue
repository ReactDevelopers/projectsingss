<template>
    <el-form>
       
        <lq-el-select 
            id="type" 
            label="Type"
            :options="[{name: 'Email', id: 'email' }, {name: 'SMS', id: 'sms' }]"
            :disabled="formInitialvalues ? true:false"
        />
        <lq-el-input id="name" label="Template Name" />
        <lq-el-input id="subject" label="Subject" />
        <rich-editor id="body" label="Body" v-if="formValues.type ==='email'" />
        <lq-el-input id="body" label="Body" type="textarea" v-else />

        <lq-el-select 
            id="options.variables" 
            label="Variables"
            :filterable="true"
            :multiple="true"
            :allow-create="true"
            />

        <lq-el-submit label="Submit" @click="submit" />
    </el-form>
</template>
<script>
    
    import {lqForm} from 'vuex-lq-form';
    
    
    export default {
        name: 'notification_template_form',
        mixins:[lqForm],
        data: function () {
            return {
                excludeInput: ['created_at', 'updated_at', 'id']
            }
	    },
    }
</script>