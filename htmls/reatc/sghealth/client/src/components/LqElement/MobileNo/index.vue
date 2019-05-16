<template>
     <el-form-item
        :showMessage="true" 
        :prop="id" 
        :error="elError()" 
        :label="label"
        class="mobile_number_wrap"
    >
    <el-col :span="getCallingCodeSpan()" class="calling_code_col">
        <el-select           
            class="username-input"
            v-model="username.calling_code"
            :filterable="true"
            placeholder="..."
            >
            <el-option            
                v-for="(item, index) in options"
                :key="`${item.code}.${index}`"
                :label="item.code"
                :value="item.code">
            </el-option>
        </el-select>
    </el-col>
    <el-col :span="getMobileSpan()">
        <el-input v-model="username.mobile_no" :placeholder="placeholder" @focus="touchStatus(true)" />
    </el-col>    
    </el-form-item>  
</template>
<script>

import {lqFormElement} from 'vuex-lq-form';
import {callingCode} from '@/api/attribute';

export default {
    
    name: 'lq-user-input',
    mixins: [lqFormElement],
    props: {
        label: String,
        placeholder: String,
        span: Array,
    },
    created: function () {
        
        if(this.options.length ==0) {

            callingCode()
                .then((response) => {

                    this.$store.dispatch('list/addResponse', {response: response, listName: 'calling_code'});
                    
                    if(this.username.calling_code)
                        this.username.calling_code = response.data.selected.code;
                })
        }

       
    },
    computed: {

        options: function () {

           return this.$helper.getProp(this.$store.state, 'list.calling_code.response.data.data', []);
        }
    },
    data: function () {

        return  {
            username: {
                mobile_no: null,
                calling_code: null                
            }
        }
    },
    methods: {

         /**
         * To convert the error into string.
         */
        elError: function () {
            return this.error && this.field.touch ? this.error[0] : undefined;
        },
        getCallingCodeSpan: function () {
            return this.span && this.span[0] ? this.span[0] : 4
        },
        getMobileSpan: function () {
            return this.span && this.span[1] ? this.span[1] : 20
        }
    },
    watch: {
        username: {
            handler(newVal, oldVal) {

                let val = newVal.calling_code + '-' + newVal.mobile_no;
                this.setValue(val);

                if(this.rules){
                    this.validate();
                }
                else {
                    if(this.elError) {
                        this.removeError();
                    }
                }                
            },
            deep: true
        },
        LQElement: function(newVal, oldValue) {

            let mobile_no = newVal.toString().split('-');
            this.username.calling_code = mobile_no[0] === "null" ? null :  mobile_no[0]
            this.username.mobile_no = mobile_no[1] === "null" ? null :  mobile_no[1]
        }
    }
}
</script>

<style>
    .username-input .el-input {
        width: 80px !important
    }
    .calling_code_col {
        padding-left: 0 !important;
    }
</style>
