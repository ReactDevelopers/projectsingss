<template>
    <el-row>
        <el-col :span="24">
            <schedule-filter form-name="service_lq_table_form"/>
        </el-col>
        <el-col :span="24">
            <list/>
        </el-col>
    </el-row>
</template>
<script>
import List from './list';
import scheduleFilter from './list/scheduleFilter';

export default {
    name: 'service-list-page',
    components: {List,scheduleFilter}
}
</script>

