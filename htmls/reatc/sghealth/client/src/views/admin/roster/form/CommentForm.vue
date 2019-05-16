<template>
    <el-form>
        <lq-el-input type="textarea" id="comments" />
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>

import {lqForm} from 'vuex-lq-form';

export default {
    mixins: [lqForm],
    name: 'day-schedule-comment-form',
    props: {
        
        service: {
            type: Object,
            required: true
        },
        branch: {
            type: Object,
            required: true
        },
        institute: {
            type: Object,
            required: true
        },
        date: {
            type: String,
            required: true,
        }        
    },
    created: function () {
        
        this.$lqForm.setElementVal(this.formName, 'date', this.date);
        this.$lqForm.setElementVal(this.formName, 'branch_id', this.branch.id);
        this.$lqForm.setElementVal(this.formName, 'service_id', this.service.id);
        this.$lqForm.setElementVal(this.formName, 'institute_id', this.institute.id);
    },
    // watch: {
    //     date: function (newVal) {
    //         this.$lqForm.setElementVal(this.formName, 'date', newVal);
    //     },
    //     branch: function (newVal) {
    //         this.$lqForm.setElementVal(this.formName, 'branch_id', newVal.id);
    //     },
    //     service: function (newVal) {
    //         this.$lqForm.setElementVal(this.formName, 'service_id', newVal.id);
    //     },
    //     institute: function (newVal) {
    //         this.$lqForm.setElementVal(this.formName, 'institute_id', newVal.id);
    //     }
    // }
}
</script>

