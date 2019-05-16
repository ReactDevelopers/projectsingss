import lqFormElement from './mixins/formElement'
import lqForm from './mixins/form'
import lqFormModule from './store/modules/form';
import {getFormName} from './components/helper';
import formHelper from './utils/formhelper';
import ImageWithPreview from './components/file/ImageWithPreview'
import lqFile from './components/file/LQ-File'
import lqFileReader from './components/fileReader/LQ-FileReader';
import lqCropper from './components/fileReader/LQ-Cropper';
import VueCroppie from 'vue-croppie';


export { lqFormElement, lqForm, getFormName };

export default {
    // The install method will be called with the Vue constructor as
    // the first argument, along with possible options
    install (Vue, options) {

        options.store.registerModule('form', lqFormModule);
        Vue.use(VueCroppie);
        Vue.use(formHelper, {store: options.store});
        Vue.component('lq-image', ImageWithPreview);
        Vue.component('lq-file', lqFile);
        Vue.component('lq-file-reader', lqFileReader);
        Vue.component('lq-cropper', lqCropper);
    
    }
}