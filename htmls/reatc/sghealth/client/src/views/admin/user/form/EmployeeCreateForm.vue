<template>
    <el-form auto-complete="off" label-position="left"  label-width="200px">
        <el-row :gutter="20">
            <el-col :span="12">
                <lq-el-input id="name" label="Name" />
                <lq-el-input id="name_at_work" label="Name At Work" class="margin-30" />
                <lq-el-select 
                id="profession_id"
                label="Profession"
                :request="getProfessionList"
                :remote="true"
                :filterable="true"
                remote-response-path="data.data"
                />
                <lq-el-select 
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
                    id="branch_id"
                    label="Branch"
                    :filterable="true"  
                    :options="branchOptions"
                    @change="branchChange"
                />

                
            
                <lq-el-input id="employee_id" label="Employee Number or ID" :maxlength="20"/>
               
                <mobile-no id="mobile_no" label="Mobile Number" :span="[6,18]" />
                
            </el-col>
            <el-col :span="12">
                <lq-el-input id="email" label="Email"  />
                <lq-el-radio-group 
                    label="AHPC PC"
                    label-key="name"
                    value-key="id"
                    id="ahpc" 
                    :options="[{id:'full',name:'Full'},{id:'conditional',name:'Conditional'},{id:'temporary',name:'Temporary'}]"/>
                <lq-el-date-picker
                    label="AHPC Expiry Date"
                    id="ahpc_expiry_date"
                    format="dd/MM/yyyy"                
                    value-format="yyyy-MM-dd"
                />
                
                <lq-el-select 
                    :multiple="true"
                    id="service_ids"
                    label="Modality Specialized"
                    :request="getServiceList"
                    :filterable="true"
                    :remote="true"
                    remote-response-path="data.data"
                />
                <lq-el-select 
                    id="branch_ids"
                    label="Can work at"
                    :multiple="true"
                    :non-removable="formValues.branch_id ? [formValues.branch_id]: undefined"               
                    :disabled-options="formValues.branch_id ? [formValues.branch_id]: undefined"               
                    :filterable="true"
                    :options="branchOptions"
                />
                
                <lq-el-image 
                    id="profile_image" 
                    label="Profile Image" 
                    :storage-url="$root.storage_url"
                    :rules="{file: {acceptedFiles: 'image/*', minImageDimensions:[200, 200]}}" 
                    :thumbs="[{width: 100, height: 100, type: 'circle'}]"
                    :circle="true"
                    :update-original="true" />
            </el-col>
        </el-row>
       
        
        <el-form-item>
            <lq-el-submit label="Create New Employee" @click="submit"/>
        </el-form-item> 
    </el-form>
</template>
<script>

    import {lqForm} from 'vuex-lq-form';
    import userFormMixin from './userFormMixin';

    export default {
        name: 'edit_user_form',
        mixins:[lqForm, userFormMixin]
    }
</script>
<style>
.margin-30 {
    margin-bottom: 31px;
}
</style>
