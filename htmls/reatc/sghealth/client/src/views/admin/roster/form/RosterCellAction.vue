<template>
    <div v-if="dialogShouldbeShown">
        <el-dialog
            title="Next Best Person" 
            width="300px"
            :visible="dialogShouldbeShown === 'next'" 
            @close="close">
                <schedule-form					
                    :employees="actionProps.employees" 
                    :service="actionProps.service" 
                    :branch="actionProps.branch" 
                    :date="actionProps.date" 
                    :institute="institute" 
                    :request="createRosterRequest"
                    form-name="roster_schedule"
                    @submited-error="errorInSchedule"
                    @submited-success="successInSchedule"
                />
        </el-dialog>
        <el-dialog 
			title="Frequency Schedule" 
			:visible="dialogShouldbeShown === 'frequency'" 
			width="420px"
			@close="close">				
                <auto-schedule-form 
                    :employees="actionProps.employees" 
                    :service="actionProps.service" 
                    :branch="actionProps.branch" 
                    :date="actionProps.date" 
                    :institute="institute" 
                    :request="createAutoScheduleRequest"
                    form-name="autoSchedule"
                    @submited-error="errorInAutoSchedule"
                    @submited-success="successInAutoSchedule"
                />				
		</el-dialog>
        <el-dialog title="Comment For Day" 
            :visible="dialogShouldbeShown === 'comment'"
            width="300px" 
            @close="close">
                <comment-form
                    :service="actionProps.service" 
                    :branch="actionProps.branch" 
                    :date="actionProps.date" 
                    :institute="institute" 
                    @submited-success="successInComment"
                    :request="createDayCommentRequest"
                    form-name="roster_comment"
                />
		</el-dialog>
        <el-dialog width="300px" title="Send Push Notification"  :visible="dialogShouldbeShown === 'pushnotification'" @close="close">
            <send-push-notification-form 
                :employees="actionProps.employees" 
                form-name="push_notification"  
                :request="sendPushNotificationRequest"
                @submited-success="successInPushNotification"
            />
        </el-dialog>
    </div>
</template>

<script>

import {create as createRosterApi, createAutoSchedule, createDayComment } from '@/api/roster';
import {sendPushNotification} from '@/api/users';
import ScheduleForm from './ScheduleForm';
import AutoScheduleForm from './AutoScheduleForm';
import CommentForm from './CommentForm';
import SendPushNotificationForm from './SendPushNotificationForm';

export default {
    name: 'roster-cell-action',
    props: {
        actionProps: Object,
        dialogShouldbeShown: String,
        institute: Object,
    },
    components: {
        ScheduleForm,
        AutoScheduleForm,
        CommentForm,
        SendPushNotificationForm
    },
    data: function () {

        return {
            showFrequencyBox: false,
            showNextBestPersonBox: false,
            showCommentBox: false,
        }
    },
    methods: {

        /**
         * APi To create new roster
         */
        createRosterRequest: function (data) {
            return createRosterApi(data)
        },

        /**
         * When Error To create roster.
         */
        errorInSchedule: function (data) {
            
            const msg =  this.$helper.getProp(data, 'response.data.message');
            if(msg)	 {
                return;
            }

            this.$notify({
                title: 'Error !',
                message:  msg
            });
        },

        /**
         * When Roster has been created sucess fully.
         */
        successInSchedule: function (data) {

            const work_schedule = this.$helper.getProp(data, 'data.work_schedule', null);
            this.$emit('add-new-work-schedule', work_schedule);
            this.close();
        },

       
        /**
         * When Error TO create the auto schedule.
         */
        errorInAutoSchedule: function () {
            
            const msg =  this.$helper.getProp(data, 'response.data.message');
            if(msg)	 {
                return;
            }
            this.$notify({
                title: 'Error !',
                message:  msg
            });
        },

        /**
         * When Frequency has been creaed successfully.
         */
        successInAutoSchedule: function (data) {

            const work_schedule = this.$helper.getProp(data, 'data.auto_schedule', null);
            this.$emit('add-new-work-auto-schedule', work_schedule);
            this.close();
        },

        /**
         * APi to Send ZPush notification to selected User.
         */
        sendPushNotificationRequest: function (data) {
            const user_id = data.user_id;
            delete data.user_id;
            data.type = 'roster';
            return sendPushNotification(user_id, data)
        },

        successInPushNotification: function (data) {

            if(data.message) {
                this.$message.success(data.message);   
            }
            this.close();
        },
        /**
         * API to Store the Auto schedule data..
         */
        createAutoScheduleRequest: function (data) {
            return createAutoSchedule(data)
        },

        /**
         * APi To store the day comments
         */
        createDayCommentRequest: function(data) {
            
            return createDayComment(data)
        },

        successInComment: function () {

            this.close();
        },

        /**
         * Event to Close Dialog model.
         */
        close: function () {
            this.$emit('close');
        },
    },
    
}
</script>