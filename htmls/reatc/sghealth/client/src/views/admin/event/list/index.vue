<template>
    <lq-el-table :name="tableName" :request="request">
        <lq-el-table-index />
        <el-table-column   label="Manager" sortable="custom"  >
            <template slot-scope="scope">
                {{scope.row.manager_id ? $helper.getProp(scope.row, 'manager.name', '-') : $helper.getProp(scope.row, 'manager_email', '-') }}
            </template>
        </el-table-column>
        <el-table-column  prop="title" label="Title" sortable="custom"  />
        <el-table-column  label="Description" sortable="custom"  >
            <template slot-scope="scope">
                <p v-html="scope.row.description"></p>
            </template>
        </el-table-column>
        <el-table-column  prop="event_date" label="Event Date" sortable="custom"  />
        
        <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                    @click="$router.push('event/:id/view'.replace(':id', $helper.getProp(scope, 'row.id', null)))"
                    icon="el-icon-view" 
                    type="primary"
                    :circle="true"/>
                <el-button
                    icon="el-icon-edit" 
                    type="primary"
                    :circle="true"
                    @click="$router.push('event/:id/edit'.replace(':id', $helper.getProp(scope, 'row.id', null)))"/>
                <el-button
                    @click="deleteEvent(scope.row)"
                    icon="el-icon-delete" 
                    type="danger"
                    :circle="true"/>
            </template>
        </el-table-column>
        
    </lq-el-table>
</template>
<script>
import {list as listApi,deleteEvent as deleteEventApi} from '@/api/event';

export default {
    name: 'event-list',
    props: {
        eventType: {
            type:  String,
            default: null
        }
    },
    data: function () {

        return {
            tableName: `event_${this.eventType}`,
            deleteMessage : 'Are you sure you want to permanently delete this event? ',
            
        }
    },
    methods: {
        request: function (data) {
            if(this.eventType){
                data.event_type = this.eventType;
            }

            return listApi(data)
        },
        deleteEvent : function(data){
            this.$confirm(this.deleteMessage, 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                let formData = {}
                deleteEventApi(data.id,formData).then((response)=>{
                    this.$message({
                        type: 'success',
                        message: response.message
                    });
                    this.$lqTable.refresh('event_upcoming')
                    this.$lqTable.refresh('event_today')
                    this.$lqTable.refresh('event_completed')
                });
            }).catch(() => {
             this.$message({
                type: 'info',
                message: 'Delete canceled'
                });       
            });
        }
    }
}
</script>