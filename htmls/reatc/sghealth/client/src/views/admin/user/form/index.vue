<template>
<el-row>
    <el-col :span="20">
        <el-form auto-complete="on" label-width="300px">
            <lq-el-input id="name" label="Name" />
            <lq-el-input id="name_at_work" label="Name At Work"/>
            <lq-el-select 
                v-if="formValues.role_id == 3  || formValues.role_id == 4  "
                id="profession_id"
                label="Profession"
                :request="getProfessionList"
                :remote="true"
                :filterable="true"
                :options="$helper.getProp(formValues, 'profession', null)"
                remote-response-path="data.data"
            />
            <lq-el-select 
                v-if="formValues.role_id == 3  || formValues.role_id == 4"
                id="institute_ids"
                label="Institution"
                :request="getInstituteList"
                :filterable="true"
                :remote="true"
                :multiple="true"
                @change="instituteChange"
                :options="$helper.getProp(formValues, 'institute', [])"
                remote-response-path="data.data"
            />
            <lq-el-select 
                v-if="formValues.role_id == 3  || formValues.role_id == 4"
                id="branch_id"
                label="Branch"
                :filterable="true"  
                :options="branchOptions"
                @change="branchChange"
            />
            <lq-el-select 
                v-if="formValues.role_id == 3  || formValues.role_id == 4"
                id="branch_ids"
                label="Can work at"
                :multiple="true"
                :non-removable="formValues.branch_id ? [formValues.branch_id]: undefined"               
                :filterable="true"
                :options="branchOptions"
                :disabled-options="formValues.branch_id ? [formValues.branch_id]: undefined"
            />
            <lq-el-input id="employee_id" label="Employee Number or ID" :maxlength="20"/>
            <lq-el-input id="email" label="Email"  />
            <mobile-no id="mobile_no" label="Mobile Number" />
            <lq-el-radio-group 
                label="AHPC PC"
                label-key="name"
                value-key="id"
                id="ahpc" 
                v-if="formValues.role_id == 3  || formValues.role_id == 4"
                :options="[{id:'full',name:'Full'},{id:'conditional',name:'Conditional'},{id:'temporary',name:'Temporary'}]"/>
            <lq-el-date-picker
                label="AHPC Expiry Date"
                v-if="formValues.role_id == 3  || formValues.role_id == 4"
                id="ahpc_expiry_date"
                format="dd/MM/yyyy"                
                value-format="yyyy-MM-dd"
            />
            <lq-el-image 
                id="profile_image" 
                label="Profile Image" 
                :storage-url="$root.storage_url"
                :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[200, 200]}}" 
                :thumbs="[{width: 100, height: 100, type: 'circle'}]"
                :circle="true"
                :update-original="true" />
            <lq-el-select 
                v-if="formValues.role_id == 3  || formValues.role_id == 4"
                :multiple="true"
                id="service_ids"
                label="Modality Specialized"
                :request="getServiceList"
                :filterable="true"
                :remote="true"
                :options="$helper.getProp(formValues, 'services', [])"
                remote-response-path="data.data"
            />
          
            <el-form-item>
                <lq-el-submit label="Update" @click="submit"/>
            </el-form-item> 
        </el-form>
    </el-col>
</el-row>
    
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    import userFormMixin from './userFormMixin';

    export default {
        name: 'edit_user_form',
        mixins:[lqForm, userFormMixin],
        data:function(){
            return {
                excludeInput: ['created_at', 'updated_at', 'id','certificates','status','profession','email_verified_at','mobile_code','mobile_number','branch','services','can_work_at','profile_pic_id','institute','role_id']
            }
        }
    }
</script>