<template>
    <el-form class="roster_popup_form">
        <lq-el-select :options="employees" id="user_id" placeholder="Next Best Person" />
        <el-row :gutter="10">
            <el-col :span="9">
                <lq-el-date-picker disabled id="schedule_start_date" format="dd/mm/yyyy" />
            </el-col>
            <el-col :span="15">
                <lq-el-time-picker
                    is-range
                    start-placeholder="Start time"
                    value-format="HH:mm:00"
                    id="options.times"
                    format="hh:mm A"
                    end-placeholder="End time">
                </lq-el-time-picker>
            </el-col>
        </el-row>
        <lq-el-input type="textarea" id="options.comments" />
        <lq-el-radio-group label="Repeat On" size="medium" id="schedule_type" :options="schedule_type_options" :button="true" />
        <lq-el-checkbox-group id="options.week_days" size="mini" :options="week_day_options" :button="true" v-if="$helper.getProp(formValues,'schedule_type') === 'weekly'" />        
        <lq-el-checkbox id="options.overwrite_current_schedule" true-label="Yes" false-label="No" label="Overwrite Current Schedule"/>
        
        <el-form-item>
            <lq-el-submit :label="`${formInitialvalues ? 'Update':'Create'}`" @click="submit" />
        </el-form-item>
    </el-form>
</template>

<script>
import {lqForm} from 'vuex-lq-form';
import moment from 'moment';

export default {
    name: 'auto-work-schedule-form',
    mixins: [lqForm],
    props: {
        employees: {
            type: Array,
            required: true
        },
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
        },
        
    },
    data: function () {

        return {
            schedule_type_options: [
                {label: 'Weekly', value: 'weekly'},
                {label: 'Daily', value: 'daily'},
            ],
            week_day_options: [
               {label: 'Sun', value: 'Sun'}, 
               {label: 'Mon', value: 'Mon'}, 
               {label: 'Tue', value: 'Tue'}, 
               {label: 'Wed', value: 'Wed'}, 
               {label: 'Thu', value: 'Thu'}, 
               {label: 'Fri', value: 'Fri'}, 
               {label: 'Sat', value: 'Sat'}
            ],
            status_options: [{id: 'Active', name: 'Active'}, {id: 'Pending', name: 'Pending'}]
        }
    },
    created: function () {
        
        this.$lqForm.setElementVal(this.formName, 'schedule_start_date', this.date);
        this.$lqForm.setElementVal(this.formName, 'branch_id', this.branch.id);
        this.$lqForm.setElementVal(this.formName, 'service_id', this.service.id);
        this.$lqForm.setElementVal(this.formName, 'institute_id', this.institute.id);
        this.$lqForm.setElementVal(this.formName, 'status', 'Active');
    }
}
</script>
