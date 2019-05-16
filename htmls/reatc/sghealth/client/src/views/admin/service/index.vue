<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button v-if="$root.can('service.store')" type="primary"  icon="el-icon-plus" circle @click="$router.push('service/create')" ></el-button>	
        </el-col>
        <el-col :span="24" v-if="$root.can('service.index')">
            <lq-el-tabs ref="servicetab" name="service" active-tab="active">
                <el-tab-pane label="Active" name="active">
                    <list />
                </el-tab-pane>
                <el-tab-pane label="Trashed" name="trashed">
                    <list :for-trashed="true" />
                </el-tab-pane>
            </lq-el-tabs>
        </el-col>
    </el-row>
</template>
<script>
import List from './list';

export default {
    name: 'service-list-page',
    components: {List}
}
</script>

