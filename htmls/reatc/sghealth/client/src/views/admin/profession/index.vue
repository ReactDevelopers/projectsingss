<template>
    <el-row>
        <el-col :span="24" align="right">
            <el-button v-if="$root.can('profession.store')" type="primary"  icon="el-icon-plus" circle @click="$router.push('profession/create')" ></el-button>	
        </el-col>
        <el-col :span="24" v-if="$root.can('profession.index')">
            <lq-el-tabs ref="profession_tab" tab-position="left"  v-if="professionCategories.length" name="profession" :active-tab="`_${professionCategories[0].id}.profession_cat`" type="border-card">
                <el-tab-pane :label="pf_category.name.substring(0,20)"  :name="`_${pf_category.id}.profession_cat`"  v-for="(pf_category) in professionCategories" :key="`profession_category${pf_category.id}`">
                    
                    <list :data="getProfessionByCategoryId(pf_category.id)" />
                
                </el-tab-pane>
                <el-tab-pane label="Others" name="_other.profession_cat"  >
                    <list :data="getProfessionByCategoryId(null)"/>
                </el-tab-pane>
                
            </lq-el-tabs>
        </el-col>
    </el-row>
</template>
<script>
import List from './list';
import {list as listApi} from '@/api/profession';
import {list as PcListApi} from '@/api/professionCategory';

export default {
    name: 'profession_list_page',
    components: {List},
   
    created() {

        if(this.$helper.getProp(this.$store.state, 'table.profession_category_list.data', null)){

            this.$lqTable.deletePagesData('profession_category_list')
            this.$lqTable.deletePagesData('profession_list')
        }
        
       
        this.$lqForm.setElementVal('profession_list_lq_table_form','page',-1);
        this.$lqForm.setElementVal('profession_list_lq_table_form','deleted_at',1);
        this.$lqTable.fetchListData('profession_list', listApi,{
            data_key: 'data.data',
        });

        this.$lqForm.setElementVal('profession_category_list_lq_table_form','page',-1);
        this.$lqTable.fetchListData('profession_category_list', PcListApi,{
            data_key: 'data.data'
        });
    },

    computed: {

        professions: function () {

            var collection = this.$helper.getProp(this.$store.state, 'table.profession_list.data', []);
            this.$helper.setProp(this.$store.state.table.profession_list,['search'],'')
            var newCollection = _.groupBy(collection, 'profession_category_id');
            return newCollection;
        },
        professionCategories: function () {

           return this.$helper.getProp(this.$store.state, 'table.profession_category_list.data', []);
        }
    },
    
    methods: {
        getProfessionByCategoryId(category_id){
            return this.professions[category_id] ?  this.professions[category_id] : []
        }
    }
}
</script>

