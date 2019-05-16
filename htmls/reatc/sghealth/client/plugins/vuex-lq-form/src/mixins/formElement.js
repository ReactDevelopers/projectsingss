import helper from 'vuejs-object-helper';

const formElementMix = {

	props: {

		id: {
			type: String,
			required: true
		},
		rules : Object,
		validateEvent: {
			type: String,
			validator: (val) => ['blur', 'change', 'keypress', 'keyup','keydown','click'].includes(val),
			default: function () {
				return 'change';
			}
		},
		isInitialValue: {
			type: Boolean,
			default: function () {
				return true;
			}
		},
		disabled: Boolean,
	},
	computed: {

		error: function () {

			return helper.getProp(this.$store.state.form, [this.formName, 'errors', this.id], null);
		},		
		field: function () {
			return helper.getProp(this.$store.state.form, [this.formName, 'fields', this.id], {});
		},
		initialvalue: function () {

			return helper.getProp(this.$store.state.form, this.formName+'.initialize_values.'+ this.id, null);
		},

		/**
		 * Get the form permission form store.
		 */
		formPermission: function () {

			return helper.getProp(this.$store.state.form,`${this.formName}.permission`, null);
		},

		LQElement: {

			get: function () {

				return this.getValue();
			},
			set: function (value, event) {

				this.setValue(value)			

				if(this.validateEvent ==='change'){
					this.validate()
				}
			}
		}
	},
	data: function () {

		return {
			name: null,
			formName: null,
			validationCallback: null,
			validating: false,
			initialValue: null,
		}
	},

	created () {

		this.formName = this.$lqForm.getFormName(this);
		
		if(this.getValue(null) == null && this.isInitialValue)
			this.setValue(this.initialValue, false);

		/**
		 * Add Element props
		 */
		this.$lqForm.addProps(this.formName, this.id, {
			touch: false,
			rules: this.rules ? this.rules : null,
		});
	},

	methods: {

		getParent: function () {
			
			return this.$lqForm.getForm(this);
		},
		getValue: function (defulatValue) {

			defulatValue = defulatValue !== undefined ? defulatValue : null;
			return helper.getProp(this.$store.state.form,`${this.formName}.values.${this.id}`, defulatValue);
		},
		setValue: function (value, informToroot= true) {
						
			if(!this.rules && this.error){
				this.removeError();	
			}
			
			if(this.isInitialValue || value){
				this.$lqForm.setElementVal(this.formName, this.id, value)			
			}
			else {
				this.$lqForm.removeElement(this.formName, this.id);
			}
			if(informToroot){
				this.$root.$emit(this.formName+'_changed');
			}
		},
		makeElementName: function () {

			return this.id.split('.').map(function(item, index)  { return index >0 ? '['+item+']': item  }).join('');
		},
		addError: function (errors) {

			errors = !helper.isArray(errors) ? [errors] : errors;
			this.$lqForm.addError(this.formName, this.id, errors);
		},
		removeError: function () {

			this.$lqForm.removeError(this.formName, this.id);
		},
		ready: function (status) {
			
			this.$lqForm.ready(this.formName, status);
		},
		touchStatus: function (status) {

			this.$lqForm.touchStatus(this.formName, this.id, status);
		},
		validate: async  function () {

			if(!this.rules) {				
				return;
			}
			if(this.validating){

				if(this.validationCallback === null) {
					this.validationCallback = this.validate;
				}
				return;
			}
			this.$emit('validating', {elementName: this.id, formName: this.formName});
			
			try {
				
				this.validating = true;
				await this.$lqForm.validate(this.formName, this.rules, this.id,  this.getValue());

				this.validating = false;
				this.validationCallback ? this.validationCallback():  null;
				this.validationCallback = null;
				this.$emit('validated');
			}
			catch( err) {

				this.ready(true);
				this.addError(err)
				this.$emit('validated', err);
				this.validating = false;
				this.validationCallback = null;
			}
			
		},

		/**
		 * To Emit Custom Event
		 * @param {Object} event 
		 */
		emitNativeEvent: function(event) {

			this.$emit(event.type, event, this.getValue());
			/**
			 * Check the Validation 
			 */
			if(this.validateEvent === event.type){				
				this.validate()
			}

			/**
			 * make Element as touch on focus event
			 */
			if(event.type ==='focus') {

				this.touchStatus(true);
			}
		},

		/**
		 * Finding the need to check the form element permission.
		 */
		shouldCheckPermission: function() {

			return this.formPermission && this.formPermission.fields && this.formPermission.fields.length && this.formPermission.limitations && this.formPermission.limitations.field_selection ? true : false;
		},

		/**
		 * To check the Authority to read and write the element.
		 */
		hasAccess: function () {
			
			if(this.shouldCheckPermission()) {
				
				const field = this.getPermittedField();

				if(this.formPermission.limitations.field_selection === 'only') {
					return field ? true : false;
				}
				else {
					field && field.authority !== 'read' ? false : true;
				}
			}

			return true;
		},

		/**
		 * To find the field authority is that read | write | hide
		 */
		fieldAuthority: function () {

			const field = this.getPermittedField();
			return field ? field.authority : null;
		},

		/**
		 * To check that form permission have the current field information.
		 */
		getPermittedField: function () {
			
			let data = null;
			const client_field = this.id.replaceAll(new RegExp("\.[0-9]+\."),'.*.');

			if(this.formPermission && this.formPermission.fields && this.formPermission.fields.length) {
				
				this.formPermission.fields.map((field) => {
					if(field.client_field === client_field) {
						data = field;
					}
				})
			}
			return data;
		},
		/**
		 * To check that should the current element display ?
		 */
		shouldDisplay: function () {
			const authority = this.fieldAuthority();
			return (authority !== 'hide' && this.hasAccess());
		},

		/**
		 * To check that should the current element disable or not ?
		 */
		shouldDisabled: function () {
			const authority = this.fieldAuthority();
			return (authority === 'read' );
		},

		/**
		 * To check the element disability
		 */
		isDisabled: function () {

			return  this.shouldDisabled() ? true : this.disabled;
		}
	}

}

export default formElementMix;