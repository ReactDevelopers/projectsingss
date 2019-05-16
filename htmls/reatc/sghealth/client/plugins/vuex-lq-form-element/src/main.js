
import LqInput from './components/Input';
import LqSelect from './components/Select';
import LqImage from './components/File/Image';
import LqFile from './components/File/File';
import LqSubmit from './components/Submit';
import LqTimePicker from './components/TimePicker';
import LqDatePicker from './components/DatePicker';
import RadioGroup from './components/RadioGroup';
import LqCheckboxGroup from './components/CheckboxGroup';
import LqCheckbox from './components/Checkbox';
import LqGooglePlace from './components/Place';

export default {
  // The install method will be called with the Vue constructor as
  // the first argument, along with possible options
  install (Vue, options) {

   // Vue.config.productionTip = false
   // Vue.use(ElementUI);

    Vue.component('lq-el-input', LqInput)
    Vue.component('lq-el-select', LqSelect)
    Vue.component('lq-el-submit', LqSubmit)
    Vue.component('lq-el-image', LqImage)
    Vue.component('lq-el-file', LqFile)
    Vue.component('lq-el-time-picker', LqTimePicker)
    Vue.component('lq-el-date-picker', LqDatePicker)
    Vue.component('lq-el-radio-group', RadioGroup)
    Vue.component('lq-el-checkbox-group', LqCheckboxGroup)
    Vue.component('lq-el-checkbox', LqCheckbox)
    Vue.component('lq-el-google-place', LqGooglePlace)
  }
}