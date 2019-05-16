<template>
    <div>
        
    <table class="white-bg license_table">
        <thead>
            <tr>
                <th>Licenses</th>
                <th :colspan="branchHeadingColSpan">
                    <el-dropdown :hide-on-click="false" trigger="click">
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
            </tr>
            <tr>
                <th>
                    - 
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
                                format="dd/MM/yyyy"
                                value-format="yyyy-MM-dd"
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
        </thead>

        <!-- Branch Linceses -->
        <tbody>
            <tr v-for="(branch_license ) in branchLicenses" :key="`branch_license_row${branch_license.institute_license_id}`">
                <td> 
                    {{branch_license.license_name}} 
                    <i class="el-icon-close" @click="deleteLicense(branch_license,'branch')"></i>
                </td>

                <td :class="dateRowClass(expiry_dates[`_branch_${ branch_license.institute_license_id}_${branch.id}`])"  :key="`branch_license_expiry_${branch.id}`"  :colspan="branch.services.length" v-for="(branch) in selectedBranches"> 
                    <el-date-picker
                        v-model="expiry_dates[`_branch_${ branch_license.institute_license_id}_${branch.id}`]"
                        value-format="yyyy-MM-dd"
                        format="dd/MM/yyyy"
                        @change="(date) => updateExpiryDate(date, {
                            branch_id: branch.id, 
                            institute_license_id: branch_license.institute_license_id,
                            license_id: branch_license.license_id,
                        })"
                        type="date"
                        placeholder="Pick a day" />
                </td>
            </tr>
        </tbody>

        <!-- End Branch Linceses -->
        
        <!-- Service Lincenses -->
        <thead>
            <tr>
                <td>-</td>
                <th
                    :key="`service_license_header_expiry_${service.branch.id}_${service.id}`" 
                    v-for="(service) in selectedBrancheServices"
                >
                    {{service.name}}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(service_license ) in serviceLicenses" :key="`service_license_row${service_license.institute_license_id}`">
                <td> 
                    {{service_license.license_name}} 
                    <i class="el-icon-close" @click="deleteLicense(service_license, 'service')"></i>
                </td>
                <td
                    :class="dateRowClass(expiry_dates[`_service_${ service_license.institute_license_id}_${service.branch.id}_${service.id}`])"
                    :key="`service_license_${service.branch.id}_expiry_${service.id}`" 
                    v-for="(service) in selectedBrancheServices"
                >
                    <el-date-picker
                        v-model="expiry_dates[`_service_${ service_license.institute_license_id}_${service.branch.id}_${service.id}`]"
                        value-format="yyyy-MM-dd"
                        format="dd/MM/yyyy"
                        @change="(date) => updateExpiryDate(date, {
                            branch_id: service.branch.id, 
                            service_id: service.id,
                            institute_license_id: service_license.institute_license_id,
                            license_id: service_license.license_id,
                        })"
                        type="date"
                        placeholder="Pick a day" />
                </td>
            </tr>
        </tbody>
        <!-- End Service Linceses -->
        <tfoot>
            <tr>
                <th><el-button v-if="$root.can('institute-license.store')" type="primary" @click="showLicenseAttachBox=true" icon="el-icon-plus" circle></el-button></th>
                <th :colspan="branchHeadingColSpan">

                </th>
            </tr>
        </tfoot>
    </table>
    <el-dialog 
        title="Attach License" 
        :visible="showLicenseAttachBox" 
        width="300px"
        @close="showLicenseAttachBox = false">				
            <create-branch-license 
                v-if="institute && showLicenseAttachBox" 
                :request="createReq" 
                :institute="institute" 
                @submited-success="successInAddLicense"
                form-name="branch_license" 
            />    
    </el-dialog>
        
    </div>
</template>
<script>

import branchServiceDisplayHelper from '../mixins/branchServiceTable';
import {update as updateApi, create as createApi, list as listApi, destroy as deleteLicenceApi} from '@/api/instituteLicense';
import createBranchLicense from '../form/CreateBranchLicense';
import moment from 'moment';

export default {
    name: 'institute-license',
    components: {createBranchLicense},
    props: {
        institute: Object,
        licenses: Array,
        institute_license_expity_dates: Array
    },
    mixins:[branchServiceDisplayHelper],
    data: function (){

        return {
            showLicenseAttachBox: false,
            expiry_dates: {}
        }
    },
    created: function () {

        this.initialSelectedBranch();
        this.assignExpiryDate();
    },

    computed: {
        
        branchHeadingColSpan: function () {
            let col_span = 0;

            this.selectedBranches.map((branch) => {
                col_span += branch.services.length;
            })

            return col_span;
        },
        /**
         * Get the Branch Licenses
         */
        branchLicenses: function () {
            
            let lincenses = [];

            this.licenses.map((license) => {

                if(license.pivot.is_branch_license === 'Yes') {
                    
                    lincenses.push({
                        license_id: license.id,
                        license_name: license.name,
                        institute_license_id: license.pivot.id,
                    })
                }
            })
            return lincenses;
        },

        /**
         * Get Service Licenses
         */
        serviceLicenses: function () {
            
            let lincenses = [];

            this.licenses.map((license) => {

                if(license.pivot.is_service_license === 'Yes') {
                    
                    lincenses.push({
                        license_id: license.id,
                        license_name: license.name,
                        institute_license_id: license.pivot.id,
                    })
                }
            })
            return lincenses;
        }
    },

    methods: {
        /**
         * Update Expiry Date
         */

        updateExpiryDate: function (date, license) {
            
            const request_data = {
                expiry_date: date,
                ...license
            }
            updateApi(license.institute_license_id, request_data).then((response) => {
                
            })
            this.$emit('expiry-update', license.institute_license_id, date);
        },
        /**
         * When License has attached successfully with institute.
         */
        successInAddLicense: function (response) {
            //
            
            this.$emit('license-created', response);
            this.showLicenseAttachBox = false
        },

        /**
         * Attach License Api.
         */
        createReq: function (data) {
            return createApi(data)
        },

        /**
         * To Assign the Expire date in every cell
         */
        assignExpiryDate: function () {

            let expiry_dates = {};
            this.institute_license_expity_dates.map(function(license) {
                
                if(!license.expiry_date) {
                    return;
                }
                
                if(!license.service_id) {
                    expiry_dates[`_branch_${ license.institute_license_id}_${license.branch_id}`] = license.expiry_date;

                } else{

                    expiry_dates[`_service_${license.institute_license_id}_${license.branch_id}_${license.service_id}`]  = license.expiry_date;
                }
            })

            this.expiry_dates   = {...expiry_dates};
        },

        dateRowClass: function (date) {
            
            let data = {nospacing: true};
            const monthDiff = date ? moment(date).diff(moment.now(), 'months', true) : null;
            if(monthDiff !== null && monthDiff <= 6 && monthDiff >= 3) {
                data.expire_in_six_month = true;
            }
            else if( monthDiff !== null && monthDiff <= 3) {
                data.expire_in_three_month = true;
            }

            return data;
        },

        /**
         * To Delete the Institute License
         */
        deleteLicense: function (license, delete_for) {

            this.$confirm('This will permanently delete. Continue?', 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
                
            }).then(() => {
                
                const loading = this.$loading({
                    lock: true,
                    text: 'Deleting...',
                });
                 deleteLicenceApi(license.institute_license_id, {delete_for})
                    .then((response) => {

                        this.$emit('license-deleted', response)
                        loading.close()
                    })
                    .catch(() => {
                        loading.close()  
                    })
            })           
        }
    },
    watch: {

        institute: {

            handler(newval, oldval){

                if( !newval || !oldval || newval.id !== oldval.id ) {
                    this.initialSelectedBranch();
                }
            },
            deep: true
        },

        institute_license_expity_dates: {

            handler(newval, oldval){

                this.assignExpiryDate();
            },
            deep: true
        }
    }
}
</script>

<style>

th.nospacing, td.nospacing { padding: 0; border-spacing: 0; }
.license_table .el-date-editor {
    width: 100%;
    min-width: 135px;
}
.license_table .el-date-editor .el-input__inner {
    border: none;

}
.expire_in_three_month, .expire_in_three_month input {
    background: red;
    color: #fff;
}
.expire_in_six_month, .expire_in_six_month input {
    background: yellow;
    color: #000;
}
</style>
