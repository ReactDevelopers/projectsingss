<template>

    <el-form-item  v-if="insideFormElement && shouldDisplay()"
            :showMessage="showMessage" 
            :prop="id" :error="elError()" 
            :label="label"
        >
            <el-date-picker
                v-model="LQElement"
                :id="id"
                :disabled="isDisabled()"
                :name="makeElementName()"
                @blur="emitNativeEvent($event)"
                @focus="emitNativeEvent($event)"
                @change="emitEvent('change', $event)" 
                v-bind="$attrs" />
    </el-form-item>
     <el-date-picker v-else-if="shouldDisplay()"          
        v-model="LQElement"
        :id="id"
        :disabled="isDisabled()"
        :name="makeElementName()"
        @blur="emitNativeEvent($event)"
        @focus="emitNativeEvent($event)"
        @change="emitEvent('change', $event)"
        v-bind="$attrs" />        
</template>

<script>

    import {lqFormElement} from 'vuex-lq-form';
    import elementMixin from '../mixins/elementMixin';

    export default {
        name: 'lq-el-date-pciker',
        mixins: [lqFormElement, elementMixin],
        inheritAttrs: false,
        // props: {
        //     defaultValue
        // },
        data: function () {

            return {
                initialValue: null
            }
        },
        computed: {

		
            LQElement: {

                get: function () {
                    
                    const val = this.getValue();
                    return val ? new Date(val) :  null;
                },
                set: function (value, event) {
                    
                    this.setValue(value)			

                    if(this.validateEvent ==='change'){
                        this.validate()
                    }
                }
            }
	    }
    }
</script>
<style>
    .el-date-editor.el-input, .el-date-editor.el-input__inner {
        width: 100%;
    }
</style>
