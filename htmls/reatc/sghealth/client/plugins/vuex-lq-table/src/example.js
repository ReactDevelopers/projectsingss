import Vue from 'vue'
import App from './App.vue'
import store from './store'
import VuexLqForm from 'vuex-lq-form';
import ElementUI from 'lq-element-ui';
import 'lq-element-ui/lib/theme-chalk/index.css';
import LqTable from './utils/lqTable';

Vue.use(ElementUI);
import LqTableIndex from './components/TableIndex';
import LqElTable from './components/Table';
Vue.component('lq-el-table', LqElTable);
Vue.component('lq-el-table-index', LqTableIndex);
Vue.config.productionTip = false
Vue.use(VuexLqForm, {store});
Vue.use(LqTable, {store});

// export default {
//   // The install method will be called with the Vue constructor as
//   // the first argument, along with possible options
//   install (Vue, options) {

//       Vue.use(LqTable, {store: options.store});
  
//   }
// }

new Vue({
  store,
  render: h => h(App)
}).$mount('#app')
