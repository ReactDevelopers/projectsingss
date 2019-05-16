<template>
    <el-form class="roster_popup_form">
        <lq-el-select :options="employees" id="user_id" label="Next Best Person" />
        
        <lq-el-date-picker label="Roster Date" disabled id="date" format="dd/mm/yyyy" />
        <lq-el-time-picker
            is-range
            start-placeholder="Start time"
            value-format="HH:mm:00"
            id="times"
            format="hh:mm A"
            label="Roster Time"
            end-placeholder="End time" 
        />       
         <!-- End Permission List Card -->
        <el-form-item >
        <lq-el-submit label="Update" @click="submit" />
        </el-form-item>
    </el-form>
</template>

<script>
import {lqForm} from 'vuex-lq-form';
import moment from 'moment';
import {create as createRosterApi } from '@/api/roster';

export default {
    name: 'work-schedule-form',
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
        }
        
    },
    data: function () {

        return {
            times: ['', ''],
            requesting: false,
            error: null
        }
    },
    created: function () {
        
        this.$lqForm.setElementVal(this.formName, 'date', this.date);
        this.$lqForm.setElementVal(this.formName, 'branch_id', this.branch.id);
        this.$lqForm.setElementVal(this.formName, 'service_id', this.service.id);
        this.$lqForm.setElementVal(this.formName, 'institute_id', this.institute.id);

        if(['Mon', 'Tue', 'Wed', 'Thu', 'Fri'].includes(moment(this.date).format('ddd')) && this.branch.mon_fri_timing) {
            
            this.$lqForm.setElementVal(this.formName, 'times',  this.branch.mon_fri_timing);

        } else if(moment(this.date).format('ddd') === 'Sat' && this.branch.saturday_timing) {

            this.$lqForm.setElementVal(this.formName, 'times',  this.branch.saturday_timing)

        } else if(moment(this.date).format('ddd') === 'Sun' && this.branch.sunday_timing) {

            this.$lqForm.setElementVal(this.formName, 'times',  this.branch.sunday_timing)
        }
    },
    methods: {

        saveSchedule: function () {

           const loading = this.$loading({
		          lock: true,
		          text: 'Scheduling..',
            });
            this.error = null;

            createRosterApi({
                service_id: this.service.id,
                branch_id: this.branch.id,
                institute_id: this.institute.id,
                user_id: this.user.id,
                date: this.date,
                start_time: this.times[0],
                end_time: this.times[1]
            }).then((response) => {

                loading.close();
                this.$message.success(response.message);
                this.$emit('newSchedule', response.data.work_schedule);

            }).catch((error) => {

                loading.close();
                this.error = error.response.data.error;
                this.$message.error(error.response.data.message);	
            })
        },

        /**
         * To get roster formated date 
         */
        rosterDateFormatted: function () {

            return moment(this.date).format('DD/MM/YYYY');
        }
    }
}
</script>

