<template>
    <div>
        <el-dialog
            title="Update Permission Information" 
            width="60%"
            :visible="(edit_permission ? true : false)" 
            @close="edit_permission = null">
            <permission-form 
                form-name="permision_form" 
                v-if="edit_permission"
                :request="updatePermissionRequest" 
                @submited-success="permissionUpdated" 
            />
        </el-dialog>   
        <role-form :formName="formName" 
            :permissions="groupPermissions" 
            :request="request" 
            @edit-permission="openDialog"
            @submited-success="success" />
    </div>
</template>

<script>
import roleForm from './form';
import {get as getRoleApi, update as updateApi} from '@/api/role';
const _ = require('lodash');
import {get as getPermissionApi, update} from '@/api/permission';
import permissionForm from '../permission/form/PermissionForm';

export default {
    name: 'role-edit-page',
    components: {roleForm, permissionForm},
    data: function () {

        return {
            formName: 'role',
            permissions: [],
            edit_permission: null
        }
    },
    computed:  {

        groupPermissions: function () {

            return _.groupBy(this.permissions, 'permission_group_id');
        }
    },

    created: function ( ) {

        const id = this.$route.params.id

        getRoleApi(id)
            .then((res) => {
                this.$lqForm.initializeValues(this.formName, res.data.role);
                this.permissions = this.$helper.getProp(res, 'data.permissions', []);               
            })
    },
    methods: {

        request: function (data) {
            
            const id = this.$route.params.id
            return updateApi(id, data)
        },
        success: function (resposne) {
            this.$router.push('/role', () => {

                this.$message.success('Role has been updated.');
            })
        },

        /**
         * APi to Update the permission Information.,
         */
        updatePermissionRequest: function (data) {
            return update(this.edit_permission.id, data);
        },
        permissionUpdated: function (resposne) {

            this.permissions.map((permission) => {

                if(permission.id === resposne.data.permission.id) {

                    permission.title = resposne.data.permission.title;
                    permission.description = resposne.data.permission.description;
                    permission.is_public = resposne.data.permission.is_public;
                    permission.permission_fields = resposne.data.permission.permission_fields;
                    permission.permission_group = resposne.data.permission.permission_group;
                    permission.permission_group_id = resposne.data.permission.permission_group_id;
                    permission.limitations = resposne.data.permission.limitations;
                }
            })
            this.edit_permission = null;
            this.$lqForm.deleteForm('permision_form');
        },
        openDialog: function (permission_id) {

            getPermissionApi(permission_id).then((response) => {
                this.edit_permission  = response.data.permission;
                this.$lqForm.initializeValues('permision_form', this.edit_permission)
            })
        }
    }
}
</script>
