import helper from 'vuejs-object-helper';
const _  = require('lodash');
const formMixin = {

	props: {
		formName: {
			type: String,
			required: true,
		},
		keepAlive: {
			type: Boolean,
			default: function(){ return false;}
		},
		initialvalues: {
			type: Object,
			default: function () { return {}; }
		},
		request: Function,
		displayInlineError: {
			type: Boolean,
			default: function () {return true}
		},
		fixedData: Object,
	},
	data: function(){
		return {
			fillableInput: null,
			excludeInput: null,
		}
	},
	/*
	 |-------------------------------------------------------
	 | Check that is the form  already have the values ?
	 |-------------------------------------------------------
	 * Form does have the values and `keepAlive` setting is true,
	 * then no need to re-initialize the form value else hit the event to intialize the value
	 *
	 */
	mounted: function () {

	},
	watch: {

		submitEvent() {
			this.submit();
		}
	},

	created: function () {

		this.ready(true);
		this.submiting(false);
	},
	/*
	 |--------------------------------------------------------------------------------
	 | Check if Keep alive is false then delete the all form value and assign the null.
	 |--------------------------------------------------------------------------------
	 *
	 */
	destroyed: function () {	
		
		if(!this.keepAlive) {
			this.$lqForm.deleteForm(this.formName);
		}
	},
	computed: {

		formValues: function () {

			return _.cloneDeep(helper.getProp(this.$store.state.form,`${this.formName}.values`, {}));
		},
		formInitialvalues: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.initialize_values`, null);
		},
		formErrors: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.errors`, {});
		},
		isReady: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.isReady`, true);
		},
		isSubmiting: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.isSubmiting`, false);
		},
		submitEvent: function () {
			return helper.getProp(this.$store.state.form,`${this.formName}.submitEvent`, false);
		},		
		/**
		 * Get the form permission form store.
		 */
		formPermission: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.permission`, null);
		}
	},

	methods: {


		/*
		 |-----------------------------------
		 | To get given element value
		 |-----------------------------------
		 * @param elementName => String
		 * If element is an array then name path should be concat with comma like
		 * element is name: [1,2,3,4] and you want to delete the second element than
		 * name value should be like: `name.1`
		 */
		 getElement: function (elementName, defaultValue) {
		 	
			 const val =  helper.getProp(this.formValues, elementName , []);
			 return val && val.length ? val : (defaultValue ? [defaultValue] : []);
		 },
		 
		/*
		 |----------------------------------------
		 | To add new Element in last of an Array
		 |----------------------------------------
		 * @param elementName => String,
		 * @param default_value => any,
		 */

		push: function (elementName, defaultValue) {
			

			this.$store.dispatch('form/addNewElement', {formName: this.formName, elementName: elementName, value: defaultValue})
		},

		/*
		 |----------------------------------------
		 | To add new Element in start of an Array
		 |----------------------------------------
		 * @param elementName => String,
		 * @param default_value => any,
		 * Note after that we will re-arrange the error index.
		 */

		unshift: function (elementName, defaultValue) {

			this.$store.dispatch('form/addNewElementUnshift', {formName: this.formName, elementName: elementName, value: defaultValue})
		},

		/*
		 |-----------------------------------
		 | To remove the element
		 |-----------------------------------
		 * @param elementName => String
		 * If element is an array then name path should be concat with comma like
		 * element is name: [1,2,3,4] and you want to delete the second element than
		 * name value should be like: `name.1`
		 */
		remove: function (elementName) {
			
			this.$store.dispatch('form/removeElement', {formName: this.formName, elementName: elementName});
		},

		
		/*
		 |-----------------------------------
		 | To get the element error
		 |-----------------------------------
		 * @param elementName => String
		 * If element is an array then name path should be concat with comma like
		 * element is name: [1,2,3,4] and you want to delete the second element than
		 * name value should be like: `name.1`
		 */
		getErrors: function (elementName) {

			return elementName ? this.formErrors.elementName : this.formErrors;
		},
		addErrors: function (errors) {
			
			this.$lqForm.addErrors(this.formName,  errors);
		},
		addError: function (elementName, errors) {

			this.$lqForm.addError(this.formName, elementName, errors);
		},
		removeError: function (elementName) {
			
			this.$lqForm.removeError( this.formName, elementName);
		},
		ready: function (status) {
			
			this.$lqForm.ready( this.formName, status);			
		},
		submiting: function (status) {
			
			this.$lqForm.submiting( this.formName, status);
		},
		hasError: function () {
			const errors = this.getErrors();
			if(!errors){
				return false;
			}

			return Object.keys(errors).length > 0;
		},
		touchStatus: function(elementName, status) {
			this.$lqForm.touchStatus(this.formName, elementName, status);
		},
		

		validate: async function () {

			const values = {...this.$store.getters['form/values'](this.formName)};
			const fields = {...this.$store.getters['form/fields'](this.formName)};
			const elementNames = Object.keys(fields);
			let validations = [];

			this.ready(false);

			elementNames.map((elementName) => {

				const elementValue = 	helper.getProp(values, elementName, null);		
				const field = fields[elementName];
				this.touchStatus(elementName, true);
				
				try {

					let response =  this.$lqForm.validate(this.formName, field.rules, elementName, elementValue);

					if(response) {
						validations[validations.length] = response;
					}
				}
				catch( err) {

					this.addError(elementName, err)
				}				
			})

			const data = await Promise.all(validations);
			this.ready(true);
			return data;
		},
		
		/**
		 * To delete the unwanted key from the object
		 */
		deleteDirtyData: function (data, excludeInput) {
			
			if(excludeInput &&  helper.isArray(excludeInput) && excludeInput.length) {
				
				excludeInput.map(function(excludeKey) {
					helper.deleteProp(data, excludeKey);
				})				
			}			
		},
		/**
		 * To pull only selected key from nested ibject
		 */
		onlyData: function (data, fillableInput) {
			
			if(fillableInput && helper.isArray(fillableInput) && fillableInput.length) {
				let onlyData  = {};
				fillableInput.map(function(keyName) {
					
					const keyValue = helper.getProp(data, keyName);

					if(keyValue !== undefined) {
						helper.setProp(onlyData, keyName, keyValue)
					}
				})

				return onlyData;
			}

			return data;
		},

		submit: async function (shouldEmitEvents) {
			
			shouldEmitEvents = shouldEmitEvents === undefined ? true : shouldEmitEvents;

			if(!this.canSubmit()){
				this.$root.$emit('can-not-submit');
				return;
			}

			await this.validate();

			if(this.hasError()) {

				this.$root.$emit('has-error');
				this.$emit('errors')
				return;
			}

			let data = _.cloneDeep(this.formValues);

			if(this.fixedData) {
				data = {...data, ...this.fixedData };
			}
			// When form data is valid
			if(!this.request) {
				this.$emit('validated', {data});
				return;
			}
			this.submiting(true);
			
			// Remove the dirty data before sending to server.
			this.deleteDirtyData(data, this.excludeInput);

			
			const dataKeys = Object.keys(data);
			/**
			 * Data Formatting..
			 */
			dataKeys.map((dataKey) => {

				const formatterFncName = _.camelCase(dataKey)+'Formatter';

				if(this.fillableInput && this.fillableInput.includes(dataKey) === false) {
					delete data[dataKey]
				}
				else if (typeof this[formatterFncName] === "function" ) {

					data[dataKey] = this[formatterFncName](data[dataKey]);
				} 
			})

			return this.request(data)
				.then((response) => {

					this.submiting(false);

					if(shouldEmitEvents) {

						this.$emit('submited-success', response);
						this.$root.$emit('submited-success', response);
					}
					return Promise.resolve(response);
				})
				.catch((error) => {

					this.submiting(false);
					if(shouldEmitEvents) {
						this.$emit('submited-error', error);
						this.$root.$emit('submited-error', error);
					}

					if(helper.getProp(error, 'response.status') === 422 && this.displayInlineError) { 					  
						this.addErrors(error.response.data.errors);
					}

					return Promise.reject(error)
				})
		},
		canSubmit: function (){
			return this.isReady && !this.isSubmiting;
		}
	}
}

export default formMixin;