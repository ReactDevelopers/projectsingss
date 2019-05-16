
import helper from 'vuejs-object-helper';
import errorLang from './fileErrorLang';
import fileValidation from '../validate/FileValidation';

const fileMixIn = {
    props: {
		maxNoOfFiles: {
			type: Number,
			required: false,
			default: () => { return null; }
		},
		// maxFileSize: {
		// 	type: Number,
		// 	required: false,
		// 	default: () => { return null; }
		// },
		// minFileSize: {
		// 	type: Number,
		// 	required: false,
		// 	default : () => { return null; }
		// },
		// acceptedFiles: {
		// 	type: [String, Arcreateray],
		// 	required: false,
		// 	default: () => { return null; }
		// },
		// minImageDimensions: {
		// 	type: Array,
		// 	required: false,
		// 	default: () => { return null; },
		// 	validator: (value) => {
		// 		return value ? (value.length == 2) : true
		// 	}	
		// },
		// maxImageDimensions: {
		// 	type: Array,
		// 	required: false,
		// 	default: () => { return null; },
		// 	validator: (value) => {
		// 		return value ? (value.length == 2) : true
		// 	}	
		// },
		// exactImageDimensions: {
		// 	type: Array,
		// 	required: false,
		// 	default: () => { return null; },
		// 	validator: (value) => {
		// 		return value ? (value.length == 2) : true
		// 	}	
        // },
        lang: {
            type: Object,
            required: false,
            default: () => {return errorLang}
        },
        thumbs: {
            type: Array,
            default: () => { return null; },
            validator: (value) => {
                let isValid = true;
                value.map(function (v) {
                    if(!helper.isFloat( v.width ) || !helper.isFloat( v.height ) ){
                        isValid = false;
                    }
                })
                return isValid;
            }
        },
        /**
         * Base Url of Storage
         */
        storageUrl: String,
        /**
         * The key path where the upload file name.
         */
        valueKey: {
            type: String,
            required: true
        },
        hideButton: Boolean
    },
    created: function () {  

        this.$root.$emit('lqfiles.ready', this.id);
    },
    methods: {

		isMultiple: function () {

			return this.maxNoOfFiles > 1 ? true: false;
		},
		handleFileChange: async function(event)  {

            this.$lqForm.touchStatus(this.formName, this.id, true);            
            const fileLenght = event.target.files.length;
            
            if(this.maxNoOfFiles && helper.isArray(this.LQElement) && (this.LQElement.length+fileLenght) >  this.maxNoOfFiles){
                
                this.$emit('MaxFileOver', event);
                event.target.value = '';
                return;
            }

            if(fileLenght) {

                this.ready(false);
                for (var i = 0; i < fileLenght; i++) {
                    
                    const file = event.target.files[i];
                    this.setValue(file);

                    if(this.rules && this.rules.file) {

                        const result = await fileValidation(file, this.rules.file, this.lang );
                        result ? this.addError(result, (this.isMultiple() ? (this.LQElement.length-1): undefined) ) : this.removeError();                        
                    }
                }

                this.ready(true);
                this.$emit('changed', this.LQElement);
            }
            event.target.value = '';
        },
        addError: function (errors, index) {

            const elementName = index !== undefined ? this.id+'.'+index : this.id;
			this.$store.dispatch('form/addError', {formName: this.formName, elementName: elementName, errors: errors});
        },
        removeError: function () {

            this.$lqForm.removeError(this.formName, this.id);
            
            if(this.isMultiple()){

                for (var i = 0; i < this.LQElement.length; i++) {

                    this.$lqForm.removeError(this.formName, `${this.id}.${i}.file`);        
                }
                return
            }

			this.$lqForm.removeError(this.formName, this.id+'.file');
		},
        remove: function (elementName) {
			this.$store.dispatch('form/removeElement', {formName: this.formName, elementName: elementName});
		},
        /**
         * To set the file value in store
         * @param {File} file 
         */
        setValue: function (file) {

            const defaultValue = this.isMultiple() ? [] : {};

            const value = file ? {
                file: file,
            } : defaultValue;

            const data = {
                formName: this.formName, 
                elementName: this.id, 
                value: value
            }
            const action = this.isMultiple() ? 'form/addNewElement' : 'form/setElementValue';

            this.$store.dispatch(action, data);
        }
	}
}

export default fileMixIn;