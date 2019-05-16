<template>
    <el-form>
        <el-row :gutter="10">
            <el-col :span="4">
                <lq-el-select 
                    id="user_id"
                    label="User"
                    :request="getUserList"
                    placeholder="Type to get result"
                    :filterable="true"
                    :remote="true"
                    remote-response-path="data.data"
                />
            </el-col>
            <el-col :span="4">
                <lq-el-select 
                    id="client_id" 
                    label="Client"
                    store-key="table.oauth_client_drop_down.data"
                />
            </el-col>
            <el-col :span="4">
                <lq-el-select 
                    id="device_id"
                    label="Device"
                    :request="getDeviceList"
                    label-key="device_id"
                    placeholder="Type to get result"
                    :filterable="true"
                    :remote="true"
                    remote-response-path="data.data"
                />
            </el-col>
            <el-col :span="4">
                <lq-el-input id="search" placeholder="Type to get result" label="Keyword Search" />
            </el-col>
            <el-col :span="1">
                <br><br>
                <el-button type="primary" @click="$lqTable.refresh('request_log')" icon="el-icon-refresh" circle></el-button>
            </el-col>
            <el-col :span="1">
                <br><br>
                <el-button type="danger" @click="deleteAll" icon="el-icon-delete" circle></el-button>
            </el-col>
        </el-row>
        
    </el-form> 
</template>
<script>
    import {lqForm} from 'vuex-lq-form';
    import {list as userListApi} from '@/api/users';
    import {list as deviceListApi} from '@/api/device';
    import {list as clientListApi} from '@/api/oauthClient';
    import {executePhp} from '@/api/developer';

    export default{
        name: 'user_filter',
        mixins:[lqForm],
        created: function() {

            this.$lqTable.fetchListData('oauth_client_drop_down', clientListApi,{
                data_key: 'data.data',
            })
        },
        methods: {
            /**
             * APi to get user List
             */
            getUserList: function(query) {

                return userListApi({search: query})
            },

            /**
             * Api to get Device List.
             */
            getDeviceList: function (query) {

                return deviceListApi({search: query});
            },

            /**
             * To delete all request
             */
            deleteAll: function () {

                this.$confirm('This will permanently delete all request log. Continue?', 'Warning', {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                }).then(() => {
                    
                    const loading = this.$loading({
                        lock: true,
                        text: 'Requesting...',
                    });

                    executePhp({command: 'lq:delete-request-log'})
                    .then((response) => {
                        
                        loading.close();
                        this.$lqTable.refresh('request_log');
                    }).catch(() => {

                        loading.close();
                    })

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

