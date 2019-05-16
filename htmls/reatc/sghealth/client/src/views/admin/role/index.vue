<template>
    <div>
        <lq-el-tabs name="role" active-tab="role">
            <el-tab-pane label="Role" name="role" v-if="$root.can('role.index')">
                <role-list />
            </el-tab-pane>
            <el-tab-pane label="Permission" name="permission" v-if="$root.can('permission.index')">
                <permission-list />
            </el-tab-pane>
        </lq-el-tabs>
    </div>
</template>
<script>
import RoleList from './list';
import PermissionList from '../permission/list/PermissionList';


export default {
    name: 'role-list-page',
    components: {RoleList, PermissionList},
    data: function () {
        return {
            activeName: 'role',
        };
    }
}
</script>

