<template>
    <el-form-item  v-if="insideFormElement && shouldDisplay()"
        :showMessage="showMessage" 
        :prop="id" :error="elError()" 
        :label="label"
    >
       <el-radio-group v-model="LQElement" 
            :id="id"
            :size="size"
            :disabled="isDisabled()"
            :text-color="textColor"
            :fill="fill"
            @change="emitEvent('change', $event)"
        >
        <div v-if="!button">
            <el-radio v-for="option_val in options" 
                :key="`${id}.${option_val[valueKey]}`" 
                :label="option_val[valueKey]" 
                :size="size"
                :disabled="option_val.disabled ? true: false"
                v-bind="$attrs"
                >
                {{option_val[labelKey]}}
            </el-radio>
        </div>
        <div v-else>
            <el-radio-button v-for="option_val in options" 
                :key="`${id}.${option_val[valueKey]}`" 
                :label="option_val[valueKey]" 
                :size="size"
                :disabled="option_val.disabled ? true: false"
                v-bind="$attrs"
                >
                {{option_val[labelKey]}}
            </el-radio-button>
        </div>
       </el-radio-group>
    </el-form-item>
    
    <el-radio-group v-model="LQElement" 
        v-else-if="shouldDisplay()"
        :id="id"
        :size="size"
        :disabled="isDisabled()"
        :text-color="textColor"
        :fill="fill"
        @change="emitEvent('change', $event)"
    >
        <div v-if="!button">
            <el-radio v-for="option_val in options" 
                :key="`${id}.${option_val[valueKey]}`" 
                :label="option_val[valueKey]" 
                :size="size"
                :disabled="option_val.disabled ? true: false"
                v-bind="$attrs"
                >
                {{option_val[labelKey]}}
            </el-radio>
        </div>
        <div v-else>
            <el-radio-button v-for="option_val in options" 
                :key="`${id}.${option_val[valueKey]}`" 
                :label="option_val[valueKey]" 
                :size="size"
                :disabled="option_val.disabled ? true: false"
                v-bind="$attrs"
                >
                {{option_val[labelKey]}}
            </el-radio-button>
        </div>
    </el-radio-group>
        
</template>
<script>
import {lqFormElement} from 'vuex-lq-form';
import elementMixin from '../mixins/elementMixin';

export default {
    name: 'lq-element-radio',
    mixins: [lqFormElement, elementMixin],
    props: {
        options: {
            type: Array,
            required: true
        },
        size: {
            type: String,
            default: function () {
                return 'small'
            }
        },
        button: Boolean,
        textColor: String,
        fill: String,
        labelKey: {
            type: String,
            default: function (){return 'label'}
        },
        valueKey: {
            type: String,
            default: function (){return 'value'}
        }
    },
    
}
</script>
