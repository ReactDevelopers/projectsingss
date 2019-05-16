import Vue from 'vue'
import App from './App.vue'
import store from './store'
import ElementUI from 'lq-element-ui';
import vuexLqForm from 'vuex-lq-form';
import locale from 'lq-element-ui/lib/locale/lang/en'
import CheckboxGroup from './components/CheckboxGroup';
Vue.component('lq-el-checkbox-group', CheckboxGroup)

import 'lq-element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI, {locale})

Vue.use(vuexLqForm, {store});

new Vue({
  store,
  render: h => h(App)
}).$mount('#app')