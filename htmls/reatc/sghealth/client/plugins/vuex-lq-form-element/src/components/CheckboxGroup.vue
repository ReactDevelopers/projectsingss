<template>
    <el-form-item  v-if="insideFormElement && shouldDisplay()"
        :showMessage="showMessage" 
        :prop="id" :error="elError()" 
        :label="label"
    >
       <el-checkbox-group v-model="LQElement" 
            :id="id"
            :size="size"
            :disabled="isDisabled()"
            :text-color="textColor"
            :fill="fill"
            @change="emitEvent('change', $event)"
        >
            <div v-if="!button">
                <el-checkbox v-for="option_val in options" 
                    :key="`${id}.${option_val[valueKey]}`" 
                    :label="option_val[valueKey]" 
                    :size="size"
                    :disabled="option_val.disabled ? true: false"
                    v-bind="$attrs"
                    >
                    <slot v-bind:option="option_val" v-bind:options="options">
                        {{option_val[labelKey]}}
                    </slot>
                </el-checkbox>
            </div>
            <div v-else>
                <el-checkbox-button v-for="option_val in options" 
                    :key="`${id}.${option_val[valueKey]}`" 
                    :label="option_val[valueKey]" 
                    :size="size"
                    :disabled="option_val.disabled ? true: false"
                    v-bind="$attrs"
                    >
                    <slot v-bind:option="option_val" v-bind:options="options">
                        {{option_val.label}}
                    </slot>
                </el-checkbox-button>
            </div>
       </el-checkbox-group>
    </el-form-item>
    
    <el-checkbox-group v-model="LQElement" 
        :id="id"
        v-else-if="shouldDisplay()"
        :size="size"
        :disabled="isDisabled()"
        :text-color="textColor"
        :fill="fill"
        @change="emitEvent('change', $event)"
    >
        <div v-if="!button">
            <el-checkbox v-for="option_val in options" 
                :key="`${id}.${option_val[valueKey]}`" 
                :label="option_val[valueKey]" 
                :size="size"
                :disabled="option_val.disabled ? true: false"
                v-bind="$attrs"
                >
                <slot v-bind:option="option_val" v-bind:options="options">
                    {{option_val[labelKey]}}
                </slot>
            </el-checkbox>
        </div>
        <div v-else>
            <el-checkbox-button v-for="option_val in options" 
                :key="`${id}.${option_val[valueKey]}`" 
                :label="option_val[valueKey]" 
                :size="size"
                :disabled="option_val.disabled ? true: false"
                v-bind="$attrs"
                >
                <slot v-bind:option="option_val" v-bind:options="options">
                    {{option_val[labelKey]}}
                </slot>
            </el-checkbox-button>
        </div>
    </el-checkbox-group>
        
</template>
<script>
import {lqFormElement} from 'vuex-lq-form';
import elementMixin from '../mixins/elementMixin';

export default {
    name: 'lq-element-checkbox-group',
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
    data: function () {

        return {
            initialValue: []
        }
    }
    
}
</script>
