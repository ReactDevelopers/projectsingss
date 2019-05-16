<template>
  <div class="hello">
    <h1>{{ msg }}</h1>
      <lq-el-table name="branch" :request="request"
        data-key="data.data.data"
        total-key="data.data.total"
        current-page-key="data.data.current_page"
      >
        <lq-el-table-index />
        <el-table-column
          prop="name"
          label="Institute name"
          width="180">
        </el-table-column>
        <el-table-column
          prop="institute_category_id"
          label="institute_category_id"
          width="180">
        </el-table-column>
        <!-- <el-table-column
          prop="flag"
          label="Flag">
        </el-table-column> -->
      </lq-el-table>
  </div>
</template>

<script>

import axios from 'axios';
import helper from 'vuejs-object-helper';

export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  methods: {

    request: function (data) {
        var params = helper.objectToQueryString(data)
        return axios.get('http://localhost/sghealth/server/public/api/institute?'+params);
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
