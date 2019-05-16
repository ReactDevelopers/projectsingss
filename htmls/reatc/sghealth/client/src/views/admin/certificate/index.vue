<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button type="primary" v-if="$root.can('certificate.store')"  icon="el-icon-plus" circle @click="$router.push('certificate/create')" ></el-button>	
        </el-col>
        <el-col :span="24">
            <lq-el-tabs ref="certificatetab" name="certificate" active-tab="active">
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
    name: 'certificate_list_page',
    components: {List},
    computed: {
        activeTab: function () {
            return this.$helper.getProp(this.$store.state, 'app.tabs.certificate', 'active')
        }
    }
}
</script>

