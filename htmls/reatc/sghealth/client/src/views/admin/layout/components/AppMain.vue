<template>
  <section class="app-main">
    
    <transition name="fade-transform" mode="out-in">
      <!-- or name="fade" -->
      <!-- <router-view :key="key"></router-view> -->
      <div style="padding:30px;">
        <!-- <bread-crumb />  -->
        <h1>{{$route.meta.heading}}</h1>
        <router-view/>
      </div>
    </transition>
  </section>
</template>

<script>
import BreadCrumb from '@/components/Breadcrumb';

export default {
  name: 'AppMain',
  components: {BreadCrumb},
  computed: {
    // key() {
    //   return this.$route.name !== undefined ? this.$route.name + +new Date() : this.$route + +new Date()
    // }
  }
}
</script>

<style scoped>
.app-main {
  /*50 = navbar  */
  min-height: calc(100vh - 50px);
  position: relative;
  overflow: hidden;
}
</style>
