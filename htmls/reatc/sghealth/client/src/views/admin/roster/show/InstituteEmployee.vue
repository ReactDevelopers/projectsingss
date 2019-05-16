<template>
    <div>

    <table class="white-bg" >
        <thead>
            <th>Staff</th>
            <th>Can Work At</th>
            <th>Modality</th>
            <th>AHPC</th>
            <th>AHPC Expiry</th>
            <th>Employee ID</th>
            <th>Additional Information</th>
        </thead>
        <tbody>
            <tr  v-for="(employee) in employees"  :key="`institute-employee-list-${employee.id}`">
                <td>{{employee.name}}</td>
                <td>{{employee.can_work_at.map(cwt => cwt.name).join(', ')}}</td>
                <td>{{employee.services.map(service => service.name).join(', ')}}</td>
                <td >{{employee.ahpc}}</td>
                <td :class="hasScheduleClass(employee.id, employee.ahpc_expiry_date)" >{{$root.displayDate(employee.ahpc_expiry_date)}}</td>
                <td>{{employee.employee_id}}</td>
                <td >
                    <div v-if="employee.additional_informations"> 
                        <el-row  :key="`employee_info${index}`" v-for="(info, index) in employee.additional_informations" :gutter="5">
                            <el-col :span="24">
                                <b>{{info.label}}</b> : {{info.value}}
                            </el-col>
                        </el-row>
                    </div>
                    <el-button type="primary" icon="el-icon-edit" circle @click="showPopup(employee)"></el-button>
                </td>
            </tr>
        </tbody>
    </table>

        <el-dialog 
            title="Add/Update Additional Information" 
            :visible="(user? true: false)" 
            width="420px"
            @close="user =null"
            >				
            <additional-info-form v-if="user" @submited-success="additionalInfoAdded" form-name="user_addition_info" :request="requestToUpdateAdditionInfo" />			
        </el-dialog>
        
    </div>
</template>
<script>
import {addAdditionalInfo as addAdditionalInfoApi} from '@/api/users';
import AdditionalInfoForm from '../form/UserAdditionalInfoForm';
import moment from 'moment';

export default {
    name: 'institute-employee-list',
    props: {
        employees: Array,
        workSchedules: Array
    },
    data: function () {

        return {
            user: null
        }
    },
    components: {AdditionalInfoForm},
    computed: {

         /**
         * To Get the schedule list base barnch and service
         */
        employeesSchedule: function () {

          let employeeHasWorkSchedule = {};

           this.workSchedules.map((scheduled) => {

               if(employeeHasWorkSchedule['_'+scheduled.user_id]) {
                   employeeHasWorkSchedule['_'+scheduled.user_id]++;
               }
               else {
                   employeeHasWorkSchedule['_'+scheduled.user_id] = 1;
               }
           })
           return employeeHasWorkSchedule;
        },
    },

    methods: {

        hasScheduleClass: function(user_id, date) {

            let data = {'has-schedule': this.employeesSchedule['_'+user_id] ? true :false }

            const monthDiff = date ? moment(date).diff(moment.now(), 'months', true) : null;
            if(monthDiff !== null && monthDiff <= 6 && monthDiff >= 3) {
                // data.expire_in_six_month = true;
                data = "yellow-bg"
            }
            else if( monthDiff !== null && monthDiff <= 3) {
                // data.expire_in_three_month = true;
                 data = "red-bg"
            }
            return data;
        },
        showPopup: function (user) {

            this.user = user;

            if(this.user.additional_informations) {

                this.$lqForm.initializeValues('user_addition_info', {
                    additional_informations: user.additional_informations
                });
            }
        },
        requestToUpdateAdditionInfo: function (data) {
            
            return addAdditionalInfoApi(this.user.id, data);
        },

        additionalInfoAdded: function (response){

            //this.$emit('update-additional-info', response.data.user);
            this.user.additional_informations = response.data.user.additional_informations;
            this.user = null;
        },        
    }
}
</script>
<style>
    tr.has-schedule {
        background:#e2e2e2
    }
</style>

