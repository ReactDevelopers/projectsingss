<template>
    
    <lq-el-table name="notification_template" :request="request" :defaultSort="{prop: 'type', order: 'ascending'}">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name" sortable="custom" />
        <el-table-column  prop="subject" label="Subject" sortable="custom" />
        <el-table-column  prop="type" label="Type"
        :filters="[{text: 'SMS', value: 'sms'}, {text: 'Email', value: 'email'}]"        
        :filter-multiple="true"
        sortable="custom"
        column-key="type"
        :filtered-value="$lqTable.getElemnetVal('notification_template_list', 'type')"
        />
        <el-table-column label="Variables">
            <template slot-scope="scope">
                <el-tag type="success" size="small" v-for="(variable) in $helper.getProp(scope,'row.options.variables',[])" :key="`${scope.row.id}.${variable}`" >{{variable}}</el-tag>
                <!-- {{ $helper.getProp(scope, 'row.options.variables', [] ).join(', ')}} -->
            </template>
        </el-table-column>
        <el-table-column align="right">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                v-if="$root.can('notification-template.update')"
                icon="el-icon-edit" 
                type="primary"
                :circle="true"
                @click="$router.push('notification-template/'+scope.row.id+'/edit')"/>
                <!-- <el-button
                icon="el-icon-delete" 
                type="danger"
                :circle="true"/> -->
            </template>
         </el-table-column>
    </lq-el-table>
</template>
<script>

import {list as NotificationTemplateList} from '@/api/notificationTemplate';

export default {
    name : 'notification-template-list',
    data: function () {

        return {
            search: ''
        }
    },
    methods :{
        
        request :function(data){
            return NotificationTemplateList(data);
        }
    }
}
</script>

