<template>
  <div style="margin: 20px;">
    <el-input v-model="input" placeholder="wdw"></el-input>
    <el-select v-model="select" filterable placeholder="Hi..." :multiple="true" :non-removable="['hgsdjhafjd']">
      <template slot="selected_label" slot-scope="scope">
          hi...  {{scope.item.currentLabel}}
      </template>
      <template>
        <el-option            
            v-for="item in options" 
            :key="item.value"
            :label="item.value"
            :value="item.value">
        </el-option>
      </template>
    </el-select>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        input: 'Hello Element UI!',
        select: '',
        options: [{value: 'hgsdjhafjd'}, {value: 'I am'}]
      };
    }
  };
</script>
