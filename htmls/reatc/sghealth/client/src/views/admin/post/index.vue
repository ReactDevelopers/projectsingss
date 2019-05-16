<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button v-if="$root.can('post.store')" type="primary"  icon="el-icon-plus" circle @click="$router.push('post/create')" ></el-button>	
        </el-col>
        <!-- <el-col :span="24">
            <list />
        </el-col> -->
        <el-col :span="24">
            <lq-el-tabs ref="certificatetab" name="certificate" active-tab="active" v-if="$root.can('post.index')">
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
    name: 'post_list_page',
    components: {List}
}
</script>

