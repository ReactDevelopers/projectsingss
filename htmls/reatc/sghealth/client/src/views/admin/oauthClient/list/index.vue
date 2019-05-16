<template>
    <lq-el-table name="oauth_client" :request="request">
        <el-table-column
            type="index"
            width="50">
        </el-table-column>        
        <el-table-column
          prop="name"
          label="Client Name">
        </el-table-column>

        <el-table-column
          prop="client_id"
          label="Client Id">
        </el-table-column>

    </lq-el-table>
</template>
<script>
import {list as listApi} from '@/api/oauthClient';

export default {
    name: 'banner-list',
    methods: {

        request: function (data) {

            return listApi(data)
        }
    }
}
</script>

