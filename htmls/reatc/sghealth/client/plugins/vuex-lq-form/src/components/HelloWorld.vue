<template>
  <div class="hello">
    <h1>{{ msg }}</h1>

   <file-form form-name="textform" ></file-form>
  </div>
</template>

<script>
import TextForm from './examples/text/TextForm'
import FileForm from './examples/file/FileForm'

export default {
  name: 'HelloWorld',
  props: {
    msg: String
  },
  components: {
    TextForm,
    FileForm
  }
}
</script>


