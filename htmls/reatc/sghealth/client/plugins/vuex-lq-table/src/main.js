//import Vue from 'vue'
//import App from './App.vue'
//import VuexLqForm from 'vuex-lq-form';

import LqTableHeper from './utils/lqTable';
//import ElementUI from 'lq-element-ui';
//import 'lq-element-ui/lib/theme-chalk/index.css';
import LqTable from './components/Table';
import LqTableIndex from './components/TableIndex';
import LqTableForm from './components/TableForm';
//Vue.config.productionTip = false
import lqTableModule from './module';

export default {
  // The install method will be called with the Vue constructor as
  // the first argument, along with possible options
  install (Vue, options) {
    
    options.store.registerModule('table', lqTableModule);

    //Vue.use(ElementUI);
    //Vue.use(VuexLqForm, {store: options.store});
    Vue.use(LqTableHeper, {store: options.store});  

    Vue.component('lq-el-table', LqTable);
    Vue.component('lq-el-table-index', LqTableIndex);
    Vue.component('lq-table-form', LqTableForm);
  }
}