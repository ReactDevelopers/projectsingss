<template>
    <el-form>
        <el-row :gutter="20">
			<el-col :span="6">
				<lq-el-select 
                    :disabled="(defaultInstitute? true : false)"
	                id="institute_id"
	                label="Institution"
	                :request="getInstituteList"
	                :input-width="50"
	                :filterable="true"
	                :remote="true"
	                remote-response-path="data.data"
	                @change="changeInstitute"
	            />
			</el-col>
			<el-col :span="6">
				<lq-el-date-picker 
                    :disabled="(defaultInstitute? true : false)"
					id="month"
					type="month"
					format="MMMM, yyyy"
					value-format="yyyy-MM"
					@change="changeMonth"
					label="Planning Month"
				/>
			</el-col>

			<el-col :span="6">
				<el-form-item label="Employee">
					<el-select v-model="selected_employees" multiple @change="filterEmployees" placeholder="Select Employees">
						<el-option
						v-for="(employee) in employees"
						:key="`emp_drop${employee.id}`"
						:label="employee.name"
						value-key="id"
						:value="employee.id">
						</el-option>
					</el-select>
				</el-form-item>
			</el-col>

            <el-col :span="6" align="right">
                <br>
                <br>
                <el-button type="primary" circle @click="exportExcel" icon="el-icon-download" />
            </el-col>
		</el-row>
    </el-form>
</template>

<script>
import { lqForm } from 'vuex-lq-form';
import {list as instituteListApi, get as getInstituteApi, employeeList} from '@/api/institute';
import {list as workScheduleListApi} from '@/api/roster';
const FileDownload = require('js-file-download');
export default {

    name: 'roster-filter-form',
    mixins:[lqForm],
    props: {
        defaultInstitute: Number,
        defaultMonth: String,
    },
    data: function (){

        return {
            employees: [],
            institute: null,
            selected_employees: []
        }
    },
    created: function () {

        if(this.defaultInstitute) {

            this.$lqForm.setElementVal(this.formName, 'institute_id', this.defaultInstitute);
            this.changeInstitute();
        }

        if(this.defaultMonth) {

            this.$lqForm.setElementVal(this.formName, 'month', this.defaultMonth);
            this.changeMonth();
        }
    },
    methods: {

        /**
         * Catch event when user make the user selection.
         */
        filterEmployees: function (selectedEmps) {
                            
            if(!selectedEmps || selectedEmps.length ===0) {

                this.$emit('change-selected-employees', []);
                return;
            }

            let employees = [];
            this.employees.map((employee) => {

                selectedEmps.map((selectedEmp) => {
                    if(selectedEmp === employee.id) {
                        employees.push(employee);
                    }
                })
            })

            this.$emit('change-selected-employees', employees);
        },

        /**
         * To get the institute list from server.
         */
        getInstituteList: function(query) {
                
            return instituteListApi({search: query})
        },

        /**
         * Catch the event when the institute changes and get the branches of selected 
         * institute
         * @return {void}
         */
        changeInstitute: function () {

            const institute_id =  this.$helper.getProp(this.formValues, 'institute_id', null);

            if(institute_id) {

            getInstituteApi(institute_id)
            .then((response) => {
                
                    this.institute = this.$helper.getProp(response, 'data.institute', null)

                    // this.initialSelectedBranch();
                    this.$emit('change-institute', this.institute);
                    // // Get the Work schedule of Selected month institute
                    // this.fetchWorkScheduleList();
                    this.fetchEmployeeList();

                    if(this.defaultInstitute) {

                        this.$lqForm.addProp(this.formName, 'institute_id', 'selected',   this.institute);
                    }
                })
                
                return;
            }
            
            this.employees = [];
            this.selected_employees = [];
            this.$emit('change-employees', this.employees);
            this.$emit('change-selected-employees', []);
            this.$emit('change-institute', null);
        },

        /**
         * get Employee list of selected institute.
         */
        fetchEmployeeList: function () {

            employeeList(this.institute.id, {}).then( (response) => {

                this.employees  = this.$helper.getProp(response, 'data.employees', []);

                this.$emit('change-employees', this.employees);
            })
        },

        /**
         * Catch the event when the month changes
         * @return {void}
         */
        changeMonth: function () {

            const month = this.$helper.getProp(this.formValues, 'month', null);
            this.$emit('change-month', month);
        },
        
        /**
         * Export Data
         */
        exportExcel: function() {
            const institute_id = this.$helper.getProp(this.formValues, 'institute_id');
            const month = this.$helper.getProp(this.formValues, 'month');

            if(institute_id && month) {

                workScheduleListApi({
                    institute_id,
                    month,
                    export: 'excel'
                }, 'arraybuffer').then((response) => {

                    FileDownload(response, 'roster.xlsx');
                })

                return;
            }

            this.$message.error('Please Select institute and Month.');
        },

    },

    watch: {

        defaultInstitute: function (institute_id) {

            this.$lqForm.setElementVal(this.formName, 'institute_id', institute_id);
            this.changeInstitute();
        },
        defaultMonth: function(month) {
            this.$lqForm.setElementVal(this.formName, 'month', month);
            this.changeMonth();
        }
    }
}
</script>
