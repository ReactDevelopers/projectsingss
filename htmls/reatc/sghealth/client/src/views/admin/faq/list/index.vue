<template>
    <lq-el-table name="faq" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="subject" label="Subject" sortable="custom" />
        <el-table-column  prop="question" label="Question" sortable="custom" />
        <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                    v-if="$root.can('faq.update')"
                    icon="el-icon-edit" 
                    type="primary"
                    :circle="true"
                    @click="$router.push('faq/'+scope.row.id+'/edit')"/>
                <!-- <el-button
                icon="el-icon-delete" 
                type="danger"
                :circle="true"/> -->
            </template>
         </el-table-column>
    </lq-el-table>
</template>
<script>
import {list as listApi} from '@/api/faq';

export default {
    name: 'faq_list',
    methods: {
        request: function (data) {
            return listApi(data)
        }
    }
}
</script>