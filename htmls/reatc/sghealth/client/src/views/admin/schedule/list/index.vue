<template>
    <el-row>
        <el-col :span="24">
            
            <lq-el-table :name="tableName" :request="request">
                <lq-el-table-index />
                <el-table-column  prop="institute.name" label="Institute"  />
                <el-table-column  prop="date" label="Month"  />
                <el-table-column  prop="user.name" label="Updated By"  />
                <el-table-column label="Action" align="right">
                    <template slot-scope="scope">
                        <el-button
                            v-if="$root.can('institute-monthly-data.store')"
                            @click="selectMonth(scope.row)"
                            icon="el-icon-document" 
                            type="success"
                            :circle="true"/>
                        <el-button
                            v-if="$root.can('roster.index')"
                            icon="el-icon-view" 
                            @click="$router.push('roster/'+scope.row.institute_id+'/'+getMonth(scope.row.date)+'/edit' )"
                            type="danger"
                            :circle="true"/>
                    </template>
                </el-table-column>

            </lq-el-table>
        </el-col>
        <!-- Dialog to select the Certificate -->
        <el-dialog
            title="Select Month"
            :visible.sync="dialogVisible"
            width="270px"
        >

            <copy ref="copyForm" :copyData="copyFromData" :form-name="formName" :request="createApi" @submited-success="success"/>

            <span slot="footer" class="dialog-footer">
                <el-button @click="dialogVisible = false">Cancel</el-button>
                <el-button :loading="showLoader" type="primary" @click="$refs.copyForm ? $refs.copyForm.submit(true) : null">Confirm</el-button>
            </span>
        </el-dialog>
        <!--End Dialog of certificate-->
    </el-row>
</template>
<script>
import {list as listApi,create} from '@/api/schedule';
import copy from '../form/copy';
import moment from 'moment';

export default {
    name: 'service_list',
    components : {copy},
    data: function () {
        return {

            formName : 'copy_schedule_form',
            tableName: `service`,
            dialogVisible: false,
            copyFromData : {},
            showLoader:false
        }
    },
    methods: {
       
        request: function (data) {
            
            return listApi(data)
        },

        /**
         * Action when user clicks on copy button
         */
        selectMonth:function(data){
            this.dialogVisible = true;
            this.copyFromData = data
        },

        createApi : function(data){
            this.showLoader = true;

            return create(data);
        },
        success: function (resposne) {
            this.showLoader = false;
            this.dialogVisible = false;
            this.$message.success('Schedule has been copied successfully.');
            
        },
        
        getMonth: function (date) {
            return moment(date).format('YYYY-MM')
        }
    }
}
</script>