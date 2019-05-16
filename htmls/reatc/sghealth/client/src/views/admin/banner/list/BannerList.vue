<template>
    <lq-el-table name="banner" :request="request">
        <el-table-column
            type="index"
            width="50">
        </el-table-column>        
        <el-table-column
          prop="banner_image_id"
          label="Banner"
          width="800">
          <template slot-scope="scope">
                <app-img :url="$helper.getProp(scope, 'row.image.thumbnails.0.path', '')" height="100px" />
          </template>
        </el-table-column>
         <el-table-column label="Action">
              <template slot-scope="scope">
                <el-button
                icon="el-icon-edit" 
                type="primary"
                :circle="true"
                @click="$router.push('banner/'+scope.row.id+'/edit')"/>
            </template>
         </el-table-column>
    </lq-el-table>
</template>
<script>
import {list as listApi} from '@/api/banner';

export default {
    name: 'banner-list',
    methods: {

        request: function (data) {

            return listApi(data)
        }
    }
}
</script>

