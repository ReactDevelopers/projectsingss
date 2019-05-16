<template>
  <div class="hello">
    <h1>Test ....</h1>
    <test-from form-name="test_form">
    </test-from>
  </div>
</template>

<script>
import TestFrom from './Example/Form';

export default {
  name: 'HelloWorld',
  components:{
    TestFrom
  },
  props: {
    msg: String
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
