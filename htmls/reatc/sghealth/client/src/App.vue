<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<script>


export default {
  name: 'app',
  created() {
      const initial_loader = document.getElementById('initial_loader')
      initial_loader ? initial_loader.remove(): null;
  }
}
</script>
