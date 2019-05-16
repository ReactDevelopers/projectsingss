<template>
    <div>

    <edit-config :config-data="configData" v-if="configData" @close="close"/>   
    
    <lq-el-table name="site_configs" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="name" label="Name" sortable="custom" />
        <el-table-column   label="Data"  >
            <template slot-scope="scope">

                <div v-if="$helper.getProp(scope,'row.options.type') === 'file'" :style="{backgroundColor: '#fbfbfb'}">
                    <img v-if="$helper.getProp(scope,'row.options.fileType') ==='image'" :style="{maxWidth: '100%'}" :src="`${$root.storage_url}${$helper.getProp(scope,'row.data.path')}`" :alt="$helper.getProp(scope,'row.name')" />
                    <a v-else :href="`${$root.storage_url}${$helper.getProp(scope,'row.data.path')}`" target="_blank">File</a>
                </div>
                <div v-else>
                    {{$helper.getProp(scope,'row.options.secure', false) ? '**********' : $helper.getProp(scope,'row.data') }}
                </div>
            </template>
        </el-table-column>
        <el-table-column  prop="config_group" label="Config Group" align="right" sortable="custom" 
        />
        <el-table-column label="Action" align="right">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input key="config_search" id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                    v-if="$root.can('config.update')"
                    icon="el-icon-edit" 
                    type="primary"
                    :circle="true"
                    @click="editPopUp(scope.row)"
                />
              
            </template>
         </el-table-column>
    </lq-el-table>
    </div>
</template>
<script>
import {list as listApi} from '@/api/config';
import EditConfig from  '../Edit';

export default {
    name: 'config_list_page',
    components: {
        EditConfig
    },
    data: function () {

        return {

            configData: null,
        }
    },
    methods: {

        request: function (data) {
            return listApi(data)
        },        

        editPopUp: function (data) {
            this.configData = data;
        },
        close: function () {

            this.configData = null;
        }       
    }
}
</script>