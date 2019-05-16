
export default  {
    inheritAttrs: false,
    props: {
        insideFormElement: {
            type: Boolean,
            default: function() {
                return true;
            }
        },
        label: String,
        showMessage: {
            type: Boolean,
            default: function () {return true}
        },
        customError: String | Array
    },
    methods: {
        /**
         * To convert the error into string.
         */
        elError: function () {
            
            const error = this.customError ? this.customError : this.error;
            return error && this.$helper.isArray(error) ? error.join(', ') : error;
        },

        /**
         * To emit the Custom event of vue-Element-select
         */
        emitEvent: function (eventName, param) {
			this.$emit(eventName, param);
			if(this.validateEvent === eventName){				
				this.validate()
			}
        }
    }
}