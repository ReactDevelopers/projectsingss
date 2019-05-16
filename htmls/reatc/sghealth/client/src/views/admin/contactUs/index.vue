<template>
    <el-row>
        <el-col :span="24">
            <list />
        </el-col>
    </el-row>
</template>
<script>
import List from './list';

export default {
    name: 'contact_us_list_page',
    components: {List}
}
</script>

