<template>
    <div>
    <table  class="roster white-bg">
        <thead>
            <tr>
                <th :colspan="2">
                    <el-dropdown :hide-on-click="false" trigger="click" class="head-dropdown-list">
                    <span class="el-dropdown-link">
                        Branches <i class="el-icon-arrow-down el-icon--right"></i>
                    </span>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item 
                            v-for="(branch) in $helper.getProp(institute, 'branches')"
                            :key="`branch${branch.id}`"
                        >								
                            <el-checkbox 
                            :checked="hasBranchSelected(branch.id)"
                            @change="switchBranch(branch.id)"
                            >
                            {{branch.name}} 
                            </el-checkbox>
                        </el-dropdown-item>
                    </el-dropdown-menu>
                    </el-dropdown>
                </th>
                <th :key="`branch_heading_${branch.id}`"  :colspan="branch.services.length" v-for="(branch) in selectedBranches"> 		
                    
                    <el-dropdown :hide-on-click="false" trigger="click">
                    <span class="el-dropdown-link">
                        {{branch.name}} <i class="el-icon-arrow-down el-icon--right"></i>
                    </span>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item 
                            v-for="(service) in getServicesOfBranch(branch.id)"
                            :key="`service${branch.id}${service.id}`"
                        >
                            <el-checkbox 
                            :checked="hasServiceSelected(branch, service.id)"                            
                            @change="switchService(branch.id, service.id)"
                            >
                            {{service.name}} {{branch.services.length}}
                            </el-checkbox>
                            
                        </el-dropdown-item>
                    </el-dropdown-menu>
                    </el-dropdown>
                </th>
            </tr>
            <!-- Service Heading -->
            <tr>
                <td :colspan="2">-</td>
                <th :key="`service_heading_${service.branch.id}_${service.id}`"  v-for="(service) in selectedBrancheServices" >
                    {{service.name}}
                </th>
            </tr>

            <!-- End Service Heading -->
        </thead>
    
        <tbody>
            <tr :class="date.format('ddd') == 'Sun' ? `blue-bg` : ``" v-for="(date) in dateRange" :key="`month_date_${date}`">
                <td> {{date.format('DD')}}</td>
                <td> {{date.format('ddd')}}</td>

                <roster-cell 
                    @deletedSchedule="deleteSchedule"						
                    @deleted-auto-schedule="deletedAutoSchedule"						
                    :key="`service_${service.id}_${service.branch.id}_month_date_${date}`"
                    :menu="$refs.rightmenu"
                    :service="service" 
                    :institute="institute"
                    :employees="employees"
                    :branch="service.branch"
                    :date="date.format('YYYY-MM-DD')"
                    v-for="(service) in selectedBrancheServices"
                    :work-schedules="work_schedules"
                    :day-comments="day_comments"
                    :work-auto-schedules="work_auto_schedules"
                />

            </tr>
        </tbody>
    </table>
    <!-- Right Click menu -->
        <vue-context ref="rightmenu">
            <ul slot-scope="child">
                <li @click="rosterAction($event, {type: 'frequency', props: child.data})">Frequency</li>
                <li @click="rosterAction($event, {type: 'next',  props: child.data})">Next Best Person</li>
                <li @click="rosterAction($event, {type: 'comment',  props: child.data})">Comment</li>
                <li @click="rosterAction($event, {type: 'pushnotification',  props: child.data})">Push Notification</li>
            </ul>
        </vue-context>
    <!-- End Right Click menu -->
        <roster-cell-action 
            :action-props="actionProps" 
            :institute="institute" 
            :dialog-shouldbe-shown="dialogShouldbeShown" 
            @close="dialogShouldbeShown=null"
            @add-new-work-schedule="newWorkScheduleAdded"
            @add-new-work-auto-schedule="newWorkAutoScheduleAdded"
        />
    </div>
</template>

<script>

import branchServiceDisplayHelper from '../mixins/branchServiceTable';
import moment from 'moment';
import  RosterCell from './RosterCell'; 
import  RosterCellAction from './RosterCellAction'; 
import { VueContext } from 'vue-context';

export default {

    name: 'roster',
    mixins: [branchServiceDisplayHelper],
    components: {
        VueContext,
        RosterCell,
        RosterCellAction,
    },
    props: {
        institute: Object,
        month: String,
        selectedEmployees: Array,
        employees: Array,
        work_schedules: Array,
        work_auto_schedules: Array,
        day_comments: Array,
        
    },
    data: function () {

        return {
            // work_schedules: {},
            // work_auto_schedules: {},
            // day_comments: {},
            dateRange: [],
            actionProps: {},
            dialogShouldbeShown: null
        }
    },

    created: function () {

        this.initialSelectedBranch();
        this.makeDateRange(this.month);
        //this.fetchWorkScheduleList();
    },

    methods: {
        
        /**
         * To get the given month last date
         */
        getMonthEndDate: function (month) {
        
            return month ? moment(month+'-01').endOf('month') : null
        },

        /**
         * Right Click Action Event
         */
        rosterAction: function ($event, child) {

            this.dialogShouldbeShown = child.type;

            if(child.type === 'frequency') {
                this.$lqForm.deleteForm('autoSchedule');

            } else if(child.type === 'next') {
                this.$lqForm.deleteForm('roster_schedule');

            }else if(child.type === 'comment') {
                
                if(child.props.serviceDayInfo) {
                    this.$lqForm.initializeValues('roster_comment', {comments: child.props.serviceDayInfo.comments});
                }

            } else if(child.type === 'pushnotification') {
                
                this.$lqForm.deleteForm('push_notification');
            }
            this.actionProps = child.props;
        },

        /**
         * Catch the event when roster delete and remove deleted roster from the list
         */
        deleteSchedule: function (work_schedule) {

            this.$emit('deleted-work-schedule', work_schedule);
        },

        /**
         * To delete the Auto work schedule.
         */
        deletedAutoSchedule: function (work_schedule) {
            
            this.$emit('deleted-auto-work-schedule', work_schedule);
        },

        /**
         * Catch When new work schedule added.
         */
        newWorkScheduleAdded: function (work_schedule) {
            
            if(work_schedule) {
                this.$emit('new-work-schedule-added', work_schedule);
            }
        },

         /**
         * Catch When new auto work schedule added.
         */
        newWorkAutoScheduleAdded: function(work_schedule) {
            
            if(work_schedule) {
                this.$emit('new-auto-work-schedule-added', work_schedule);
            }
        },
        
        /**
         * To make the Date range for given month/
         */
        makeDateRange: function (newVal) {
            
            if(!newVal) {
                return;
            }

            const last_date = this.getMonthEndDate(newVal);
            const first_date = moment(newVal+'-01');
            
            this.dateRange = [];

            for (var date = first_date; date.isBefore(last_date); date.add(1, 'days')) {
                
                this.dateRange.push(date.clone());
            }
        }
    },
    watch: {

        /**
         * When month changed, fetch the Work schedule
         */
        month: function (newVal) {

            //this.fetchWorkScheduleList();

             if(newVal) {
            
                this.makeDateRange(newVal);
                return;
            }

            this.dateRange  = [];
        },

        /**
         * When institute changed, fetch the Work schedule
         */
        institute: {

            handler(val){
                this.initialSelectedBranch();
            },
            deep: true
        }
    }
}
</script>