<template>
    <lq-el-tabs name="oauth_client" active-tab="client">
        <el-tab-pane label="Clients" name="client">
            <client-list />
        </el-tab-pane>
        <el-tab-pane label="Devices" name="device">
            <device-list />
        </el-tab-pane>
    </lq-el-tabs>
</template>
<script>
import clientList from './list';
import deviceList from '../device/list';

export default {
    name: 'banner-list-page',
    components: {
        clientList,
        deviceList
    }
}
</script>

