<template>
<div>
    <el-table
      :data="data"
      v-bind="$attrs"
      v-loading="requesting"
      @filter-change="filterChange"
      @sort-change="sortChange"
      :default-sort="getSortBy()"      
      style="width: 100%">
      <slot>
      </slot>
    </el-table>

    <el-pagination    
        background
        v-if="!hidePagination"
        :layout="pagerLayout"
        :page-size="pageSize"
        :current-page="currentPage"
        :total="total"
        :disabled="requesting"
        :page-sizes="pageSizes"
        @current-change="pageChange"
        @prev-click="pageChange"
        @next-click="pageChange"
        @size-change="pageSizeChange"
    >
    </el-pagination>
</div>
    
</template>
<script>
    import helper from 'vuejs-object-helper';

    export default {
        name: 'lq-el-table',
        inheritAttrs: false,
        provide: function () {
            return {
                tableName: this.name
            }
        },
        props: {
            name: String,
            request: {
                required: true,
                type: Function
            },
            dataKey: {
                type: [String, Array],
                default: function () { return 'data.data' }
            },
            totalKey: {
                type: [String, Array],
                default: function () { return 'data.total' }
            },
            currentPageKey: {
                type: [String, Array],
                default: function () { return 'data.current_page' }
            },
            hidePagination: Boolean,
            pageSizes: {
                type: Array,
                default: function () {
                    
                    return [15, 25, 50, 100, 200, 500, 1000];
                }
            },
            pagerLayout: {
                type: String,
                default: function () {
                    return 'sizes, prev, pager, next'
                }
            },
            defaultSort: Object

        },
        created() {

            this.$store.dispatch('table/updateSettings', {tableName: this.name, settings:{
                data_key: this.dataKey,
                total_key: this.totalKey,
                current_page_key: this.currentPageKey,
                request: this.request,
                type: 'table'
            }})

            if(this.defaultSort) {

                this.sortChange(this.defaultSort, false);
            }else {
            
                this.$store.dispatch('table/get', {tableName: this.name});
            }
            
            this.$root.$on(this.formName+'_changed', () => {
                this.$lqTable.filter(this.name);
            })
        },
        
        beforeDestroy() {
            
            this.$lqTable.deletePagesData(this.name);
            this.$root.$off(this.formName+'_changed');
        },
        computed: {

            currentData: function () {
                
                return helper.getProp(this.$store.state, ['table', this.name, 'data', 'page_'+this.currentPage], []);
            },
            data: function () {

                return this.requesting ? this.previousPageData : this.currentData;
            },
            currentPage: function () {

                return helper.getProp(this.$store.state, ['form', this.formName, 'values', 'page'], 1);
            },
            previousPageData: function() {

                return helper.getProp(this.$store.state, ['table', this.name, 'data', 'page_'+this.previousPage], []);
            },
            previousPage: function (){
                
                return helper.getProp(this.$store.state, ['table', this.name, 'settings', 'prev_page'], 1);
            },
            pageSize: function () {

                return helper.getProp(this.$store.state, ['form', this.formName, 'values', 'page_size'], 15);
            },
            total: function () {

                return helper.getProp(this.$store.state, ['table', this.name, 'settings', 'total'], 0);
            },
            requesting: function () {
                return helper.getProp(this.$store.state, ['table', this.name, 'requesting'], false);
            }
        },
        data: function () {

            return {

                formName: this.name+'_lq_table_form'
            }
        },
        methods: {

            pageChange: function(page) {
                
                this.$lqTable.pageChange(this.name, page);
            },
            pageSizeChange: function (page_size) {

                this.$lqTable.pageSizeChange(this.name, page_size);
            },
            filterChange: function (filters) {

                const dataKey = Object.keys(filters);
                dataKey.map((filterKey) => {
                    this.$store.dispatch('form/setElementValue', {formName: this.name +'_lq_table_form', elementName: filterKey, value: filters[filterKey]});
                })

                this.$lqTable.filter(this.name)
            },
            sortChange: function (sortData, request_to_server= true) {

                const propName  = sortData.prop ? sortData.prop.replaceAll('.', '_') : sortData.prop;
                if(propName) {
                    this.$store.dispatch('form/setElementValue', {formName: this.name +'_lq_table_form', elementName: 'sort_by.'+propName, value: sortData.order });
                }
                else {

                    this.$store.dispatch('form/setElementValue', {formName: this.name +'_lq_table_form', elementName: 'sort_by', value: null });
                }
                
                if(request_to_server)
                    this.$lqTable.refresh(this.name)
            },

            getSortBy: function () {

                const sortBy = this.$lqTable.getElemnetSortBy(this.name);

                if(sortBy) {
                    const keys = Object.keys(sortBy);
                    return {prop: keys[0], order: sortBy[keys[0]]};
                }
                
                return this.defaultSort;
            }
        }
    }
</script>
