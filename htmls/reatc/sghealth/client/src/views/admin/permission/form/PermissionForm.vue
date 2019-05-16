<template>
    <el-form  auto-complete="on" position="top">
        <el-row :gutter="10">
            <el-col :span="12">
                <lq-el-select 
                    id="permission_group" 
                    label="Permission Group"
                    :request="getPermissionGroup"
                    :filterable="true"
                    :remote="true"
                    :options="formValues.permission_group"
                    remote-response-path="data.data"
                    value-format="object"
                    :allow-create="true"
                    size="large"
                />
            </el-col>
            <el-col :span="12">
                <lq-el-input id="name" :disabled="true" label="Router Name" />
            </el-col>
        </el-row>        
        <el-row :gutter="10">
            <el-col :span="12">
                <lq-el-select 
                    id="limitations.permission_action" 
                    label="Permission Response As"
                    @change="changePermissionAction"
                    :options="permision_action_options"
                />
            </el-col>
            <el-col :span="12">
                 <lq-el-select 
                    id="limitations.tags" 
                    label="Security Tags"
                    :filterable="true"
                    :multiple="true"
                    :allow-create="true"
                />
            </el-col>
        </el-row>
        <el-row :gutter="10">
            <el-col :span="12">
                <lq-el-input id="title" label="Permission Title" />
            </el-col>
            <el-col :span="12">
                <lq-el-input id="description" label="Description" type="text" />
            </el-col>
        </el-row>
        <el-row :gutter="10">
            <el-col :span="12">
                <lq-el-radio-group id="limitations.drop_down_enable"
                    :disabled="($helper.getProp(formValues, 'limitations.permission_action') !== 'list')"
                    :button="true"
                    label="Is this using for dropdown"
                    :options="[{value: 'Y', label: 'Yes'}, {value: 'N', label: 'No'}]" 
                />
            </el-col>
            <el-col :span="12">
                <lq-el-radio-group id="is_public"
                    :button="true"
                    label="Security"
                    :options="[{value: 'Y', label: 'Public'}, {value: 'N', label: 'Private'}]" 
                />
            </el-col>
        </el-row>

         <!-- <lq-el-select 
            id="encrypted" 
            label="Encrypted"
            :multiple="true"
            :options="[{name: 'Response', id: 'Response' }, {name: 'Request', id: 'Request' }]"
        /> -->
       
        <div v-if="['show', 'update'].includes($helper.getProp(formValues, 'limitations.permission_action'))">
            <h3>Data Fields:  <el-button type="primary" @click="push('permission_fields', {})" icon="el-icon-plus" circle></el-button></h3>
            <el-row :gutter="10" v-for="(field, index) in getElement('permission_fields', null)" :key="`limitations.field${index}`">
                <el-col :span="7">
                    <lq-el-input :id="`permission_fields.${index}.title`" label="Title" />
                </el-col>
                <el-col :span="6">
                    <lq-el-input :id="`permission_fields.${index}.client_field`" label="Client Field" />
                </el-col>
                <el-col :span="9">
                    <lq-el-select 
                    :id="`permission_fields.${index}.table_columns`" 
                    label="Table Column"
                    :filterable="true"
                    :multiple="true"
                    :allow-create="true"
                />
                </el-col>
                <el-col :span="2" align="right">  
                    <br>
                    <br>          
                    <el-button type="danger" @click="remove(`permission_fields.${index}`)" icon="el-icon-delete" circle></el-button>
                </el-col>
            </el-row>
        </div>
        
        <el-form-item>
        <lq-el-submit label="Update" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>

    import {lqForm} from 'vuex-lq-form';
    import {list as PermissionGroupListApi} from '@/api/permissionGroup';

    export default {
        name: 'login-form',
        mixins:[lqForm],
        data: function () {

            return {
                excludeInput: ['permission_group_id','created_at', 'updated_at', 'id'],
                content: null,
                permision_action_options: [
                    {name: 'List', id: 'list' }, 
                    {name: 'Show', id: 'show' }, 
                    {name: 'Create', id: 'create' }, 
                    {name: 'Update', id: 'update' }, 
                    {name: 'Delete', id: 'delete' }, 
                    {name: 'Restore', id: 'restore' }, 
                    {name: 'Other', id: 'other' }
                ]
            }
        },
        methods: {
            /**
             * To get the permission Group list from server.
             */
            getPermissionGroup: function(query) {

                return PermissionGroupListApi({search: query})
            },
            changePermissionAction: function (val) {
                
                if(!this.formValues.title) {
                    this.$lqForm.setElementVal(this.formName, 'title', val);
                }

                if(!this.formValues.description) {
                    this.$lqForm.setElementVal(this.formName, 'description', val);
                }
            }
        }
    }
</script>
