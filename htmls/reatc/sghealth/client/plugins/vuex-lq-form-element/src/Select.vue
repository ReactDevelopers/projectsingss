<template>
    <el-form-item  v-if="insideFormElement && shouldDisplay()"
        :showMessage="showMessage" 
        :prop="id" :error="elError()" 
        :label="label"
    >
        <el-select 
            v-bind="$attrs"
            v-model="LQElement" 
            :id="id"
            :multiple="multiple"
            :name="makeElementName()"
            :remote-method="remoteRequest"
            :remote="remote"
            :clearable="clearable ? clearable : true"
            :value-key="valueKey"
            :loading="loading"
            :disabled="isDisabled()"
            :allow-create="allowCreate"
            @blur="emitNativeEvent($event)"
            @focus="emitNativeEvent($event)"
            @click="emitNativeEvent($event)"
            @change="emitEvent('change', $event, {})"
            @visible-change="emitEvent('visible-change', $event)"
            @remove-tag="emitEvent('remove-tag', $event)"
            @clear="emitEvent('remove-tag')"
        >
            <slot v-bind:items="myoptions">
                <el-option            
                    v-for="item in myoptions" v-if="item"
                    :key="item[valueKey]"
                    :label="item[labelKey]"
                    :disabled="item.disabled ? true : false"
                    :value="item[valueKey]">
                </el-option>
            </slot>
        </el-select>
    </el-form-item> 

    <el-select v-else-if="shouldDisplay()"
        v-bind="$attrs"
        v-model="LQElement" 
        :id="id"
        :multiple="multiple"
        :name="makeElementName()"
        :remote-method="remoteRequest"
        :remote="remote"
        :loading="loading"
        :clearable="clearable ? clearable : true"
        :disabled="isDisabled()"
        :value-key="valueKey"
        :allow-create="allowCreate"
        @blur="emitNativeEvent($event)"
        @focus="emitNativeEvent($event)"
        @click="emitNativeEvent($event)"
        @change="emitEvent('change', $event)"
        @visible-change="emitEvent('visible-change', $event)"
        @remove-tag="emitEvent('remove-tag', $event)"
        @clear="emitEvent('remove-tag')"
    >
        <slot v-bind:items="myoptions">
            <el-option            
                v-for="item in myoptions"
                :key="item[valueKey]"
                :label="item[labelKey]"
                :disabled="item.disabled ? true : false"
                :value="item[valueKey]">
            </el-option>
        </slot>
    </el-select>
        
</template>
<script>
import {lqFormElement} from 'vuex-lq-form';
//import ELCustomSelect from './ElCustomSelect/src/select';
import helper from 'vuejs-object-helper';
import elementMixin from '../mixins/elementMixin';
const _  = require('lodash');

export default {
    name: 'lq-element-select',
    mixins: [lqFormElement, elementMixin],
    props: {
        options: [Object, Array],
        storeKey: [String, Array],
        valueKey: {
            type: String,
            default: function (){return 'id'}
        },
        labelKey: {
            type: String,
            default: function (){return 'name'}
        },
        clearable: Boolean,
        valueFormat: String,
        request: Function,
        remote: Boolean,
        multiple: Boolean,
        remoteResponsePath: String,
        allowCreate: Boolean
    },
    data: function() {

        return {
            initialValue: this.multiple ? [] : null,
            remoteOption: this.defaultOptions ? (helper.isArray(this.defaultOptions) ? this.defaultOptions : [this.defaultOptions]) : [],
            remoteCallback : null,
            loading: false,
        }
    },

    created: function ()  {
        
        /**
         * When the remote element has been created, And Data does not receive before typing.
         */
        if(this.remote && !this.myoptions.length ) {
            
            //this.remoteRequest('', true, true);
        }

        //console.log('Hi I am created....', this.options);
        if(this.options) {
            const opts = !helper.isArray(this.options) ? [this.options] : this.options;
            this.$lqForm.addProp(this.formName, this.id, 'options',  opts);
        }
       
    },
    computed: {

		LQElement: {

			get: function () {
                
                let  value = this.getValue();
                value = !value ? (this.multiple ? [] : null) : value;

                if(this.valueFormat ==='object') {
                    
                    if(!this.multiple) {
                        return value ?  value[this.valueKey]  : null;
                    }
                    else {

                        return value ? value.map( (val) => {
                            return val[this.valueKey];
                        }): [];
                    }
                }
                else {

                    return value;
                }
                
			},
			set: function (value, event) {
                
                if(this.multiple && value) {
                    value = _.sortedUniq(value);
                }

                let dataObject = null;

                if(value &&  this.valueFormat ==='object' ) {
                    
                    if(!this.multiple) {

                        let hasOpt = null;
                        this.myoptions.map( (opt) =>  {
                        
                            if(opt[this.valueKey] == value ) {
                                hasOpt = opt;
                            }
                        })
                        value = hasOpt ? hasOpt : {[this.labelKey]: value, [this.valueKey]: value, new: true };
                    }
                    else {

                        let savedValues = this.getValue() ? this.getValue(): [];
                        value = value.map((val) => {
                            
                            let hasOpt = null;

                            savedValues.map( (savedVal) => {
                                if(savedVal[this.valueKey] == val) {
                                    hasOpt = savedVal;
                                }
                            })

                            if(hasOpt) {
                                return hasOpt;
                            }

                            this.myoptions.map( (opt) =>  {
                        
                                if(opt[this.valueKey] == val ) {
                                    hasOpt = opt;
                                }
                            })
                            return hasOpt ? hasOpt : {[this.labelKey]: val, [this.valueKey]: val, new: true };
                        })
                    }

                    dataObject = value;
                }
                else {

                    dataObject = this.getFullSelectedData(value);
                }
                
                this.setValue(value);

                if(dataObject) {
                    this.$lqForm.addProp(this.formName, this.id, 'selected',  (!this.multiple ?  [ dataObject] : dataObject) );
                }
                else {

                    this.$lqForm.addProp(this.formName, this.id, 'selected', null);
                }

				if(this.validateEvent ==='change'){
					this.validate()
				}
			}
        },

        /**
         * Get the option from store.state
         */
        storeOptions: function () {

           return this.storeKey ? helper.getProp(this.$store.state, this.storeKey, null) : null;
        },
        selectedObjectData: function () {
            return helper.getProp(this.$store.state, ['form', this.formName, 'fields', this.id, 'selected'], []);
        },
        myoptions: function () {

            return helper.getProp(this.$store.state, ['form', this.formName, 'fields', this.id, 'options'], []);
        }
	},
    methods: {

        getFullSelectedData: function(value) {
            
            let hasOpt = [];
            
            value = value ? value : this.getValue();

            const values = !this.multiple ? [value]: value;

            values.map((selected_val) => {  

                this.myoptions.map( (opt) =>  {

                    if(opt[this.valueKey] == selected_val ) {
                        hasOpt.push(opt);
                    }
                })                
            })

            return hasOpt.length ? (!this.multiple ? hasOpt[0] : hasOpt): null;
        },

        /**
         * To Clear the Options
         */
        clearRemoteOptions: function () {
            this.$lqForm.addProp(this.formName, this.id, 'options',  []);
        },
        /**
         * To get the data from server base on search keywords.
         */
        remoteRequest: function (data) {
            
            /**
             * User is request and request does not reslove then system will wait for reslove.
             */
            if(this.remoteCallback) {
                this.remoteCallback = function () { this.remoteRequest(data)}
                return;
            }

            if(this.request ) {
                
                // if(!data && !forceFetch) {
                //     return;
                // }

                this.loading = true;                
                const res = this.request(data);
                if(!res) {

                    this.loading = false;
                    return;
                }
                res
                .then((resposne) => {
                    
                    this.loading = false;
                    
                    const remote_data = helper.getProp(resposne, this.remoteResponsePath);
                    // if(remote_data.length && should_merge) {
                    //     this.mergeOptionsData(remote_data);
                    // }
                    // else {
                    //     this.remoteOption  = remote_data;
                    // }
                    
                    this.$lqForm.addProp(this.formName, this.id, 'options',  remote_data);

                    if(this.remoteCallback){
                        const fnc = this.remoteCallback;
                        this.remoteCallback = null;
                        fnc();
                    }
                }).catch((error) => {

                    this.loading = false;
                    this.remoteCallback = null;
                })
            }
            else {

                throw new Error('invalid request element in select.')
            }
        }
        
    },
    watch: {

        storeOptions: {            
            handler:  function(val, oldVal) {
                
                if(this.storeKey) {               
                    this.$lqForm.addProp(this.formName, this.id, 'options',  val);
                }
            },
            deep: true
        }
    }
}
</script>
