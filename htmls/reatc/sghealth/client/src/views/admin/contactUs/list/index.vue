<template>
    <lq-el-table name="certificate" :request="request">
        <lq-el-table-index />
        <el-table-column  prop="subject" label="Subject" sortable="custom"  />
        <el-table-column  prop="email" label="Email" sortable="custom"  />
        <el-table-column label="Action">
            <template slot="header">
                <lq-table-form>
                    <lq-el-input id="search" placeholder="Type of Search" :inside-form-element="false" size="mini" />
                </lq-table-form>
            </template>
            <template slot-scope="scope">
                <el-button
                v-if="$root.can('contact-us.update')"
                icon="el-icon-edit-outline" 
                type="primary"
                :circle="true"
                @click="$router.push('contact-us/'+scope.row.id+'/edit')"/>
                <!-- <el-button
                icon="el-icon-delete" 
                type="danger"
                :circle="true"/> -->
            </template>
         </el-table-column>
    </lq-el-table>
</template>
<script>
import {list as listApi} from '@/api/contactUs';

export default {
    name: 'contact_us_list',
    methods: {
        request: function (data) {
            return listApi(data)
        }
    }
}
</script>