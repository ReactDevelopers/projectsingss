<template>
    <lq-el-table name="devices" :request="request">
        <lq-el-table-index />      
        <el-table-column
          prop="name"
          label="Device Name">
        </el-table-column>

        <el-table-column
          prop="device_id"
          label="Device Id">
        </el-table-column>

        <el-table-column
          label="Client">
          <template slot-scope="scope">
              {{$helper.getProp(scope.row, 'client.name') }}
          </template>
        </el-table-column>
        
    </lq-el-table>
</template>
<script>
import {list as listApi} from '@/api/device';

export default {
    name: 'device-list',
    methods: {

        request: function (data) {

            return listApi(data)
        }
    }
}
</script>

