<template>
<el-form-item  v-if="insideFormElement && shouldDisplay()"
    :showMessage="showMessage" 
    :prop="id" :error="elError()" 
    :label="label"
>
    <el-input
        v-bind="$attrs"
        v-model="LQElement"
        :id="id"
        :disabled="isDisabled()"
        :name="makeElementName()"
        @blur="emitNativeEvent($event)"
		@focus="emitNativeEvent($event)"
		@click="emitNativeEvent($event)"
		@keyup="emitNativeEvent($event)"
		@keypress="emitNativeEvent($event)"
		@keydown="emitNativeEvent($event)"
        >
    </el-input>
</el-form-item >
    <el-input v-else-if="shouldDisplay()"
        v-bind="$attrs" 
        v-model="LQElement"
        :id="id"
        :disabled="isDisabled()"
        :name="makeElementName()"
        @blur="emitNativeEvent($event)"
		@focus="emitNativeEvent($event)"
		@click="emitNativeEvent($event)"
		@keyup="emitNativeEvent($event)"
		@keypress="emitNativeEvent($event)"
		@keydown="emitNativeEvent($event)"
        >
    </el-input>
</template>

<script>

import { lqFormElement } from 'vuex-lq-form';

export default {
    name: 'lq-element-input',
    mixins: [lqFormElement],
    inheritAttrs: false,
    props: {
        showMessage: {
            type: Boolean,
            default() {
                return true;
            }
        },
        insideFormElement: {
            type: Boolean,
            default: function() {
                return true;
            }
        },
        label: String
    },
    methods: {

        elError: function () {
            return this.error ? this.error.join(', ') : undefined;
        }
    }
}
</script>
