import Vue from 'vue'
import VueI18n from 'vue-i18n'
import Cookies from 'js-cookie'
import elementEnLocale from 'lq-element-ui/lib/locale/lang/en' // lq-element-ui lang
import elementZhLocale from 'lq-element-ui/lib/locale/lang/zh-CN'// lq-element-ui lang
import elementEsLocale from 'lq-element-ui/lib/locale/lang/es'// lq-element-ui lang
import enLocale from './en'
import zhLocale from './zh'
import esLocale from './es'

Vue.use(VueI18n)

const messages = {
  en: {
    ...enLocale,
    ...elementEnLocale
  },
  zh: {
    ...zhLocale,
    ...elementZhLocale
  },
  es: {
    ...esLocale,
    ...elementEsLocale
  }
}

const i18n = new VueI18n({
  // set locale
  // options: en | zh | es
  locale: 'en',
  // set locale messages
  messages
})

export default i18n
