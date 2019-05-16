import Vue from 'vue'

import 'normalize.css/normalize.css' // A modern alternative to CSS resets

import ElementUI from 'lq-element-ui'
//import 'lq-element-ui/lib/theme-chalk/index.css'
//import locale from 'lq-element-ui/lib/locale/lang/en' // lang i18n
import '@/styles/index.scss' // global css
import '../theme/index.css'


import helper from 'vuejs-object-helper'
import App from './App'
import store from './store'
import SvgIcon from 'vue-svgicon'
import Cookies from 'js-cookie'
import moment from 'moment';
import vuexFormElement from 'vuex-lq-form-element';
import 'vuex-lq-form-element/dist/lq.element.css';
import vuexLqForm from 'vuex-lq-form';
import vuexLqTable from 'vuex-lq-table';
import i18n from './lang' // Internationalization
import {canAccess} from '@/utils';
import {generalConfigs} from '@/api/config';

Vue.use(vuexLqTable, {store});
Vue.use(vuexLqForm, {store})
Vue.use(vuexFormElement);

import '@/components/icons'
// Default tag name is 'svgicon'
Vue.use(SvgIcon, {
    tagName: 'svg-icon',
    defaultWidth: '20px',
    defaultHeight: '20px'
})
import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

Vue.use(ElementUI, {
  size: Cookies.get('size') || 'medium', // set lq-element-ui default size
  i18n: (key, value) => i18n.t(key, value),
  
})

/**
 * Application usefull components
 */
import appImage from '@/components/Image';
import userInput from '@/components/LqElement/Username';
import mobileNo from '@/components/LqElement/MobileNo';
import Tinymce from '@/components/Tinymce'
import LqElTabs from '@/components/LqElement/Tab';
import LqTableActionColumn from '@/components/TableActionColumn';


Vue.component('app-img', appImage);
Vue.component('user-input', userInput);
Vue.component('mobile-no', mobileNo);
Vue.component('lq-el-tabs', LqElTabs);
Vue.component('rich-editor', Tinymce);
Vue.component('lq-table-action-column', LqTableActionColumn);

import {getDeviceId, setDeviceId} from '@/utils/auth';
import {guidGenerator} from '@/utils';

/**
 * Set the device id in cookie if does not exist.
 */
if(!getDeviceId()) {  
  setDeviceId(guidGenerator())
  window.location.reload();
}

/**
 * Set the helper variable
 */
Object.defineProperty(Vue.prototype, '$helper',   {value: helper});

Vue.config.productionTip = false

generalConfigs()
  .then((response) => {
    store.dispatch('updateAppKey', {key: 'configs', value:  response.data.data});
})
import defaultImageUrl from '@/assets/img/defaultImage.png';

/**
 * Function to make the vue instance.
 */
export default function init (router) {
  new Vue({
    el: '#app',
    router,
    store,
    i18n,
    data: function () {
      return {storage_url: process.env.VUE_APP_STORAGE_URL, defaultImage: defaultImageUrl}
    },
    created(){

      this.$on('submited-error', (response) => {
          
        this.$message.error('Your input is not valid. Please check the form.');
      });

      this.$on('can-not-submit', (response) => {
          
        this.$message.error('Your input is not valid. Please check the form.');
      });
      this.$on('has-error', (response) => {
          
        this.$message.error('The form is already contain some errors.');
      });
    },
    methods: {
      can: function (permission) {
        return canAccess(permission)
      },
      displayDate: function (date) {
          return date ? moment(date).format('DD/MM/YYYY') : '-';
      },
      // displayTime: function (date) {
      //     return moment(date).format('hh:is');
      // },
    },
    render: h => h(App)
  })
}


/**
 * Remove Does not work on IE , these codes will work to resolve this issue.
 */
if (!('remove' in Element.prototype)) {
  Element.prototype.remove = function() {
      if (this.parentNode) {
          this.parentNode.removeChild(this);
      }
  };
}