import Vue from 'vue'
import Vuex from 'vuex'
import app from './modules/app'
import profile from './modules/profile'
import list from './modules/list'
import getters from './getters'
//import {lqFormModule} from 'vuex-lq-form';

Vue.use(Vuex)

const store = new Vuex.Store({
  modules: {
    app,
    profile,
    list
  },
  getters
})

export default store
