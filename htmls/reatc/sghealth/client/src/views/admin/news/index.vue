<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button v-if="$root.can('news.store')" type="primary"  icon="el-icon-plus" circle @click="$router.push('news/create')" ></el-button>	
        </el-col>
        <el-col :span="24">
            <list  />
        </el-col>
    </el-row>
</template>
<script>
import List from './list';

export default {
    name: 'news_list_page',
    components: {List},
    
}
</script>

