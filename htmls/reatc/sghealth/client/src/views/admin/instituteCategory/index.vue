<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button v-if="$root.can('institute-category.store')" type="primary"  icon="el-icon-plus" circle @click="$router.push('institute-category/create')" ></el-button>	
        </el-col>
        <el-col :span="24">
            <lq-el-tabs ref="institute_category_tab" name="institute_category" active-tab="active" v-if="$root.can('institute-category.index')">
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
    name: 'institute_category',
    components: {List},
    computed: {
        activeTab: function () {
            return this.$helper.getProp(this.$store.state, 'app.tabs.institute_category', 'active')
        }
    }
}
</script>

