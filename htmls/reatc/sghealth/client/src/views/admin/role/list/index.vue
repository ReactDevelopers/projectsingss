<template>
    <lq-el-table name="role" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name"  />
        <el-table-column  prop="title" label="Title" />
        <el-table-column  prop="description" label="Description" />
         <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                icon="el-icon-edit" 
                type="primary"
                :circle="true"
                @click="$router.push('role/'+scope.row.id+'/edit')"/>
                
            </template>
         </el-table-column>
    </lq-el-table>
</template>
<script>
import {list as listApi} from '@/api/role';

export default {
    name: 'role-list',
    methods: {

        request: function (data) {
            return listApi(data)
        }
    }
}
</script>

