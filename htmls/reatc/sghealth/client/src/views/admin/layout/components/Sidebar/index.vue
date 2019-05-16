<template>
  <el-scrollbar wrap-class="scrollbar-wrapper">
    <el-menu
      :show-timeout="200"
      :default-active="$route.path"
      :collapse="isCollapse"
      mode="vertical"
      background-color="#28bec0"
      text-color="#ffffff"
      active-text-color="#294358"
    >
      <el-menu-item index="site_top_logo" tag="div" v-if="getConfig('LOGO_HIGHLIGHT')">
        <img :src="`${$root.storage_url}${getConfig('LOGO_HIGHLIGHT').path}`" :height="60" />
      </el-menu-item>
      <sidebar-item v-for="route in routes" :key="route.path" :item="route" :base-path="route.path"/>
    </el-menu>
  </el-scrollbar>
</template>

<script>
import { mapGetters } from 'vuex'
import SidebarItem from './SidebarItem'

export default {
  components: { SidebarItem },
  computed: {
    ...mapGetters([
      'sidebar',
      'configs'
    ]),
    routes() {
      return this.$router.options.routes
    },
    isCollapse() {
      return !this.sidebar.opened
    },    
  },
  methods: {
    getConfig(name) {

      return this.$helper.getProp(this.configs, [name,'data'], null)
    }
  }
}
</script>
