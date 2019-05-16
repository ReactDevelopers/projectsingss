<template>
     <el-form-item
        :showMessage="true" 
        :prop="id" 
        :error="elError()" 
        :label="label"
    >
    <el-col :span="4"  v-if="show_calling_code">
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
    <el-col :span="show_calling_code ? 20 : 24">
        <el-input v-model="username.email" :placeholder="placeholder" @focus="touchStatus(true)" />
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
        placeholder: String
    },
    created: function () {
        
        if(this.options.length ==0) {

            callingCode()
                .then((response) => {

                    this.$store.dispatch('list/addResponse', {response: response, listName: 'calling_code'});
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
                email: null,
                calling_code: null                
            },
            show_calling_code: false
        }
    },
    methods: {

         /**
         * To convert the error into string.
         */
        elError: function () {
            return this.error && this.field.touch ? this.error[0] : undefined;
        }
    },
    watch: {
        username: {
            handler(newVal, oldVal) {
                
                let  val = newVal.email;

                if(newVal.email && this.$helper.isInteger(newVal.email)) {
                    
                    this.show_calling_code = true;
                    val = newVal.calling_code + '-' + newVal.email;
                }
                else {
                    this.show_calling_code = false;
                }
                
                this.setValue(val);
                if(this.rules){
                    this.validate();
                }
            },
            deep: true
        }
    }
}
</script>

<style>
    .username-input .el-input {
        width: 80px !important
    }
</style>
