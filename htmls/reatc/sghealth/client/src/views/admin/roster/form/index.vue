<template>
    <div >
        <roster-filter-form 
            form-name="roster_filter"
            :default-institute="defaultInstitute"
            :default-month="defaultMonth"
            @change-selected-employees="getSelectedEmployees" 
            @change-employees="getEmployees"
            @change-month="getMonth"
            @change-institute="getInstitute"
        />
        <el-button type="primary" :round="false" class="left_side_action_btn show_hide_btn" size="mini" title="Hide/Show Roster" @click="showLeftSide = !showLeftSide" :icon="`el-icon-arrow-${showLeftSide ? 'left': 'right'}`"></el-button>
        <el-button type="primary" :round="false" class="right_side_action_btn show_hide_btn" size="mini" title="Hide/Show Clinic Information" @click="showRightSide = !showRightSide" :icon="`el-icon-arrow-${showRightSide ? 'right': 'left'}`"></el-button> 
        <el-row :gutter="30" class="table-section">
            <el-col :span="(showRightSide && showLeftSide) ? 16: 24" v-if="showLeftSide">
                <!-- <h3>Roster</h3> -->
                <el-scrollbar>
                     <roster 
                        :institute="institute" 
                        :month="month"
                        :selectedEmployees="selected_employees"
                        :employees="employees"
                        :work_schedules="work_schedules"
                        :work_auto_schedules="work_auto_schedules"
                        :day_comments="day_comments"
                        @deleted-auto-work-schedule="deleteAutoSchedule"
                        @deleted-work-schedule="deleteSchedule"
                        @new-work-schedule-added="addedScheduled"
                        @new-auto-work-schedule-added="addedAutoScheduled"
                    />
                </el-scrollbar>
            </el-col>
            <el-col :span="(showRightSide && showLeftSide) ? 8: 24" v-if="showRightSide">
                <el-row :gutter="10" class="dashboard-right-box">
                    <el-col :span="24">
                        <!-- <h3>Staff</h3> -->
                        <el-scrollbar >
                            <institute-employee :work-schedules="work_schedules" :employees="employees" />                            
                        </el-scrollbar>
                    </el-col>
                </el-row>
                <el-row :gutter="10" class="dashboard-right-box">
                    <el-col :span="24">
                        <!-- <h3>Clinic Information</h3> -->
                        <el-scrollbar>
                            <institute-license 
                                :institute="institute" 
                                :licenses="licenses"
                                :institute_license_expity_dates="institute_license_expity_dates"
                                @license-created="instituteLicenseCreated"
                                @license-deleted="instituteLicenseDelete"
                                @expiry-update="instituteLicenseDateChanged"
                            />
                        </el-scrollbar>
                    </el-col>

                </el-row>
            </el-col>
        </el-row>
    </div>
</template>

<script>
    
    import RosterFilterForm from './RosterFilterForm';
    import Roster from './Roster';
    import InstituteLicense from '../show/InstituteLicense';
    import InstituteEmployee from '../show/InstituteEmployee';
    import {list as workScheduleListApi} from '@/api/roster';
    import {list as licenseListApi} from '@/api/instituteLicense';

    export default {
        name:'roster-manager',
        components: {
            RosterFilterForm,
            Roster,
            InstituteLicense,
            InstituteEmployee
        },
        props: {
            defaultInstitute: Number,
            defaultMonth: String,
            readOnly: Boolean
        },
        data: function () {

            return {
                employees: [],
                selected_employees: [],
                month: null,
                institute: null,
                showRightSide: true,
                showLeftSide: true,
                work_schedules: [],
                work_auto_schedules: [],
                day_comments: [],
                licenses: [],
                institute_license_expity_dates: []
            }
        },        
        methods: {

            getSelectedEmployees: function (employees) {
                this.selected_employees = employees;
            },

            getEmployees: function (employees) {
                this.employees = employees;
            },

            getMonth: function (month){
                this.month = month;
                this.fetchWorkScheduleList();
            },
            getInstitute: function (institute) {

                this.institute = institute;
                this.fetchWorkScheduleList();
                this.fetchLicenses();
            },

             /**
             * To get the Work schedule list of selected institute and branch
             */
            fetchWorkScheduleList: function () {
                
                if(this.institute && this.month) {

                    workScheduleListApi({
                        institute_id: this.institute.id,
                        month: this.month         			
                    }).then((response) => {

                        this.work_schedules =  response.data.work_schedules;
                        this.day_comments  = response.data.day_comments;
                        this.work_auto_schedules  = response.data.work_auto_schedules;
                    })

                    return;
                }

                this.work_schedules =  [];
                this.day_comments  = [];
                this.work_auto_schedules  = [];
            },

             /**
             * To fetch the all institute licenses from the server.
             */
            fetchLicenses: function ( ) {
                
                if(!this.institute) {
                    this.licenses = [];
                    this.institute_license_expity_dates = [];
                    return;
                }

                licenseListApi({
                    institute_id: this.institute.id
                }).then((response) => {

                    this.licenses = response.data.licenses;
                    this.institute_license_expity_dates = response.data.institute_license_expity_dates;
                })
            },

            

            /**
             * Remved teh Auto schedule data
             */
            deleteAutoSchedule: function (schedule) {
                
                this.work_auto_schedules.map((s, index) => {

                    if(s.id === schedule.id) {
                        this.$helper.deleteProp(this.work_auto_schedules, index.toString());
                    }
                })
            },
            deleteSchedule: function (schedule) {

                 this.work_schedules.map((s, index) => {

                    if(s.id === schedule.id) {
                        this.$helper.deleteProp(this.work_schedules, index.toString());
                    }
                })
            },
            addedScheduled: function (schedule) {
                this.work_schedules.push(schedule)
            },
            addedAutoScheduled: function (schedule) {
                this.work_auto_schedules.push(schedule)
            },

            /**
             * Add new License in List
             */
            instituteLicenseCreated: function (response) {
                let has = false;
                this.licenses.map((license) => {

                    if(license.pivot.id === response.data.license.pivot.id) {
                        has = true;
                        license.pivot = response.data.license.pivot;
                    }
                })

                if(has === false) {
                    this.licenses.push(response.data.license);
                }
            },

            /**
             * When Licence has been deleted.
             */
            instituteLicenseDelete: function (response) {
                this.licenses.map((license, index) => {

                    if(license.pivot.id === response.data.institute_license.id) {

                        //
                        if(response.data.institute_license.is_branch_license === 'No' && response.data.institute_license.is_service_license == 'No') {
                            this.$helper.deleteProp(this.licenses, index.toString());
                        }
                        else {
                            license.pivot.is_branch_license = response.data.institute_license.is_branch_license;
                            license.pivot.is_service_license = response.data.institute_license.is_service_license;
                        }
                    }
                })
            }, 

            instituteLicenseDateChanged: function (institute_license_id, date) {
                
                this.institute_license_expity_dates.map((license_expity_date) => {

                    if(license_expity_date.institute_license_id === institute_license_id) {
                        license_expity_date.expiry_date = date;
                    }
                })
            }

            /**
             * Update the EMployee addtional information if updated.
             */
            // updatedUserAdditionalInfo: function (user) {

            //     this.employees.map( (employee) => {
            //         if(employee.id === user.id) {
            //             employee.additional_informations = user.additional_informations;
            //         }
            //     })
            // }
        }
    }
</script>
<style>


.custom-dropdown {
    display: block;
    position: relative;
}

.custom-dropdown:after {
    content: '';
    background-repeat: no-repeat;
    background-size: 10px;
    background-position: center center;
    background-color: #ffffff;
    border-radius: 0 4px 4px 0;
    cursor: pointer;
    position: absolute;
    pointer-events: none;
    right: 1px;
    top: 1px;
    height: 38px;
    width: 30px;
}

.white-arrow:after {
}



/* End Display text CSS */
/* Background color CSS */
.white-bg {
    background-color:#f3f3f3;
}

.blue-bg {
    background-color: #1A7CA7;
}

.red-bg {
    background-color: #F52424;
}

.grey-bg {
    background-color: #979797;
}

.yellow-bg {
    background-color: #F3C300;
}

/* End Background color CSS */
/* Text color CSS */
.c-gray-text {
    color: #C6C6C6;
}

.c-green-text {
    color: #29BDB1;
}

.c-blue-text {
    color: #30BEC0;
}

.c-white-text {
    color: #ffffff;
}

/* End Text color CSS */
/* Border CSS */
.b-r-4 {
    border-radius: 4px;
}

.b-r-6 {
    border-radius: 6px;
}

.b-r-top-0 {
    border-radius: 0 0 4px 4px!important;
}

.b-r-bottom-0 {
    border-radius: 4px 4px 0 0!important;
}

.b-grey {
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* End Border CSS */
/* Box-shadow CSS */
.global-shadow {
    -webkit-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    -moz-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    -ms-box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
}

/* End Box-shadow CSS */
/*Text transform css*/
.capitalize-text {
    text-transform: capitalize;
}

.capital-text {
    text-transform: uppercase;
}

.text-italic {
    font-style: italic;
}

.overflow-ellipsis {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}

/*End  text transform css*/
.btn {
    border: 1px solid transparent;
    background-color: transparent;
    font-size: 13px;
    font-weight: 500;
    min-width: 140px;
    padding: 0 15px;
    height: 40px;
    line-height: 38px;
    border-radius: 4px;
    text-align: center;
    text-transform: capitalize;
}

.btn, .btn:hover, .btn:focus, .btn:active {
    -webkit-transition: all .5s ease-in-out;
    -moz-transition: all .5s ease-in-out;
    -ms-transition: all .5s ease-in-out;
    transition: all .5s ease-in-out;
}

.btn.active, .btn:active {
    -webkit-box-shadow: none;
    box-shadow: none;
}

/* Green Button */
.skyblue-btn, .confirm.btn.btn-lg.btn-primary {
    background-color: #30BEC0;
    border-color: #30BEC0;
    color: #ffffff;
}

.skyblue-btn:hover {
    background-color: #1e887f;
    border-color: #1e887f;
    color: #ffffff;
}

.skyblue-border-btn {
    border-color: #30BEC0;
    color: #30BEC0;
}

.skyblue-border-btn:hover {
    border-color: #1e887f;
    color: #1e887f;
}

.skyblue-text-btn {
    color: #30BEC0;
}

.skyblue-text-btn:hover {
    color: #1e887f;
}

.blue-btn {
    background-color: #1A7CA7;
    border-color: #1A7CA7;
    color: #ffffff;
}

/*Height widht */
.height-100 {
    height: 100%;
}

.min-height-100 {
    min-height: 100%;
}

.m-width-140 {
    max-width: 140px;
    width: 100%;
}

.m-width-160 {
    max-width: 160px;
    width: 100%;
}

.width-360 {
    width: 360px;
}

.width-440 {
    width: 440px;
}

.full-width {
    max-width: 100%!important;
    width: 100%;
}

.height-100 {
    height: 100px;
}

.height-80 {
    height: 80px!important;
}

/* Radio Button styling CSS */
/*input[type="radio"], input[type="checkbox"] {
    display: none;
}*/
input[type="checkbox"] {
    display: none;
}


/* Table Section Style Here */

.table-box {
    height: 635px;
    margin: 0 0 20px;
}

table {
    width: 100%;
}
.table-section{
    margin-top: 40px
}

.table-section table th {
    border: 1px solid rgba(112, 112, 112, 0.23);
    text-align: center;
    border-top: 0;
    vertical-align: middle;
    padding: 10px;
    font-size: 12px;
    line-height: 14px;
    color: rgba(106, 106, 106, 0.68);
    font-weight: 300;
}

.table-section table th:first-child,
.table-section table td:first-child {
    border-left: 0px;
}

.table-section table th:last-child,
.table-section table td:last-child {
    border-right: 0px;
}

.table-section table td {
    font-size: 11px;
    font-weight: 300;
    color: rgba(106, 106, 106, 0.55);
    padding: 0 12px;
    border: 1px solid rgba(112, 112, 112, 0.23);
    text-align: center;
    height: 20px;
    vertical-align: middle;
}

.table-section table .blue-bg td,
.table-section table .grey-bg td {
    color: #ffffff;
}

.table-section table td .grey-bg {
    float: left;
    min-width: 43px;
    font-size: 10px;
    height: 17px;
    line-height: 11px;
    border-radius: 24px;
    margin-right: 4px;
}

.table-footer-button .btn {
    height: 32px;
    line-height: 30px;
    margin-right: 10px;
    min-width: auto;
}

.el-tag--success .el-tag__close {
    color: #ffffff !important;
}
.dashboard-right-box {
    margin-bottom: 20px;
}
.left_side_action_btn ,.right_side_action_btn {
    position: absolute;
}
.left_side_action_btn {
    left: 0;
}
.right_side_action_btn {
    right: 0;
}
.show_hide_btn {
    border-radius: 0;
    border: none;
    width: 22px;
    padding: 4px;
}
</style>