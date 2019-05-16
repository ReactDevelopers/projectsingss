<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button type="primary" v-if="$root.can('institute.store')" icon="el-icon-plus" circle @click="$router.push('institute/create')" ></el-button>	
        </el-col>
        <el-col :span="24">
            <lq-el-tabs ref="institute_tab" name="institute" active-tab="active">
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
    name: 'institute-list-page',
    components: {List}
}
</script>

