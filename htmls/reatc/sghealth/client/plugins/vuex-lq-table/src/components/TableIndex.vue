<template>
    <el-table-column
        type="index"
        :index="indexMethod"
        width="50">
    </el-table-column>
</template>
<script>
export default {
    name: 'lq-el-table-column',
    inject: ['tableName'],
    methods: {
        indexMethod: function (index) {
            const page = this.$lqTable.getCurrentPage(this.tableName);
            const page_size = this.$lqTable.getPageSize(this.tableName);
            return (index+1) + (page_size*(page-1));
        }
    }
}
</script>
