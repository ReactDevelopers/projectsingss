const validate = require("validate.js");

export default {

    install (Vue, options) {
        const store = options.store;
        
        Object.defineProperty(Vue.prototype, '$lqForm',   {value: new formHelper(store ) });
    }
}

export  function formHelper (store, vue ) {
    
    /**
     * To set the submit status
     * @param {String} formName 
     * @param {Boolean} status 
     */
    this.submiting = function (formName, status) {
			
        store.dispatch('form/isSubmiting', {formName, status});
    }

    /**
     * TO submit the form.
     * @param {String} formName 
     */
    this.submit = function (formName) {

        store.dispatch('form/doSubmit', {formName});
    },
    /**
     * To get Element value
     * @param {String} formName 
     * @param {String} elementName 
     * @param {String} value 
     */
    this.setElementVal = function (formName, elementName, value) {
        store.dispatch('form/setElementValue', {formName, elementName, value });
    },
    /**
     * To set the initialized values
     * @param {String} formName 
     * @param {Object} values 
     */
    this.initializeValues = function (formName, values) {

        store.dispatch('form/initializeValues', {formName, values});
    },
    
    /**
     * To reset the form data.
     * @param {String} formName 
     */
    this.resetForm = function (formName) {

        store.dispatch('form/resetForm', {formName});
    }

    /**
     * To get the form data
     * @param {String} formName 
     */
    this.getFormData = function (formName) {

        return store.state.form &&  store.state.form[formName] ? store.state.form[formName].values : {};
    },
    /**
     * To delete the element key
     * @param {*} formName 
     * @param {*} elementName 
     */
    this.removeElement = function (formName, elementName) {

        store.dispatch('form/removeElement', {formName, elementName});
    },
    this.addErrors = function (formName, errors) {

        store.dispatch('form/addErrors', {formName, errors});
    },
    this.addError = function (formName, elementName, errors) {
        store.dispatch('form/addError', {formName, elementName, errors});
    }

    this.removeError = function (formName, elementName) {
        
        store.dispatch('form/removeError', {formName, elementName});
    }
    /**
     * To delete the complete form.
     */
    this.deleteForm = function (formName) {

        store.dispatch('form/removeForm', {formName});
    }
    
    this.ready  = function (formName, status) {
        
        store.dispatch('form/isReady', {formName, status});
    }
    /**
     * To set the form permission
     */
    this.setPermission = function (formName, permission) {
        
        store.dispatch('form/setPermission', {formName, permission});
    }
    
    this.validate = async function (formName, rules, elementName, value) {
        
        if(!rules){
            return;
        }

        rules  = {...rules};        
        const {serverValidation} = rules;
        
        let is_server_or_file = false;
        if(rules.serverValidation || rules.file) {
            is_server_or_file = true;
        }

        delete rules.serverValidation;
        delete rules.file;

        const test = validate.single(value, rules);

        if(test === undefined && serverValidation) {

            const values = {...store.getters['form/values'](formName)};
            this.ready(formName, false);
            let res = await serverValidation({formData: values, value: value,  name: elementName});
            this.ready(formName, true);
            res ? this.addError(formName, elementName, res) : (!is_server_or_file ? this.removeError(formName, elementName) : null);
            return res;
        }
        else {
            
            test !== undefined ? this.addError(formName, elementName, test) : (!is_server_or_file ? this.removeError(formName, elementName) : null);
        }
    }
    /**
     * To make the element as touch/untouch.
     * @param {String} formName 
     * @param {String} elementName 
     */
    this.touchStatus = function (formName, elementName, value) {
        store.dispatch('form/addProp', {formName, elementName, key: 'touch', value});
    }

    /**
     * To add setting data.
     * @param {String} formName 
     * @param {String} elementName 
     * @param {String} key [setting key]
     * @param {String} value [setting value]
     */
    this.addProp = function (formName, elementName, key, value) {
        store.dispatch('form/addProp', {formName, elementName, key, value});
    }
    
    /**
     * To add all props of element.
     * @param {String} formName 
     * @param {String} elementName 
     * @param {Object} props 
     */
    this.addProps = function(formName, elementName, props) {
        
        store.dispatch('form/addProps', { formName, elementName, value: props});
    },

    /**
     * To get the form Name
     * @param {Object} _this 
     */
    this.getFormName = function (_this) {
        
        if( _this.formName !== undefined && _this.formName !== null) {
            
            return _this.formName
        }
        else if(_this.$parent) {
            return this.getFormName(_this.$parent)
        }
        else {
            return undefined;
        }
    }

    /**
     * To get the LQ form Instance.
     * @param {Object} _this 
     */
    this.getForm = function (_this) {
        
        if( _this.formName !== undefined && _this.formName !== null) {
           
            return _this;
        }
        else if(_this.$parent) {
            return this.getFormName(_this.$parent)
        }
        else {
            return undefined;
        }
    }

    
}