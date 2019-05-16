<template>
    <div>
        <el-dialog
            title="Data"
            :visible="dialogVisible"
            width="50%"
            :before-close="() => dialogVisible= false"
        >
            <div :style="{wordBreak: 'break-all'}">
                <vue-json-pretty :data="jsonData" />
            </div>
        </el-dialog>
        <filter-form  :keep-alive="true" form-name="request_log_lq_table_form" />

        <lq-el-table name="request_log" :request="request">
            <lq-el-table-index />
            <el-table-column  prop="url" label="URL"  />
            <el-table-column  prop="request_method" label="Method"  />
            <el-table-column  prop="route_name" label="Request Name"  />
            <el-table-column  prop="client.name" label="Client"  />
            <el-table-column  prop="device.device_id" label="Device"  />
            <el-table-column  prop="user.name" label="User"  />
            <el-table-column  prop="request_headers" label="Request Headers"  >
                <template slot-scope="scope">
                    <el-button icon="el-icon-info" circle @click="showJson(scope.row.request_headers)"></el-button>
                </template>
            </el-table-column>
            <el-table-column  prop="response_headers" label="Response Headers"  >
                <template slot-scope="scope">
                    <el-button icon="el-icon-info" circle @click="showJson(scope.row.response_headers)"></el-button>
                </template>
            </el-table-column>

            <el-table-column  prop="request" label="Request Data"  >
                <template slot-scope="scope">
                    <el-button icon="el-icon-info" circle @click="showJson(scope.row.request)"></el-button>
                </template>
            </el-table-column>

            <el-table-column  prop="response" label="Response Data"  >
                <template slot-scope="scope">
                    <el-button icon="el-icon-info" circle @click="showJson(scope.row.response)"></el-button>
                </template>
            </el-table-column>
        </lq-el-table>
    </div>
</template>
<script>
import {requestLogList} from '@/api/developer';
import VueJsonPretty from 'vue-json-pretty'
import FilterForm from './list/RequestLogFilter';

export default {
    name: 'request-log-list',
    components: {
        VueJsonPretty,
        FilterForm
    },
    data: function () {

        return {
            jsonData: {},
            dialogVisible: false
        }
    },
    methods: {

        /**
         * To Fetch the Request Log
         * @param data Object, [Filter keys]
         */
        request: function (data) {

            return requestLogList(data);
        },
        showJson: function (data) {

            this.dialogVisible = true;
            this.jsonData = data;
        }
    }
}
</script>