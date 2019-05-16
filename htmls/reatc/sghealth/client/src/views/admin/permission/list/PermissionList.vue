<template>
    <div>
        <permission-upload />
        <lq-el-table name="permission" :request="request">
            <lq-el-table-index />        
            <el-table-column  prop="name" label="Route Name"  />
            <el-table-column  prop="title" label="Title" />
            <el-table-column  prop="permission_group" label="Group" >
                <template slot-scope="scope">
                    {{$helper.getProp(scope, 'row.permission_group.name' , null) }}
                </template>
            </el-table-column>
            <el-table-column  prop="encrypted" label="Encrypted" >
                <template slot-scope="scope">
                    {{encrypted(scope)}}
                </template>
            </el-table-column>

            <el-table-column  align="right">
                <template slot="header" slot-scope="scope">
                    <lq-table-form>
                        <lq-el-input id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                    </lq-table-form>
                </template>

                <template slot-scope="scope">
                    <el-button
                    icon="el-icon-edit" 
                    type="primary"
                    :circle="true"
                    @click="$router.push('/role/permission/'+scope.row.id+'/edit')"/>

                    <el-button
                    icon="el-icon-delete" 
                    type="danger"
                    :circle="true"/>
                </template>
            </el-table-column>
        </lq-el-table>
    </div>
</template>
<script>
import {list as listApi} from '@/api/permission';
import PermissionUpload from '../form/PermissionUploadForm';
export default {
    name: 'permission-list',
    components: {PermissionUpload},
    methods: {

        request: function (data) {
            return listApi(data)
        },
        encrypted: function (scope) {

            let encrypted = this.$helper.getProp(scope,'row.encrypted', null);
            return encrypted ? encrypted.join(', ') : null;
        }

    }
}
</script>

