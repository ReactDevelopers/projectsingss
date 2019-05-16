<template>
    <el-form>
        <el-row :gutter="10">
            <el-col :span="4">
                <lq-el-input id="name" disabled label="Role Name" />
            </el-col>
            <el-col :span="4">
                <lq-el-input id="title" label="Role Title" />
            </el-col>
            <el-col :span="5">
                <lq-el-input id="landing_page" label="Landing Page" />
            </el-col>
            <el-col :span="5">
                <lq-el-input id="settings.landing_uri" label="Landing Page Sub Path " />
            </el-col>
            <el-col :span="6">
                <lq-el-select 
                    id="client_ids" 
                    label="Choose Allowed Portal"
                    :multiple="true"
                    store-key="table.oauth_client_drop_down.data"
                />
            </el-col>
        </el-row>
        
        <lq-el-input id="description" label="Description" type="textarea" />

        <!-- Limitation Dialog -->
        <el-dialog
            width="30%"
            title="Change Limitation"
            :visible.sync="showpopup"
            append-to-body>

            <field-authority-form :permission="selected_permission" :formName="formName" />
            <div slot="footer" class="dialog-footer">
                <el-button type="primary" @click="showpopup = false">Ok</el-button>
            </div>
        </el-dialog>
        <!-- End Limitation Dialog -->
       <!-- Permission List Card -->
       <el-row :gutter="20" :style="{marginBottom: '10px'}">
           <el-col :span="12" >
                <h2 :style="{margin: 0}">Access Permissions</h2>
           </el-col>
           <el-col :span="6" align="right">
               
                <el-select v-model="filter.security" clearable filterable   placeholder="Public Or Private">
                   <el-option
                        v-for="item in public_private_options"
                        :key="item.id"
                        :label="item.name"
                        :value="item.id">
                    </el-option>
               </el-select>
           </el-col>
            <el-col :span="6" align="right">
               <el-select v-model="filter.permission_group" clearable filterable  multiple placeholder="Permission Groups">
                   <el-option
                        v-for="item in permissionGroups"
                        :key="item.id"
                        :label="item.name"
                        :value="item.id">
                    </el-option>
               </el-select>
           </el-col>
       </el-row>
       <el-row :gutter="20">
           <el-col :span="6" :xs="24" v-for="(group) in permissionGroups.filter(groupFilter)" :key="`permission_group${group.id}`">
               <div :style="{marginBottom: '20px'}">
                    <el-card class="permisions_list_card">
                        <div slot="header" class="clearfix">
                            <el-checkbox 
                                :indeterminate="isIndeterminate(group.id.toString())" 
                                v-model="checkedAllGroup[group.id.toString()+'_']"
                                @change="handleCheckAllChange(group.id.toString())" 
                            >
                                <span :title="group.name">
                                    {{group.name}}
                                    <!-- Display the count ALl/Selecct permission -->
                                    <span class="premision_count_wrap">
                                        <span class="total_permision_in_group">
                                            {{group.permission_size}}
                                        </span>
                                        <span class="separator">/</span>
                                        <span class="no_of_selected_permision_in_group">
                                            {{noOfSelectedPermissionInGroup(group.id.toString())}}
                                        </span>
                                    </span>
                                    <!-- End Count -->
                                </span>
                            </el-checkbox>
                        </div>
                        <el-scrollbar :style="{height: '200px'}">
                            <div :key="`permission_${permission.id}`" v-for="(permission) in getGroupPermissions(group.id)" >
                                <lq-el-checkbox 
                                    :id="`permissions.${permission.name.toString().replaceAll('.','_')}`"
                                    :label="permission.name"
                                    :true-value="{permission_id: permission.id}"
                                    :false-label="null"
                                    :is-initial-value="false"
                                    @change="changePermission"
                                >
                                    <template slot-scope="scope">
                                        
                                        <span :style="labelStyle(permission)">{{permission.title ? permission.title : permission.name}}</span>
                                        <i v-if="scope.value && hasTag(permission)" class="el-icon-edit" @click="($event) => showLimitationPopup($event, permission)"></i>

                                        &nbsp; <a href="javascript:void(0)" @click="$emit('edit-permission', permission.id)"><i class="el-icon-info"></i></a>
                                    </template>
                                </lq-el-checkbox>
                            </div>
                        </el-scrollbar>
                    </el-card>
               </div>
           </el-col>
       </el-row>
        <!-- End Permission List Card -->
        <el-form-item >
        <lq-el-submit label="Update" @click="submit" />
        </el-form-item>
    </el-form>
</template>
<script>
    
    import {lqForm} from 'vuex-lq-form';
    import {list as PermissionListApi} from '@/api/permission';
    import {list as ClientListApi} from '@/api/oauthClient';
    import FieldAuthorityForm from './FieldAuthorityForm';

    export default {
        name: 'role-form',
        mixins:[lqForm],
        components:{FieldAuthorityForm},
        props: {
            permissions: Object,
        },
        data: function () {
            return {
                selected_permission: null,
                showpopup: false,
                excludeInput:[
                    'created_at',
                    'updated_at',
                    'permission_group_filter'
                ],
                checkedAllGroup: {},
                public_private_options: [
                    {id: 'public', name: 'Public'},
                    {id: 'private', name: 'Private'},
                ],
                filter: {
                    permission_group: [],
                    security: null
                }
            }
        },
        created: function () {
            
            this.$lqTable.fetchListData('oauth_client_drop_down', ClientListApi,{
                data_key: 'data.data',
            })
        },
        computed: {

            permissionGroups: function () {

                const group_ids = Object.keys(this.permissions);
                let groups = [];
                group_ids.map((group_id) => {
                    let permission_group = this.permissions[group_id][0].permission_group;
                    permission_group.permission_size = this.permissions[group_id].length;
                    groups.push(permission_group);
                    return group_id
                })
                return groups;
            }
        },
        methods: {

            showLimitationPopup: function (event, permission) {
                event.preventDefault();
                this.selected_permission = permission;
                this.showpopup = true
            },
            changePermission: function(event) {

                if(!event.value && this.selected_permission && event.trueValue.permission_id === this.selected_permission.id) {
                    this.selected_permission = null;
                }
            },
            hasTag: function (permission) {
                const tags = this.$helper.getProp(permission, 'limitations.tags', []);
                return tags && this.$helper.isArray(tags) && tags.length > 0 ? true : false
            },
            labelStyle: function (permission) {
                return this.hasTag(permission) ? {color: '#af0e0e'} : (permission.is_public === 'Y' ? {color: 'green'} : {})
            },
            /**
             * Check Filter
             */
            isbaseOnFilter: function (permission) {
                
                const filter = this.filter.security;
                if(filter) {

                    if(filter === 'public' && permission.is_public === 'Y') {
                        return true;
                    }
                    else if(filter == 'private' && permission.is_public === 'N') {
                        return true;
                    }
                    else {
                        return false
                    }
                }
                return true;
            },
            getGroupPermissions: function (group_id) {
                let permissions = this.$helper.getProp(this.permissions, group_id.toString(), []);
                return permissions.filter(this.isbaseOnFilter)
            },

            groupFilter: function (group){
                return this.filter.permission_group.length === 0 || this.filter.permission_group.includes(group.id) ? true : false;
            },
            /**
             * Check all permissions have been selected of the given group.
             * @param group_id Permission Group Id
             * @return (Boolean)
             */
            isIndeterminate: function(group_id) {

                let group_permissions = this.permissions[group_id].map((permission) => {

                    return permission.name.toString().replaceAll('.', '_')
                });

                let group_selected_permission = this.noOfSelectedPermissionInGroup(group_id);

                const out =  group_permissions.length === group_selected_permission || group_selected_permission === 0 ? false : true;


                if(!out && group_permissions.length === group_selected_permission) {
                    this.checkedAllGroup[group_id+'_'] = true;
                }
                return out
            },

            /**
             * Get How many permission has been selected in a group
             * @param group_id 
             */
            noOfSelectedPermissionInGroup: function (group_id) {

                let selected_permissions = Object.keys( this.$helper.getProp(this.formValues, ['permissions'], []));
                let group_selected_permission = 0;

                // Array Contains the name of permission in given Group
                let group_permissions = this.permissions[group_id].map((permission) => {

                    return permission.name.toString().replaceAll('.', '_')
                });

                selected_permissions.map((sp) => {
                    
                    if(group_permissions.indexOf(sp) !== -1) {
                        group_selected_permission++;
                    }
                    return sp;
                })

                return group_selected_permission;
            },
            /**
             * To check and uncheck all
             */
            handleCheckAllChange: function (group_id) {

                const isChecked = this.checkedAllGroup[group_id+'_'];
                if(isChecked === true) {

                    this.permissions[group_id].map((permission) => {

                        this.$lqForm.setElementVal(this.formName, `permissions.${permission.name.toString().replaceAll('.','_')}`, {permission_id: permission.id});
                    });
                }
                else {
                     this.permissions[group_id].map((permission) => {
                        
                        this.$lqForm.removeElement(this.formName, `permissions.${permission.name.toString().replaceAll('.','_')}`);

                     });
                }
            }
        }
    }
</script>

<style>
    .permisions_list_card .el-form-item {
        margin-bottom: 1px;
    }
    .permisions_list_card .el-radio-button--mini .el-radio-button__inner  {
        padding: 7px 7px;
    }
    .permisions_list_card .el-card__header {
        padding: 6px 20px;
    }
    .permisions_list_card .el-card__header  .permission_group_cell {
        margin-top: 7px;
    }
    .permisions_list_card .el-card__body {
        padding: 6px 15px 10px 19px;
    }
</style>
