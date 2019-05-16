<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button v-if="$root.can('assignment.store')" type="primary"  icon="el-icon-plus" circle @click="$router.push('job/create')" ></el-button>	
        </el-col>
        <el-col :span="24">
            <list />
        </el-col>
    </el-row>
</template>
<script>
import List from './list';

export default {
    name: 'job_list_page',
    components: {List},
    
}
</script>

