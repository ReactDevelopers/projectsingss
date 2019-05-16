<template>
    <el-form-item  v-if="insideFormElement && shouldDisplay()"
        :showMessage="showMessage" 
        :prop="id" :error="elError()"
    >
      <el-checkbox v-model="LQElement" 
            v-bind="$attrs"
            @change="emitEvent('change',{value: $event, trueValue: trueValue})"
            :disabled="isDisabled()"
        >
          <slot :value="LQElement">{{label}}</slot>
      </el-checkbox>
    </el-form-item>
    
    <el-checkbox v-model="LQElement"
        v-else-if="shouldDisplay()"
        v-bind="$attrs" 
        @change="emitEvent('change',{value: $event, trueValue: trueValue})"
        :disabled="isDisabled()"
    >
        <slot :value="LQElement">{{label}}</slot>
    </el-checkbox>
</template>
<script>
import {lqFormElement} from 'vuex-lq-form';
import elementMixin from '../mixins/elementMixin';

export default {
    name: 'lq-element-checkbox-group',
    mixins: [lqFormElement, elementMixin],
    inheritAttrs: false,
    props: {
        size: {
            type: String,
            default: function () {
                return 'small'
            }
        },
        button: Boolean,
        disabled: Boolean,
        textColor: String,
        fill: String,
        objectKey: String,
        trueValue: Object
    },
    methods: {
        
        /**
         * To set the element value
         */
        setValue: function (value, informToroot= true) {
						
			if(!this.rules && this.error){
				this.removeError();	
			}
			
			if(this.isInitialValue || value){
				this.$lqForm.setElementVal(this.formName, this.id, value ? ( this.trueValue? this.trueValue : value ): value)			
			}
			else {
				this.$lqForm.removeElement(this.formName, this.id);
			}
			if(informToroot){
				this.$root.$emit(this.formName+'_changed');
			}
        },

        /**
         * To get the element value.
         */
        getValue: function (defulatValue) {

			defulatValue = defulatValue !== undefined ? defulatValue : null;
            const value =  this.$helper.getProp(this.$store.state.form,`${this.formName}.values.${this.id}`, defulatValue);
            return this.trueValue && value ? this.checkTrueValue(value) : value;
        },
        
        checkTrueValue: function (value) {

            if(this.objectKey && value[this.objectKey] ) {
                return true
            }
            else if(!this.objectKey && value) {
                return true;
            }
            else {
                return null;
            }
        }
    }
    
}
</script>
    