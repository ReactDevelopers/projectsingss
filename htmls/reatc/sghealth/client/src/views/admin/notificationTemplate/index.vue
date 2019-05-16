<template>
    <el-row>
        <el-col :span="24" align="right" >
            <el-button v-if="$root.can('notification-template.store')" type="primary" circle  icon="el-icon-plus" @click="$router.push('/notification-template/create')"></el-button>
        </el-col>
        <el-col :span="24">
            <List/>
        </el-col>
    </el-row>
</template>
<script>
import List from './list';
export default {
    name : 'notification-template-list',
    components : {List}
}
</script>
