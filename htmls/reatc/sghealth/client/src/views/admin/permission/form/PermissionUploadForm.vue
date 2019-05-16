<template>
    <el-row>
        <el-col :span="24" align="right" :style="{marginBottom: '10px'}">
            <el-button title="Download Permission file" type="primary" icon="el-icon-download" @click="downloadPermission" circle></el-button>
        </el-col>
        <el-col :span="24" :style="{marginBottom: '10px'}">
            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" :use-custom-slot="true">
                <div class="dropzone-custom-content">
                    <h3 class="dropzone-custom-title">Drag and drop to Permission Excel file!</h3>
                    <div class="subtitle">...or click to select a file from your computer</div>
                </div>
            </vue-dropzone>
        </el-col>
        
    </el-row>
</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import {  getToken, getDeviceId } from '@/utils/auth'
import {list as permissionListApi} from '@/api/permission';
const FileDownload = require('js-file-download');

export default {
    name: 'permission-upload-form',
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            dropzoneOptions: {
                    url: process.env.VUE_APP_API_BASE_URL+'permission/upload',
                    addRemoveLinks: true,
                    headers: { 
                        "client-id": process.env.VUE_APP_CLIENT_ID,
                        "device-id": getDeviceId(),
                        "Authorization": 'Bearer ' +getToken()
                    }
                }
            }
    },
    methods: {
        downloadPermission : function () {
            permissionListApi({export: 'excel'}, 'arraybuffer')
                .then(response => {
                    FileDownload(response, 'permissions.xlsx');
                })
        }
    }
}
</script>

<style>

</style>
