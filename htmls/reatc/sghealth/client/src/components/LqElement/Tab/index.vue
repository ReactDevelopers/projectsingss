<template>
    <el-tabs v-model="activeName" v-bind="$attrs">
        <slot></slot>
    </el-tabs>
</template>
<script>
export default {
    name: 'lq-el-tab',
    props: {
        activeTab: {
            required: true,
            type: String,
        },
        name: {
            required: true,
            type: String,
        }
    },
    computed: {

        activeName: {

            get: function() {
                
               return  this.$helper.getProp(this.$store.state.app.tabs, this.name, this.activeTab)
            },
            set: function (value, event) {
                const activeTab = (value != 0 ? value : this.activeTab);
                this.$store.dispatch('updateAppKey', {key: `tabs.${this.name}`, value:  activeTab});
            }
        }
    }
}
</script>
